---
tags:
    - PHP
    - Anleitung
    - Twig
hide:
    - toc
---

# Installation

Um Twig überhaupt zu benutzen muss es zuerst verfügbar gemacht werden. Dazu muss es über Composer installiert werden, was wiederum gleich wie PHP über Docker gemacht werden kann. Dazu wird [Composer](https://getcomposer.org/) benötigt, was der Paketmanager für PHP ist. Es verwaltet die **Abhängigkeiten** und **Versionen** von Bibliotheken, damit diese nicht manuell installiert und aktualisiert werden müssen. Composer wird über den folgenden Befehl in Docker installiert werden:

```dockerfile title="Composer installieren"
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
 && ln -s $(composer config --global home) /root/composer
ENV PATH=$PATH:/root/composer/vendor/bin COMPOSER_ALLOW_SUPERUSER=1
```

Wenn Composer installiert ist, dann müssen noch die **Bibliotheken** installiert werden. Dazu wird ein `composer.json`-File erstellt, welches die Bibliotheken mit den Versionen enthält, die installiert werden sollen. In diesem Fall wird nur Twig installiert. Die Datei befindet sich unter dem PHP-Ordner (`/php/composer.json`) und könnte wie folgt aussehen:

```json title="composer.json"
{
	"require": {
		"twig/twig": "^2.0" //(1)
	}
}
```

1. Die Versionen sind nach **Major.Minor.Patch** aufgebaut, wobei ein `^` vor der Version steht, was bedeutet, dass **nur** die Minor und Patch-Versionen aktualisieren dürfen, was _Breaking-Changes_ verhindert. Über `~` wird gekennzeichnet dass nur die Patch-Versionen aktualisiert werden dürfen. Ohne `^` oder `~` wird die exakte Version installiert. Mehr Informationen dazu gibt es in der [Composer Dokumentation](https://getcomposer.org/doc/articles/versions.md) oder auf [Medium](https://medium.com/att-israel/npm-versions-explained-60e4d6b9920f).

Im letzten Schritt werden die Bibliotheken installiert. Dabei wird die **Konfiguration** in den Composer-Ordner kopiert. Über den Befehl `composer install` werden die Bibliotheken installiert.

```dockerfile title="Bibliotheken installieren"
RUN mkdir /var/composer
COPY composer.json /var/composer/
RUN cd /var/composer/ && composer install
```

Wenn alles richtig gemacht wurde, dann sollte **Twig** mit der Version 2.0 installiert sein.

## Twig laden

Twig wird nicht direkt vom Webserver verarbeitet, sondern muss über PHP geladen werden. Dies kann zum Beispiel in einer Basisklasse für den Controller gemacht werden.

```php title="Twig laden"
<?php
class BaseController {
    protected $twig;

    public function __construct()
    {
        $this->loadTwig(); //(1)
    }

    private function loadTwig() {
        // Load our autoloader
        require_once '/var/composer/vendor/autoload.php';

        // Specify our Twig templates location
        $loader = new Twig_Loader_Filesystem(__DIR__.'/../views');

        $this->twig = new Twig_Environment($loader, array('debug' => true)); //(2)
        $this->twig->addExtension(new Twig_Extension_Debug()); //(3)
    }
}
```

1. Die Methode wird bei jeder Vererbung aufgerufen und instanziiert. Dadurch ist Twig immer verfügbar.
2. Twig wird instanziiert und die Templates werden aus dem Ordner `views` geladen. Zusätzlich wird der Debug-Modus aktiviert.
3. Die Debugging-Extension ist nur für die Entwicklung notwendig, sollte aber nicht in der Produktivumgebung aktiviert sein. Dort kann das Array weggelassen werden.
