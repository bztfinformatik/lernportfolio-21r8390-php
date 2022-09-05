---
tags:
    - PHP
    - Aufgaben
---

# Schleifen

Schleifen sind eine Möglichkeit, Code mehrmals auszuführen. In PHP gibt es vier verschiedene Arten von Schleifen:

| Schleifenart | Beschreibung                                                 |
| :----------: | ------------------------------------------------------------ |
|    `for`     | Solange die Bedingung erfüllt ist und zählt einen Index hoch |
|  `foreach`   | Für jedes Element in einem Array                             |
|   `while`    | Solange die Bedingung erfüllt ist                            |
|  `do while`  | Solange die Bedingung erfüllt ist (mindestens 1x)            |

## For

Die `for`-Schleife ist die einfachste Schleife. Sie zählt einen Index hoch und prüft, ob die Bedingung erfüllt ist. Wenn die Bedingung erfüllt ist, wird der Code ausgeführt. Anschließend wird der **Index** um `1` erhöht und die Bedingung erneut geprüft. Dieser Vorgang wird solange wiederholt, bis die Bedingung nicht mehr erfüllt ist.

```php title="Ausgabe 0 bis 10"
<?
for ($i = 0; $i <= 10; $i++) {
    echo $i;
}
```

## Foreach

Die `foreach`-Schleife ist eine **spezielle** Schleife, die nur für Arrays verwendet werden kann. Sie iteriert über jedes Element im **Array** und gibt den Wert des Elements aus.

```php title="Ausgabe von Array-Elementen"
<?
$names = ["Max", "Moritz", "Erika"];

foreach ($names as $name) {
    echo $name;
}
```

## While

Die `while`-Schleife ist eine Schleife, die solange ausgeführt wird, bis die Bedingung nicht mehr erfüllt ist. Sie ist sehr ähnlich zur `for`-Schleife, nur dass die Bedingung **am Ende** geprüft wird.

```php title="Ausgabe 0 bis 10"
<?
$i = 0;

while ($i <= 10) {
    echo $i;
    $i++;
}
```

## Do While

Die `do while`-Schleife ist eine Schleife, die **mindestens einmal** ausgeführt wird. Sie ist sehr ähnlich zur `while`-Schleife, nur dass die Bedingung am Ende geprüft wird.

```php title="Ausgabe 0 bis 10"
<?
$i = 0;

do {
    echo $i;
    $i++;
} while ($i <= 10);
```
