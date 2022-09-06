---
tags:
    - PHP
---

# Datentypen

PHP besitzt lose Datentypen. Das heisst, dass eine Variable nicht nur einen Wert, sondern auch einen Typ besitzt. Der Typ einer Variable kann sich während der Laufzeit des Programms ändern. PHP kennt folgende Datentypen:

| Datentyp | Beschreibung                      |
| :------: | --------------------------------- |
|  `int`   | Ganze Zahlen                      |
| `float`  | Gleitkommazahlen (`double`)       |
| `string` | Zeichenketten                     |
|  `bool`  | Boolesche Werte (true oder false) |
| `array`  | [Arrays](../Aufgaben/Arrays.md)   |
| `object` | Objekte                           |
|  `null`  | Nichts                            |
| `mixed`  | Mehrere Typen (union)             |

## Typen konvertieren

PHP kann Datentypen automatisch **konvertieren**. Das heisst, dass eine Variable, die einen anderen Typ hat, als der erwartete Typ, automatisch in den erwarteten Typ konvertiert wird. Das kann zu unerwarteten Ergebnissen führen. Um das zu verhindern kann `declare(strict_types=1);` am Anfang der Datei eingefügt werden. Damit wird die **strikte** Typisierung aktiviert. Das heisst, dass PHP keine automatische **Typkonvertierung** mehr durchführt. Es wird eine Fehlermeldung ausgegeben, wenn eine Variable einen anderen Typ hat, als der erwartete Typ. Dies kann helfen, schwerwiegende Fehler zu vermeiden.

=== "Lose Typen"

    ```php
    <?php
    function sum(int $a, int $b) {
        return $a + $b;
    }

    echo sum(1, 2); // 3
    echo sum(1.5, 2.5); // 3 (Da int 1.5 zu 1 und 2.5 zu 2 konvertiert)
    ?>
    ```

=== "Strikte Typen"

    ```php
    <?php
    declare(strict_types=1);

    function sum(int $a, int $b) {
        return $a + $b;
    }

    echo sum(1, 2); // 3
    echo sum(1.5, 2.5); // TypeError: sum(): Argument #1 ($a) must be of type int, float given
    ?>
    ```

## Call By ?

Bei der Übergabe von Parametern an eine Funktion wird zwischen **Call-By-Value** und **Call-By-Reference** unterschieden. Bei Call-By-Value wird der Wert oder eine Kopie des Parameters an die Funktion übergeben. Bei Call-By-Reference wird die originale Variable an die Funktion übergeben. Das heisst, dass Änderungen an der Variable in der Funktion auch in der ursprünglichen Variable sichtbar sind. In PHP wird immer Call-By-Value verwendet. Um eine Variable als **Referenz** zu übergeben, muss sie mit `&` vorangestellt werden.
