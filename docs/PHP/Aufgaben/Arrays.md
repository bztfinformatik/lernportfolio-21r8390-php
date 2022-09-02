---
tags:
    - PHP
    - Aufgaben
---

# Arrays

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

## Werte hinzufügen

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

## In Tabelle ausgeben

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

## Weitere Funktionen

PHP verfügt über eine Reihe von Funktionen, welche mit Arrays arbeiten. Die wichtigsten sind `count()`, `array_push()`, `in_array()` und `sort()`. Da Arrays sehr ausführlich sind und nicht nur einfach hinzufügen, sortieren und entfernen können, ist dieser Abschnitt im [Appendix](Arrays.md) genauer ausgeführt.
