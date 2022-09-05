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

echo $zahl1 % $zahl2; //modulo (Rest der Division)

echo $zahl1 ** $zahl2; //potenzieren

echo 2*$zahl1 + 5*$zahl2 - 3; //Berechnet (2*10) + (5*5) - 3
```

## Kurzschreibweise

Einfache Rechnungen können auch mit der **Kurzschreibweise** durchgeführt werden. Dazu wird der Operator vor die Variable geschrieben. Es kann `+=`, `-=`, `*=`, `/=` und `%=` verwendet werden. Das `%=` ist die Modulo-Operation, welche den Rest einer Division zurückgibt. Für das einfache Plus eins rechnen kann auch `++`/`--` verwendet werden.

```php title="Kurzschreibweise"
<?
echo ++$zahl1; //Inkrementieren

echo $zahl1 += 5; //Addieren

echo $zahl1--; //Dekrementieren

echo $zahl1 -= 5; //Subtrahieren
```

## Mathematische Funktionen

Für das Rechnen mit Variablen gibt es auch **Mathematische Funktionen**. Diese können mit `Math::` vorangestellt werden. Die Funktionen sind `abs()`, `ceil()`, `floor()`, `round()`, `max()`, `min()`, `pow()`, `sqrt()` und `rand()`. Die Funktion `abs()` gibt den positiven Wert einer Zahl zurück. `ceil()` rundet eine Zahl auf und gibt die nächste ganze Zahl zurück. Mithilfe von `floor()` rundet man eine Zahl ab und gibt die nächste ganze Zahl zurück. Die Funktion `round()` rundet eine Zahl auf die Anzahl Kommastellen. Die höchste Zahl bekommt man mit `max()`, wobei `min()` die niedrigste Zahl zurück gibt. Die Potenz einer Zahl kann mit `pow()` Berechnet werden. Wurzel zieht man mit `sqrt()`. Eine zufällige Zahl, zwischen zwei Bereichen, erhält man mit `rand()`.

```php title="Mathematische Funktionen"
<?
echo abs(-5); // 5 (Positive Zahl)

echo ceil(3.1415); // 4 (Rundet auf)

echo floor(3.1415); // 3 (Rundet ab)

echo round(3.1415, 2); // 3.14 (2 Nachkommastellen)

echo max(5, 10, 15); // 15 (die höchste Zahl)

echo min(5, 10, 15); // 5 (kleinstes Argument)

echo pow(2, 3); // 8 (Hoch: 2^3)

echo sqrt(64); // 8 (Wurzel von √64)

echo rand(1, 10); // Zufallszahl zwischen 1 und 10
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
