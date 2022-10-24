---
tags:
    - PHP
    - Anleitung
    - Twig
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
