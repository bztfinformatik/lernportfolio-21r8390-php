---
hide:
    - toc
tags:
    - PHP
    - Cheatsheet
---

# Arrays

Arrays sind eine **Sammlung von Werten**. Sie können numerisch oder assoziativ sein. Numerische Arrays haben eine **Nummer** als Schlüssel. Assoziative Arrays haben einen **Text** als Schlüssel. Arrays können auch **mehrdimensional** sein. Das heisst, dass ein Array in einem Array enthalten sein kann. Arrays können auch **Objekte** enthalten. Einen eigenen Quicksort in PHP implementiert kann [hier](Beispiele/Sortierung.php) gefunden werden.

---

```php title="Arrays in Strings konvertieren"
<?php
$array = array("Manuel", "Herr Inauen", "Herr Müller");

echo implode(", ", $array); //Manuel, Herr Inauen, Herr Müller
```

```php title="Strings in Arrays konvertieren"
<?php
$string = "Manuel, Herr Inauen, Herr Müller";

$array = explode(", ", $string);

echo var_dump($namen); // (1)
```

1. `var_dump()` gibt den Inhalt einer Variable aus. Dies ist sehr nützlich, um den Inhalt einer Variable zu überprüfen. Hier in diesem Beispiel wäre die Ausgabe: <br>
   `array(3) { [0]=> string(6) "Manuel" [1]=> string(11) "Herr Inauen" [2]=> string(10) "Herr Müller" }`

```php title="Array Elemente zählen"
<?php
$array = array("Manuel", "Herr Inauen", "Herr Müller");

echo count($array); //3
```

```php title="Array Elemente hinzufügen / entfernen"
<?php
$array = array("Manuel", "Herr Inauen");

array_push($array, "Herr Müller");

echo var_dump($array); // Manuel, Herr Inauen, Herr Müller

array_pop($array);

echo var_dump($array); // Manuel, Herr Inauen
```

```php title="Array Elemente sortieren"
<?php
$array = array("Manuel", "Herr Inauen", "Herr Müller");

sort($array); // (1)

echo var_dump($array); // Herr Inauen, Herr Müller, Manuel
```

1. `sort()` sortiert die Elemente **aufsteigend**. `rsort()` sortiert die Elemente **absteigend**. Als Sortieralgorithmus wird [Quicksort](https://www.programiz.com/dsa/quick-sort) verwendet.

```php title="Array Elemente mischen"
<?php
$array = array("Manuel", "Herr Inauen", "Herr Müller");

shuffle($array);

echo var_dump($array); // Herr Müller, Herr Inauen, Manuel
```

```php title="Array Elemente umkehren"
<?php
$array = array("Manuel", "Herr Inauen", "Herr Müller");

$array = array_reverse($array);

echo var_dump($array); // Herr Müller, Herr Inauen, Manuel
```

```php title="Array durchsuchen"
<?php
$array = array("Manuel", "Herr Inauen", "Herr Müller");

echo array_search("Herr Inauen", $array); //1 (1)
```

1. Die Funktion `array_search()` gibt den Schlüssel des gesuchten Elements zurück. Wenn das Element nicht gefunden wird, wird `false` zurückgegeben.

=== "Numerisches Array"

    ```php title="In Array prüfen"
    <?php
    $array = array("Manuel", "Herr Inauen", "Herr Müller");

    echo in_array("Herr Inauen", $array); //true
    ```

=== "Assoziatives Array"

    ```php title="In Array prüfen"
    <?php
    $array = array("name" => "Manuel", "alter" => 18);

    echo array_key_exists("name", $array); //true (1)
    ```

    1. `array_key_exists()` prüft, ob ein Schlüssel mit diesem Namen im Array vorhanden ist.
