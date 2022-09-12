---
tags:
    - PHP
---

# Sicherheit

Die Informationen für die folgenden Abschnitte wurden zum Teil aus dem [PHP-Einfach](https://www.php-einfach.de/experte/php-sicherheit) genommen.

Besonders hilfreich waren folgende zwei **YouTuber**, welche verständliche und kurze Videos erstellen:

[![Fireship](https://yt3.ggpht.com/ytc/AMLnZu80d66aj0mK3KEyMfpdGFyrVWdV5tfezE17IwRkhw=s48-c-k-c0x00ffffff-no-rj "Fireship"){ loading=lazy align=left .heart .profile-image }](https://www.youtube.com/c/Fireship)

[![PwnFunction](https://yt3.ggpht.com/ytc/AMLnZu8WJ3HyOFrxG6g7l8ebmKd2xjxLC-IShLdCcJj7Ew=s48-c-k-c0x00ffffff-no-rj "PwnFunction"){ loading=lazy align=right .heart .profile-image }](https://www.youtube.com/c/PwnFunction)

!!! warning ""

    Diese Seite ist noch in Arbeit und wird laufend ergänzt. Die bereits aufgelisteten Inhalte werden noch geschrieben oder überarbeitet.

## CSRF

**Cross-Site-Request-Forgery** ist das Verfahren

Wenn `CSRF` verhindert werden möchte, dann muss ein **One-Time-Token** generiert werden. Nur wenn dieser korrekt ist, darf die Abfrage betätigt werden.

Siehe Moodle:

```html
<input
	type="hidden"
	name="logintoken"
	value="Ul2oCaELs11l24264ekksYhNtgR9AMcc"
/>
```

## XSS

**Cross-Site-Scripting** ist das Verfahren um **JavaScript** in eine Webseite einzubinden. Dies kann zum Beispiel dazu verwendet werden, um einen **Cookie** zu stehlen. Da JavaScript auf dem Client ausgeführt wird, kann der Angriff bei alleinigem Betrachten der Webseite erfolgen.

```html
<script>
	alert(document.cookie);
</script>
```

## SQL-Injection

Daten, welche ein Benutzer eingibt, werden fast immer in einer **Datenbank** gespeichert.

```sql title="Normales SQL-Statement"
INSERT INTO texte VALUE ('eingabe');
```

Durch eine **gezielte Eingabe** kann jedoch aus diesem Statement ausgebrochen werden:

Als eingabe wird dieser Text verwendet:

```sql title="Gefährliche Eingabe"
'); DROP DATABASE ;--
```

```sql title="Ausgeführte Ausgabe"
INSERT INTO texte VALUE (''); DROP DATABASE ;--
```

## Session-Hijacking

Wenn eine Session gestartet wird, wird ein **Session-ID** generiert. Diese wird dann in einem **Cookie** gespeichert. Wenn ein Angreifer nun die Session-ID aus dem Cookie stiehlt, kann er sich als der Benutzer ausgeben. Die Auswirkung ist, dass der Angreifer Zugriff auf die vollen Daten des Benutzers hat und keine bis minimale Spuren hinterlässt.
