---
tags:
    - PHP
    - Aufgaben
---

# Vergleiche

Häufig ist es notwendig, Werte miteinander zu vergleichen, um die Ausgabe oder den Ablauf zu verändern. Da PHP lose [Datentypen](../Appendix/Datentypen.md) verwendet, ist es nicht immer einfach, die richtigen **Vergleichsoperatoren** zu finden. In diesem Kapitel werden die wichtigsten Vergleichsoperatoren vorgestellt. PHP kennt folgende Operatoren:

|  Operator   | Name            | Erläuterung                                                                   |
| :---------: | --------------- | ----------------------------------------------------------------------------- |
| `$a == $b`  | Gleich          | $a und $b haben den selben Wert unabhängig vom Typ (Typen werden konvertiert) |
| `$a === $b` | Identisch       | $a und $b haben den selben Typ und Inhalt                                     |
| `$a != $b`  | Ungleich        | $a und $b haben nicht den selben Wert unabhängig vom Typ                      |
| `$a !== $b` | Nicht Identisch | $a und $b haben einen unterschiedlichen Typ oder unterschiedliche Werte       |
|  `$a < $b`  | Kleiner         | $a muss kleiner als $b sein                                                   |
| `$a <= $b`  | Kleiner Gleich  | $a muss kleiner oder gleich $b sein                                           |
|  `$a > $b`  | Grösser         | $a muss grösser als $b sein                                                   |
| `$a >= $b`  | Grösser Gleich  | $a muss grösser oder gleich $b sein                                           |

### Unterschied == und ===

PHP hat schwache Typen, dass heisst es gibt **zwei Arten** von Vergleichen: `==` und `===`. `==` vergleicht nur den Wert, `===` vergleicht Wert und Typ.

```php
<?
echo 1 == "1"; // true
echo 1 === "1"; // false
```

## Logische Operatoren

Logische Operatoren werden verwendet, um **mehrere** Vergleiche zu verknüpfen. Die wichtigsten Operatoren sind:

|   Operator   | Name           | Erläuterung                                                                                                                               |
| :----------: | -------------- | ----------------------------------------------------------------------------------------------------------------------------------------- |
| `and` / `&&` | Und            | Wahr, wenn Links und Rechts wahr sind                                                                                                     |
| `or` / \|\|  | Oder           | Wahr, wenn eine Seite wahr ist                                                                                                            |
|    `xor`     | Entweder Order | Wahr, wenn nur eine Seite wahr ist                                                                                                        |
|     `!`      | Nicht          | Invertiert wahr in falsch                                                                                                                 |
|    `<=>`     | Spaceship      | Gibt einen Int zurück (Wie [C# `#!csharp CompareTo()`](https://docs.microsoft.com/en-us/dotnet/api/system.string.compareto?view=net-6.0)) |

## If - Statements

Die Vergleiche alleine bringen ohne eine **Überprüfung** nicht sehr viel. Mit dem `if` können wir überprüfen, ob eine **Bedingung** erfüllt ist. Wenn die Bedingung erfüllt ist, wird der Codeblock ausgeführt. Wenn die Bedingung nicht erfüllt ist, wird der Codeblock übersprungen. Der Codeblock wird immer mit geschweiften Klammern `{}` umschlossen. Die Bedingung wird in runden Klammern `()` geschrieben.

=== "If"

    ```php
    <?
    if (1 === 1) {
        echo "1 ist 1";
    }
    ```

=== "Else"

    Mit `else` können wir einen Codeblock definieren, der ausgeführt wird, wenn die Bedingung nicht erfüllt ist.

    ```php
    <?
    if (1 === 1) {
        echo "1 ist 1";
    } else {
        echo "1 ist nicht 1";
    }
    ```

=== "Else If"

    Mit `else if` können wir weitere Bedingungen definieren, die überprüft werden, wenn die erste Bedingung nicht erfüllt ist.

    ```php
    <?
    if (1 === "1") {
        echo "1 ist 1";
    } else if (1 == "1") {
        echo "1 ist \"1\" (String)";
    } else {
        echo "1 ist nicht 1 und \"1\" (String)";
    }
    ```

### Switch

Mit `switch` können wir eine Variable auf **verschiedene** Werte überprüfen. Dies kann nützlich sein, wenn mehre Überprüfungen nacheinander ausgeführt werden sollen. Der Codeblock wird ausgeführt, wenn der Wert der Variable mit dem Wert des `case` übereinstimmt. Mit `break` können wir den Codeblock beenden. Ohne `break` wird der Codeblock bis zum Ende ausgeführt. Mit `default` können wir einen Codeblock definieren, der ausgeführt wird, wenn keine der Bedingungen erfüllt ist.

```php
<?
$a = 1;
switch ($a) {
    case 1:
        echo "a ist 1";
        break;
    case 2:
        echo "a ist 2";
        break;
    default:
        echo "a ist nicht 1 oder 2";
        break;
}
```
