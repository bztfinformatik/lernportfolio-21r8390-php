---
tags:
    - PHP
    - Aufgaben
---

# Dateien

Mit Dateien wird ständig gearbeitet. Sie sind ein wichtiger Bestandteil von Webanwendungen. Aus diesem Grund wird in den folgenden Kapiteln die Arbeit mit Dateien in PHP behandelt. Bevor mit einer Datei gearbeitet wird, sollte geprüft werden ob diese überhaupt **existiert**. Dies kann über mittels `file_exists()` gemacht werden. Wenn die Datei vorhanden ist, dann wird `true` zurückgegeben.

## Auslesen

Die Funktion `file_get_contents()` liest den **kompletten Inhalt** einer Datei aus und gibt diesen zurück. Der Dateiname wird als Parameter übergeben. Um den Inhalt in einer Webseite auszugeben sollten die **Zeilenumbrüche** mit `nl2br()` von `\n` in `<br />` umgewandelt werden.

```php title="Ganze Datei auslesen"
<?php
$content = file_get_contents('datei.txt');
echo nl2br($content);
```

---

Es ist nicht immer der Fall, dass auch die komplette Datei ausgegeben werden soll. Mithilfe von `file()` kann die Datei in ein **Array** gelesen werden. Jede Zeile wird dabei in ein Element des Arrays geschrieben. Über ein **For-Loop** kann dann der Inhalt der Datei Zeile für Zeile ausgegeben werden.

```php title="Datei Zeile für Zeile auslesen"
<?php
$content = file('datei.txt');
for ($i = 0; $i < count($content); $i++) {
    echo nl2br($content[$i]);
}
```

## Schreiben

Mit `file_put_contents()` kann der Inhalt einer Datei **überschrieben** werden. Der Dateiname wird als erster Parameter übergeben. Der zweite Parameter ist der Inhalt, der in die Datei geschrieben werden soll. Falls die Datei noch nicht vorhanden ist, wird sie **erstellt**. Der dritte Parameter ist optional und kann auf `FILE_APPEND` gesetzt werden, um den Inhalt an die Datei **anzuhängen**.

=== "Überschreiben"

    ```php
    <?php
    $content = 'Dies ist der neue Inhalt.';
    file_put_contents('datei.txt', $content);
    ```

=== "Anhängen"

    ```php
    <?php
    $content = 'Dies ist ein weiterer Inhalt.';
    file_put_contents('datei.txt', $content, FILE_APPEND);
    ```

## Löschen

Mit `unlink()` kann eine Datei gelöscht werden. Als **Rückgabewert** wird `true` zurückgegeben, wenn die Datei gelöscht wurde. Falls die Datei nicht vorhanden oder löschbar ist, wird `false` zurückgegeben.

```php
<?php
unlink('datei.txt');
```

## Umbenennen

Mit `rename()` kann eine Datei oder ein Verzeichnis umbenannt werden. Dabei muss zuerst der Name der **alten Datei** und dann der **neue Name** übergeben werden.

```php
<?php
rename("images","pictures");
rename('datei.txt', 'neuer_name.txt');
```
