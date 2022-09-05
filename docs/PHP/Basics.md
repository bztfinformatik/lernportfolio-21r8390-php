---
tags:
    - PHP
    - Beispiele
---

# PHP Basics

Hier ist eine Zusammenfassung mit Beispielen aller wichtigen Methoden und Konstanten, die PHP verfügt. Zusätzlich gibt es ein sehr kompaktes [Cheatsheet](Appendix/Cheatsheet.md), welches nur die wichtigsten Stichworte enthält.

## Hello World

Mithilfe der Markierung `<?php` wird gekennzeichnet, dass ein PHP-Abschnitt folgt. In diesem können [PHP-Methoden](https://www.w3schools.com/php/php_ref_overview.asp) ausgeführt werden. **Wichtig** ist, dass Methoden mit einem `;` geschlossen werden.

=== "PHP"

    ```php
    <? // Kurzform von `<?php`
    echo "Hello World!";

    echo "<h1>Hello World!</h1>"; //(1)
    // ?> (2)
    ```

    1. Wenn PHP über einen Browser aufgerufen wird, dann können sogar HTML-Elemente dargestellt werden.
    2. Der Schlusstag ist optional und kann verwendet werden, falls der PHP-Abschnitt beendet werden sollte. Die kann nützlich sein, wenn PHP in eine HTML-Seite eingebunden ist.

=== "Ausgabe"

    Hello World!

    <h1>Hello World!</h1>

---

## Erweitertes Beispiel

**Funktionen** können auch mit Parametern und Rückgabewerten erstellt werden. Die [Datentypen](Appendix/Datentypen.md) sind optional, da PHP automatisch die richtigen Datentypen ermittelt. Mithilfe eines `$` am Anfang werden **Variablen** deklariert. Die Namensgebung ist nach dem CamelCase (_someAwesomeFunc_) format. Funktionen können in PHP nicht **überladen** werden. Es muss somit immer ein anderer Name gegeben werden. Parameter in Funktionen sind Call-By-Value, d.h. dass die Werte nicht verändert werden können. Um die Werte zu verändern, muss ein **Referenz-Operator** (`&`) verwendet werden.

```php title="Erweitertes Beispiel"
<?php

/**
 * Funktion zum Addieren von zwei Zahlen (1)
 *
 * @param integer $first Erster Wert
 * @param integer $second Zweiter Wert
 * @return integer Summe der beiden Zahlen
 */
function addNumbers(int $first, int $second): int
{
    return $first + $second;
}

// Aufruf der Funktion
addNumbers(2, 3);

// Automatisches Casten (2)
addNumbers(2, "3");
```

1. Mithilfe der Datentypen können die Parameter und Rückgabewerte definiert werden. Dies hilft dabei, Fehler zu vermeiden, da PHP die Parameter in den richtigen Typ umwandelt.
2. Mithilfe von `declare(strict_types=1);` kann die Datentyp-Kompatibilität aufgehoben werden. So müssen die richtigen Datentypen angegeben werden.
