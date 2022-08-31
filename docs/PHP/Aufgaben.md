---
tags:
    - PHP
    - Beispiele
---

# PHP-Aufgaben

Das hier ist eine Zusammenfassung von **diversen Aufgaben**, die ich in gelöst habe. Die Aufgaben sind in verschiedene Kategorien unterteilt. Die Aufgaben sind nicht sortiert, sondern in der Reihenfolge, in der ich sie gelöst habe.

## Rechnen mit Variablen

PHP verfügt wie alle anderen Programmiersprachen über die **Grundrechenarten**. Diese können mit Variablen durchgeführt werden. Die Rechenzeichen sind `+`, `-`, `*` und `/`. Wichtig zu beachten ist, dass Kommazahlen im englischen Format, mit einem `.` geschrieben werden.

```php title="Berechnungen mit Variablen"
<?php
$zahl1 = 10;
$zahl2 = 5.5;

echo $zahl1 + $zahl2; //addieren

echo $zahl1 - $zahl2; //subtrahieren

echo $zahl1 * $zahl2; //multiplizieren

echo $zahl1 / $zahl2; //dividieren

echo pow($zahl1,$zahl2); //Zahl1 hoch Zahl2 (10^5)

echo sqrt(64); // Wurzel von √64

echo 2*$zahl1 + 5*$zahl2 - 3; //Berechnet (2*10) + (5*5) - 3
```

### Kurzschreibweise

Einfache Rechnungen können auch mit der **Kurzschreibweise** durchgeführt werden. Dazu wird der Operator vor die Variable geschrieben. Es kann `+=`, `-=`, `*=`, `/=` und `%=` verwendet werden. Das `%=` ist die Modulo-Operation, welche den Rest einer Division zurückgibt. Für das einfache Plus eins rechnen kann auch `++`/`--` verwendet werden.

```php title="Kurzschreibweise"
<?
echo ++$zahl1; //Inkrementieren

echo $zahl1 += 5; //Addieren

echo --$zahl1; //Dekrementieren

echo $zahl1 -= 5; //Subtrahieren
```

### Strings

