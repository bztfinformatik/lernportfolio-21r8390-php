---
tags:
    - PHP
    - Aufgaben
---

# HTTP Parameter

HTTP Parameter werden in der URL übergeben. Sie werden mit einem `?` getrennt von der URL. Die Parameter werden mit einem `&` getrennt. Ein **Parameter** besteht aus einem Namen und einem Wert. Der Wert wird mit einem `=` getrennt. Der Wert kann auch leer sein. Der Name und der Wert werden URL-kodiert. Das bedeutet, dass Leerzeichen mit einem `+` ersetzt werden und Sonderzeichen mit `%` und einem Hexadezimalwert ersetzt werden. Der Wert kann auch ein Array sein. Dann wird der Name mehrfach verwendet. Der Wert eines Arrays wird mit einem `,` getrennt.

## GET und POST

**GET** wird in der URL übergeben. **POST** wird im Body übergeben. GET wird in der URL angezeigt, wobei POST nicht angezeigt wird. GET ist limitiert auf _2048_ Zeichen, POST ist unbegrenzt. GET ist für Suchanfragen, POST für Formulare. Wenn die Werte nicht übergeben wurden, dann wird eine Warnung angezeigt. Um diese zu verhindern kann mit [`isset()`](https://www.w3schools.com/php/func_var_isset.asp) geprüft werden, ob der Wert übergeben wurde. Mithilfe von `empty()` kann geprüft werden, ob der Wert leer ist. In PHP wird ein **assoziatives Array** hinterlegt, mit dem Namen des Parameters. Über sogenannte [SuperGlobals](https://www.w3schools.com/PHP/php_superglobals.asp) kann auf die Parameter zugegriffen werden. Über `$_SERVER["PHP_SELF"]` kann direkt auf die aktuelle Seite verwiesen werden.

=== "GET"

    ```html
    <form action='<?php echo $_SERVER["PHP_SELF"] ?>' method="get">
        Name: <input type="text" name="name" /><br />
        Alter: <input type="number" name="alter" /><br />
        <input type="Submit" value="Absenden" />
    </form>
    ```

    ```php
    <?php
    //http://localhost:3000/?name=Manuel&alter=18

    if(isset($_GET["name"]))
    {
        echo $_GET["name"]; //Manuel
    }

    if(isset($_GET["alter"]))
    {
        echo $_GET["alter"]; //18
    }
    ```

=== "POST"

    ```html
    <form action="seite2.php" method="post">
        Name: <input type="text" name="name" /><br />
        Alter: <input type="number" name="alter" /><br />
        <input type="Submit" value="Absenden" />
    </form>
    ```

    ```php
    <?php
    echo $_POST["name"]; //Manuel

    echo $_POST["alter"]; //18
    ```

## Anwendungsfälle

| Aufgabe                             | GET                                       | GET                                                             |
| ----------------------------------- | ----------------------------------------- | --------------------------------------------------------------- |
| :material-cached: Cacheable         | :material-check-all: Browser & Server     | :material-close:                                                |
| :material-book: Wiederaufrufbar     | :material-check-all:                      | :material-close:                                                |
| :material-eye-outline: Sichtbarkeit | :material-check: Sichtbar in URL          | :material-check: Nicht sichtbar                                 |
| :material-security: Sicherheit      | :material-check: Sensitive Daten sichtbar | :material-check: Sensitive Daten versteckt                      |
| :material-chart-line: Zeichenlimit  | :material-close: 2048                     | :material-check-all: Unbegrenzt (Limit bei Server)              |
| :octicons-typography-24: Zeichenart | :material-close: Nur ASCII                | :material-check-all: Alles erlaubt (Bilder, Audio, Binary, ...) |
| :material-table: Abfrage            | :material-table-question: Daten anfordern | :material-table-edit: Daten modifizieren                        |
