---
tags:
    - PHP
---

# Sicherheit

Die Informationen für die folgenden Abschnitte wurden zum Teil aus dem [PHP-Einfach](https://www.php-einfach.de/experte/php-sicherheit) genommen.

Besonders hilfreich waren folgende zwei YouTuber, welche verständliche und kurze Videos erstellen:

[![Fireship](https://yt3.ggpht.com/ytc/AMLnZu80d66aj0mK3KEyMfpdGFyrVWdV5tfezE17IwRkhw=s48-c-k-c0x00ffffff-no-rj){ loading=lazy align=left }](https://www.youtube.com/c/Fireship)

[![PwnFunction](https://yt3.ggpht.com/ytc/AMLnZu8WJ3HyOFrxG6g7l8ebmKd2xjxLC-IShLdCcJj7Ew=s48-c-k-c0x00ffffff-no-rj){ loading=lazy align=right }](https://www.youtube.com/c/PwnFunction)

!!! warning ""

    Diese Seite ist noch in Arbeit und wird laufend ergänzt. Die bereits aufgelisteten Inhalte werden noch geschrieben oder überarbeitet.

## CSRF

**Cross-Site-Request-Forgery** ist das Verfahren

Wenn `CSRF` verhindert werden möchte, dann muss ein **One-Time-Token** generiert werden. Nur wenn dieser korrekt, darf die Abfrage betätigt werden.

Siehe Moodle:

```html
<input
	type="hidden"
	name="logintoken"
	value="Ul2oCaELs11l24264ekksYhNtgR9AMcc"
/>
```

## XSS

## SQL-Injection

Daten, welche ein Benutzer eingibt, werden fast immer in einer Datenbank gespeichert.

```sql title="Normales SQL-Statement"
INSERT INTO texte VALUE ('eingabe');
```

Durch eine gezielte Eingabe kann jedoch aus diesem Statement ausgebrochen werden:

Als eingabe wird dieser Text verwendet:

```sql title="Gefährliche Eingabe"
'); DROP DATABASE ;--
```

```sql title="Ausgeführte Ausgabe"
INSERT INTO texte VALUE (''); DROP DATABASE ;--
```

## Session-Hijacking