Strings sind wie in allen Programmiersprachen **immutable**. Jedoch wurde beim **zusammenfügen** von Strings etwas vom Ordinären abgewichen. Dies passiert in PHP mithilfe eines Punktes `.`, welcher sich zwischen den Zeichenketten befindet. Der [Grund](https://stackoverflow.com/a/4266859/16632604) wieso ein Punkt verwendet wurde wird, ist, da die Verwendung eines `+` in einer Sprache mit freier Typisierung nicht sonderlich praktisch wäre.

[![](https://res.cloudinary.com/practicaldev/image/fetch/s--ij_hqKUb--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_auto%2Cw_880/https://github.com/damiancipolat/js_vs_memes/blob/master/doc/mind_js.jpg%3Fraw%3Dtrue){ align=right width="300" loading=lazy }](https://dev.to/damxipo/javascript-versus-memes-explaining-various-funny-memes-2o8c)

```php title="Beispiel + für Zusammenfügung"
<?
echo "a" + "b" // ASCII oder "ab"
echo 1 + 2; // 12 oder 3 ergeben?
```

Dies ist ein grosses Problem bei losen **Typisierung**, da nie klar ist was genau mit dem Datentyp passieren sollte. Im Falle von JavaScript kommt dann ein solches [Durcheinander](https://github.com/aemkei/jsfuck) heraus. Mit einem Punkt ist klar, dass Strings kombiniert werden sollten.

## Arrays

Arrays sind eine **Sammlung von Werten**. Sie können numerisch oder assoziativ sein. Numerische Arrays haben eine **Nummer** als Schlüssel. Assoziative Arrays haben einen **Text** als Schlüssel. Arrays können auch **mehrdimensional** sein. Das heisst, dass ein Array in einem Array enthalten sein kann. Arrays können auch **Objekte** enthalten.

=== "Numerisch"

    ```php
    <?php
    $array = array(1,2,3,4,5);

    echo $array[0]; //1

    echo $array[1]; //2

    echo $array[2]; //3

    echo $array[3]; //4

    echo $array[4]; //5
    ```

=== "Assoziativ"

    ```php
    <?php
    $array = array("name" => "Manuel", "alter" => 18);

    echo $array["name"]; //Manuel

    echo $array["alter"]; //18
    ```

=== "Mehrdimensional"

    ```php
    <?php
    $array = array(
        array("name" => "Manuel", "alter" => 18),
        array("name" => "Herr Inauen", "alter" => 20)
    );

    echo $array[0]["name"]; //Manuel

    echo $array[0]["alter"]; //18

    echo $array[1]["name"]; //Herr Inauen

    echo $array[1]["alter"]; //23
    ```

### Werte hinzufügen

Mithilfe des Zeichens `[]` können Werte zu einem Array **hinzugefügt** werden. Dabei wird der Schlüssel automatisch generiert, wenn dies möglich ist. Ansonsten muss er in den Klammern angegeben werden.

=== "Numerisch"

    ```php
    <?
    $array = array();

    $array[] = "Manuel";

    echo $array[0]; //Manuel
    ```

=== "Assoziativ"

    ```php
    <?
    $array = array();

    $array["name"] = "Manuel";

    echo $array["name"]; //Manuel
    ```

### In Tabelle ausgeben

PHP kann auch **Tabellen** ausgeben. Dazu wird die Funktion `echo` mit dem Parameter `table` verwendet. Die Tabelle wird mit dem Tag `<table>` ausgegeben. Die Tabellenzeilen werden mit dem Tag `<tr>` ausgegeben. Die Tabellenzellen werden mit dem Tag `<td>` ausgegeben.

=== "Numerisch"

    ```php
    <?php
    $array = array(3,7,5,1,8,13,2);

    echo "<table border='1'>";
    echo "<tr><th>Index</th><th>Wert</th></tr>";
    for($i = 0; $i < count($array); $i++){
        echo "<tr><td>$i</td><td>$array[$i]</td></tr>";
    }
    echo "</table>";
    ```

    ??? done "Ausgabe"

        <table border="1"><tbody><tr><th>Index</th><th>Wert</th></tr><tr><td>0</td><td>3</td></tr><tr><td>1</td><td>7</td></tr><tr><td>2</td><td>5</td></tr><tr><td>3</td><td>1</td></tr><tr><td>4</td><td>8</td></tr><tr><td>5</td><td>13</td></tr><tr><td>6</td><td>2</td></tr></tbody></table>

=== "Assoziativ"

    ```php
    <?php
    $array = array("name" => "Manuel", "alter" => 18, "klasse" => "IN20/24c");

    echo "<table border='1'>";
    echo "<tr><th>Index</th><th>Wert</th></tr>";
    foreach($array as $key => $value){
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }
    echo "</table>";
    ```

    ??? done "Ausgabe"

        <table border="1"><tbody><tr><th>Index</th><th>Wert</th></tr><tr><td>name</td><td>Manuel</td></tr><tr><td>alter</td><td>18</td></tr><tr><td>klasse</td><td>IN20/24c</td></tr></tbody></table>

### Weitere Funktionen

PHP verfügt über eine Reihe von Funktionen, welche mit Arrays arbeiten. Die wichtigsten sind `count()`, `array_push()`, `in_array()` und `sort()`. Da Arrays sehr ausführlich sind und nicht nur einfach hinzufügen, sortieren und entfernen können, ist dieser Abschnitt im [Appendix](Arrays.md) genauer ausgeführt.

## HTTP Parameter

HTTP Parameter werden in der URL übergeben. Sie werden mit einem `?` getrennt von der URL. Die Parameter werden mit einem `&` getrennt. Ein **Parameter** besteht aus einem Namen und einem Wert. Der Wert wird mit einem `=` getrennt. Der Wert kann auch leer sein. Der Name und der Wert werden URL-kodiert. Das bedeutet, dass Leerzeichen mit einem `+` ersetzt werden und Sonderzeichen mit `%` und einem Hexadezimalwert ersetzt werden. Der Wert kann auch ein Array sein. Dann wird der Name mehrfach verwendet. Der Wert eines Arrays wird mit einem `,` getrennt.

**GET** wird in der URL übergeben. **POST** wird im Body übergeben. GET wird in der URL angezeigt, wobei POST nicht angezeigt wird. GET ist limitiert auf _2048_ Zeichen, POST ist unbegrenzt. GET ist für Suchanfragen, POST für Formulare. Wenn die Werte nicht übergeben wurden, dann wird eine Warnung angezeigt. Um diese zu verhindern kann mit [`isset()`](https://www.w3schools.com/php/func_var_isset.asp) geprüft werden, ob der Wert übergeben wurde.

=== "GET"

    ```html
    <form method="get">
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
