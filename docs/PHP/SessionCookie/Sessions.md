---
tags:
    - PHP
    - Sessions & Cookies
---

# Sessions

Eine Session ist eine **temporäre Verbindung** zwischen einem Client und einem Server. Sie wird verwendet, um Informationen über mehrere Seiten hinweg zu speichern. Eine Session wird durch einen Session-ID und einen Session-Wert definiert. Der Session-ID ist eine **eindeutige ID**, der verwendet wird, um auf die Session zuzugreifen. Der **Session-Wert** ist der Wert, der mit dem Session-IDs verknüpft ist. Der Session-Wert kann ein beliebiger Datentyp sein, einschliesslich eines Arrays oder eines Objekts.

## Sinn und Zweck von Sessions

Das Ziel einer Session ist es, dass Daten über **Abfragen** hinweg gespeichert werden können. Dies ist insbesondere dann nützlich, wenn eine Anwendung mehrere Seiten hat, die aufeinander aufbauen. Wenn eine Anwendung nur eine Seite hat, ist eine Session nicht nützlich, da die Daten nur für eine einzige Abfrage gespeichert werden können.

## Wie funktionieren Sessions?

Jeder Benutzer hat eine eigene Session. Wenn ein Benutzer eine Website besucht, wird eine Session-ID generiert und könnte wie folgt aussehen `82081052a03b87a0055d59d776bb5fd3`. Wer das Muster erkennt weiss, dass dies in PHP ein [md5-Hash](https://pimylifeup.com/php-md5/) ist. Mithilfe von [`session_id()`](https://www.php.net/manual/en/function.session-id.php) kann die Session-ID ausgelesen werden. Die Session-ID wird in einem [Session Cookie](Cookies.md) gespeichert, das auf dem Client gespeichert wird. Wenn der Benutzer die Website erneut besucht, wird die Session-ID aus dem Cookie ausgelesen und an den Server gesendet. Der Server kann dann die Session-ID mit den gespeicherten Session-Daten abgleichen. Wenn die Session-ID mit den gespeicherten Daten übereinstimmt, wird die Session wiederhergestellt.

Da die Session auf dem **Server gespeichert und verwaltet** wird, kann sie vom Client nicht manipuliert werden. So können Werte, welche der Benutzer nicht sehen sollte versteckt werden. Die Session-ID ist eindeutig und kann nicht von einem anderen Benutzer verwendet werden. So kann **sichergestellt** werden, dass nur der Benutzer auf die Session zugreifen kann, der sie erstellt hat. Durch das stehlen der Session-ID könnte [Session-Hijacking](../../Appendix/Sicherheit.md) möglich sein.

### Cluster von Webservern

Standardmässig werden Sessions auf dem Server gespeichert, auf dem sie erstellt wurden. Wenn eine Anwendung auf **mehreren Servern** läuft, kann es vorkommen, dass eine Session auf einem anderen Server **wiederhergestellt** wird. Dies kann zu Problemen führen, wenn die Session auf einem anderen Server wiederhergestellt wird, als sie erstellt wurde. Somit braucht es eine andere Lösung, um die Session-Daten zu speichern.

Dafür wird heutzutage meist [Redis](https://redis.io/) als [In-Memory-Datenbank](https://developer.redis.com/explore/what-is-redis/#session-storage) verwendet, da es eine **hohe Performance** bietet. Es gibt auch andere Lösungen, wie z.B. [Memcached](https://www.memcached.org/), [SQLite](https://www.sqlite.org/) oder [MongoDB](https://www.mongodb.com/docs/manual/reference/method/Session/). Diese Lösungen sind jedoch nicht so performant wie Redis. Die Session-Daten werden dann auf einem **externen Server** gespeichert und können von allen Servern aus gelesen werden.

## Wie erstelle ich eine Session?

Eine Session wird mit [`session_start()`](https://www.php.net/manual/en/function.session-start.php) erstellt. Diese Funktion muss **immer** aufgerufen werden, bevor auf die Session zugegriffen werden kann. Wichtig zu beachten ist, dass diese Funktion am **Start der Datei** geschrieben werden muss. Wenn die Session bereits erstellt wurde, wird die Funktion nichts tun. Wenn die Session noch nicht erstellt wurde, wird sie erstellt. Die Funktion [`session_status()`](https://www.php.net/manual/en/function.session-status.php) kann verwendet werden, um zu **überprüfen**, ob die Session bereits erstellt wurde.

## Wie verwalte ich Daten in einer Session?

Um Daten in einer Session zu **speichern**, muss der Session-Name und der Session-Wert ([Key-Value-Pair](https://www.indeed.com/career-advice/career-development/key-value-pair)) definiert werden. Dies wird mit [`$_SESSION`](https://www.php.net/manual/en/reserved.variables.session.php) erreicht, dass ein [as­so­zi­a­tives Array](../Aufgaben/Arrays.md) ist, welches die Session-Daten speichert. Der Session-Wert kann ein beliebiger Datentyp sein, einschliesslich eines **Arrays** oder eines Objekts. Bei der nächsten Abfrage wird der Session-Wert **wiederhergestellt**. und kann über denselben Namen abgerufen werden.

```php title="Session starten & Speichern von Daten"
<?php
session_start();

$_SESSION['visited'] = true;
```

```php title="Daten auslesen"
<?php
session_start();

if ($_SESSION['visited']) {
    echo 'Die Seite wurde bereits besucht.';
}
```

```php title="Session beenden"
<?php
session_start();
session_destroy();
```
