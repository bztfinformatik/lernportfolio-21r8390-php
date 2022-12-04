---
tags:
    - PHP
    - Sessions & Cookies
---

# Cookies

Ein [Cookie :material-cookie-outline:](https://www.php-einfach.de/php-tutorial/cookies/) ist eine kleine Textdatei, die vom Webserver **lokal** im Browser des Clients gespeichert wird. Cookies haben ein **Ablaufdatum**, worüber die Gültigkeit des Cookies bestimmt wird. Cookies können auch gelöscht werden, wenn der Benutzer dies möchte. Zudem ist es möglich, dass sie über **Domains** hinweg ([CORS](https://developer.mozilla.org/en-US/docs/Web/Security/Same-origin_policy#cross-origin_network_access)) weitergegeben werden.

## Sinn und Zweck von Cookies

Im Allgemeinen werden Cookies verwendet, um **Benutzerinformationen** zu speichern, wie z.B. die bevorzugte Sprache, die Produkte, die im Warenkorb liegen, oder die **Session ID**, wenn der Benutzer eine Website besucht. Sie können auch verwendet werden, um die Besuche auf einer Website zu zählen, um die **Benutzerfreundlichkeit** zu verbessern. Sehr oft werden sie auch für die [Anmeldung](https://www.php-einfach.de/experte/php-codebeispiele/loginscript/angemeldet-bleiben/) auf einer Website verwendet, damit sich der Benutzer nicht jedes Mal neu anmelden muss.

Der **Vorteil** von Cookies besteht darin, dass die Informationen auf dem Computer des Benutzers gespeichert werden. Wenn die Session durch das Schliessen des Browsers beendet wird, dann bleiben die Cookies **bestehen**. So können Daten über mehrere Seitenaufrufe hinweg gespeichert werden. Dies ist besonders nützlich, wenn der Benutzer eine Website besucht, die **mehrere Seiten** hat, wie z.B. ein Online-Shop.

## Unterschied zwischen Sessions und Cookies

Sessions und Cookies sind **nicht dasselbe**. Sessions werden verwendet, um Benutzerinformationen auf dem **Server** zu speichern, während eine Website besucht wird. Cookies werden verwendet, um [Benutzerinformationen](https://developer.mozilla.org/en-US/docs/Web/HTTP/Cookies) **lokal** beim Benutzer zu speichern, welche **über Sessions hinaus** verwendet werden können. Zudem haben Cookies eine **Lebensdauer**, während Sessions nur bis zum Schliessen des Browsers bestehen.

Da die Cookies im Browser gespeichert werden können diese **manipuliert** und **eingesehen** werden. Dies ist ein [Sicherheitsrisiko](../../Appendix/Sicherheit.md), welches durch die Verwendung von Sessions vermieden werden kann. Aus diesem Grund dürfen **sensible** Informationen wie Passwörter nicht in Cookies gespeichert werden. Aus diesem Grund sollte man Cookies **nicht trauen** und diese mit Vorsicht behandeln.

Gleich wie die Session haben Cookies eine **eindeutige ID**, welche verwendet wird, um die Informationen zu identifizieren. Die ID wird in einem Cookie gespeichert, welches auf dem Computer des Benutzers gespeichert wird. Wenn der Benutzer eine Seite aufruft, dann wird die ID aus dem Cookie ausgelesen und verwendet, um die Informationen zu **identifizieren**.

## Wie funktionieren Cookies?

Nachdem eine Anfrage an den Server gesendet wurde, kann der Server eine **Antwort** mit einem Cookie über den [Header](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie) `Set-Cookie` senden. Dieses Cookie wird vom Browser gespeichert und bei **jeder weiteren Anfrage** an den Server gesendet. Der Server kann dann die Informationen aus dem Cookie auslesen und verwenden. Die Informationen können auch **geändert** werden, indem ein neues Cookie mit dem gleichen Namen gesendet wird. Dieses Cookie überschreibt das alte Cookie. Wenn das Cookie ein **Ablaufdatum** hat, dann wird es nach Ablauf des Datums gelöscht. Wenn das Cookie gelöscht werden soll, dann kann dies durch das Setzen eines Cookies mit dem gleichen Namen und einem Ablaufdatum in der **Vergangenheit** erreicht werden.

Die Cookies werden **nicht** vom Server gelöscht, wenn der Benutzer die Website verlässt. Sie bleiben **bestehen**, bis sie vom Benutzer gelöscht werden oder das Ablaufdatum erreicht wird.

Je nach Browser werden Cookies unterschiedlich [gespeichert](https://www.digitalcitizen.life/cookies-location-windows-10/) und verwaltet. Die meisten Browser speichern Cookies in einem **eigenen Verzeichnis** oder einer **SQLite-Datenbank**. Sie werden jedoch immer in einem Key-Value-Format gespeichert. Der Key ist der Name des Cookies und der Value ist der Wert des Cookies.

Die meisten Browser erlauben es, Cookies zu **löschen** und zu **verwalten**. Die meisten Browser erlauben es auch, Cookies zu **blockieren**. Wenn Cookies blockiert werden, dann werden sie nicht gespeichert und können auch nicht verwendet werden. Dies kann zu **Problemen** führen, wenn die Website auf Cookies angewiesen ist.

## Wie kann ich Cookies setzen?

Um ein Cookie zu setzen, muss der Server eine Antwort mit dem Header `Set-Cookie` senden. Dieser Header enthält den Namen und den Wert des Cookies. Es können auch weitere Attribute gesetzt werden, um das Cookie zu **verwalten**. Die Attribute werden durch ein Semikolon getrennt.

```yml
Set-Cookie: <cookie-name>=<cookie-value>
```

In PHP kann dies mit der Funktion [`setcookie()`](https://www.php.net/manual/en/function.setcookie.php) erreicht werden. Diese Funktion muss **vor** dem Senden der Antwort aufgerufen werden. Wenn die Funktion nicht aufgerufen wird, dann wird das Cookie nicht gesetzt.

```php title="Cookie bis zum Ende der Session"
<?php
setcookie("cookie-name", "cookie-value", 0);
```

```php title="Cookie mit Ablaufdatum"
<?php
setcookie("cookie-name", "cookie-value", time() + (3600 * 24)); //(1)!
```

1. Dieser Cookie würde jetzt _3600 \* 24 Sekunden_ halten und das entspricht **24 Stunden**.

## Wie kann ich Cookies auslesen?

Um die Informationen aus einem Cookie **auszulesen**, muss der Server die Anfrage auswerten und den Header `Cookie` auslesen. In PHP kann dies mit der globalen Variable [`$_COOKIE`](https://www.php.net/manual/en/reserved.variables.cookies.php) erreicht werden.

```php title="Cookie auslesen"
<?php
$cookieValue = $_COOKIE["cookie-name"];
```

Bei dem **Auslesen** von Cookies ist ausserdem noch zu beachten das sie **nur** in dem Verzeichnis wo ein Cookie gesetzt wurde, der Cookie auch ausgelesen werden kann. In einem anderen Verzeichnis ist er **nicht auslesbar**.

## Wie kann ich Cookies löschen?

Um ein Cookie zu **löschen**, muss der Server eine Antwort mit dem Header `Set-Cookie` senden. Dieser Header enthält den Namen des Cookies und ein Ablaufdatum in der **Vergangenheit**. Durch den selben Namen wird der bestehende Cookie überschrieben und gelöscht.

```php
<?php
setcookie("cookie-name", "", time() - 3600);
```
