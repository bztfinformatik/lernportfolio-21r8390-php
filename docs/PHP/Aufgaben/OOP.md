---
tags:
    - PHP
    - Aufgaben
---

# Objekt Orientierte Programmierung

In der Objekt Orientierte Programmierung ([OOP](https://www.php-einfach.de/experte/objektorientierte-programmierung-oop/)) werden Objekte verwendet, um Daten und Funktionen zu **gruppieren**. Klassen sind die Grundlage für die Objektorientierung. Sie definieren die **Eigenschaften und Methoden**, die ein Objekt haben kann. Objekte sind Instanzen von Klassen. Sie können mehrere Objekte einer Klasse erstellen. Objekte können Daten in Feldern speichern und Methoden ausführen.

## Vorteile

Vorteil von OOP ist, dass der Code **wiederverwendbar** ist. So entsteht nur minimaler doppelter Code, was zur Übersicht und Wartbarkeit hilft. Durch die **Struktur** ist es einfacher zu verstehen, was der Code macht und wie Prozesse ablaufen. Unser Leben besteht aus Objekten, also wieso nicht auch unser Code?

## Klassen

Eine Klasse ist ein **Bauplan** für Objekte. Sie beschreibt die Eigenschaften und Methoden, die ein Objekt haben soll. Das Objekt ist dann eine **Instanz** dieser Vorlage. Mithilfe von `new` kann eine Klasse **instanziiert** werden. Eine Klasse kann in PHP über folgenden Syntax definiert werden:

```php
<?
class Klassenname
{
    // Eigenschaften
    // Methoden
}

$klasse = new Klassenname();
```

### Eigenschaften

Eigenschaften sind **Variablen**, die in einer Klasse definiert werden. Sie können über die `->`-Notation aufgerufen werden, was vergleichbar mit dem Punkt (`.`) aus anderen Sprachen ist. Für lokale Variablen der Klasse wird `$this` verwendet. Für statische Variablen kann `self` verwendet werden.

```php
<?
class Klassenname
{
    public $name = "Max";
}
```

### Methoden

Methoden sind **Funktionen**, die in einer Klasse definiert werden. Sie können gleich wie die Eigenschaften aufgerufen werden. Eine Methode wird nicht automatisch ausgeführt, sondern muss **explizit** aufgerufen werden. Statische Methoden werden mit `static` gekennzeichnet und können ohne Instanziierung aufgerufen werden.

```php
<?
class Klassenname
{
    public function getName()
    {
        return $this->name;
    }
}
```

### Konstruktor

Der Konstruktor ist eine Methode, die bei der **Erstellung** eines Objektes ausgeführt wird. Er wird mit `__construct()` definiert. Der Konstruktor kann auch Parameter enthalten, die beim Erstellen des Objektes übergeben werden können. Mithilfe eines Dekonstruktors können diese Werte am Ende der **Lebenszeit** wieder abgeräumt werden.

```php
<?
class Klassenname
{
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function __destruct()
    {
        echo "Objekt wird zerstört";
    }
}
```

## Zugriffsmodifizierer

Zugriffsmodifizierer sind Schlüsselwörter, die die **Sichtbarkeit** von Eigenschaften und Methoden in einer Klasse steuern. Es gibt drei Modifizierer:

| :material-folder-edit: Modifizierer | Beschreibung                                                                          |
| ----------------------------------- | ------------------------------------------------------------------------------------- |
| `public`                            | Die Eigenschaft oder Methode ist für alle sichtbar.                                   |
| `protected`                         | Die Eigenschaft oder Methode ist nur für die Klasse und abgeleitete Klassen sichtbar. |
| `private`                           | Die Eigenschaft oder Methode ist nur für die Klasse sichtbar.                         |

Grundsätzlich ist es eine gute Idee, Eigenschaften und Methoden auf `private` zu setzen, wenn sie nicht benötigt werden. Erst wenn es nötig ist, dann wird die Sichtbarkeit auf `protected` oder `public` gesetzt.

## Vererbung

Vererbung ist ein **Mehrfachvererbung**. Sie ermöglicht es, Eigenschaften und Methoden von einer Klasse zu **erben**. Die Klasse, die erbt, wird **Kindklasse** genannt. Die Klasse, von der geerbt wird, wird **Elternklasse** genannt. Die Vererbung wird mit `extends` definiert. Das **Überschreiben** von Methoden wird mit dem wiederverwenden des Methodennamens gemacht.

```php
<?
class Elternklasse
{
    public $name = "Max";
}

class Kindklasse extends Elternklasse
{
    public function getName()
    {
        return $this->name;
    }
}
```
