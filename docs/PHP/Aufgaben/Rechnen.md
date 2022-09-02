---
tags:
    - PHP
    - Aufgaben
---

# Rechnen mit Variablen

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

## Kurzschreibweise

Einfache Rechnungen können auch mit der **Kurzschreibweise** durchgeführt werden. Dazu wird der Operator vor die Variable geschrieben. Es kann `+=`, `-=`, `*=`, `/=` und `%=` verwendet werden. Das `%=` ist die Modulo-Operation, welche den Rest einer Division zurückgibt. Für das einfache Plus eins rechnen kann auch `++`/`--` verwendet werden.

```php title="Kurzschreibweise"
<?
echo ++$zahl1; //Inkrementieren

echo $zahl1 += 5; //Addieren

echo --$zahl1; //Dekrementieren

echo $zahl1 -= 5; //Subtrahieren
```

## Strings

Strings sind wie in allen Programmiersprachen **immutable**. Jedoch wurde beim **zusammenfügen** von Strings etwas vom Ordinären abgewichen. Dies passiert in PHP mithilfe eines Punktes `.`, welcher sich zwischen den Zeichenketten befindet. Der [Grund](https://stackoverflow.com/a/4266859/16632604) wieso ein Punkt verwendet wurde wird, ist, da die Verwendung eines `+` in einer Sprache mit freier Typisierung nicht sonderlich praktisch wäre.

[![](https://res.cloudinary.com/practicaldev/image/fetch/s--ij_hqKUb--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_auto%2Cw_880/https://github.com/damiancipolat/js_vs_memes/blob/master/doc/mind_js.jpg%3Fraw%3Dtrue){ align=right width="300" loading=lazy }](https://dev.to/damxipo/javascript-versus-memes-explaining-various-funny-memes-2o8c)

```php title="Beispiel + für Zusammenfügung"
<?
echo "a" + "b" // ASCII, Binary oder "ab"
echo "2a" + 2 // 4 oder "2a2"
echo 1 + 2; // 12 oder 3 ergeben?
```

Dies ist ein grosses Problem bei losen **Typisierung**, da nie klar ist was genau mit dem Datentyp passieren sollte. Im Falle von JavaScript kommt dann ein solches [Durcheinander](https://github.com/aemkei/jsfuck) heraus. Mit einem Punkt ist klar, dass Strings kombiniert werden sollten.
