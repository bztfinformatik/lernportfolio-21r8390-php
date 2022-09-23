---
tags:
    - PHP
    - Aufgaben
---

# Objekt Orientierte Programmierung

In der Objekt Orientierte Programmierung ([OOP](https://www.php-einfach.de/experte/objektorientierte-programmierung-oop/)) werden Objekte verwendet, um Daten und Funktionen zu **gruppieren**. [Klassen](#klassen) sind die Grundlage für die Objektorientierung. Sie definieren die **Eigenschaften und Methoden**, die ein Objekt haben kann. Objekte sind Instanzen von Klassen. Sie können mehrere Objekte einer Klasse erstellen. Objekte können Daten in [Feldern](#attribute) speichern und [Methoden](#methoden) ausführen.

PHP war zu Beginn eine funktionale Sprache. Durch die **Einführung** von Klassen wurde PHP zu einer objektorientierten Sprache. Die OOP wurde in PHP 3 eingeführt. PHP 4 und 5 haben die OOP weiterentwickelt. Dieses Verhalten ist bemerkbar, da nicht alle üblichen OOP Konzepte vorhanden sind.

## Vorteile

Vorteil von OOP ist, dass der Code **wiederverwendbar** ist. So entsteht nur minimaler doppelter Code, was zur Übersicht und Wartbarkeit hilft. Durch die **Struktur** ist es einfacher zu verstehen, was der Code macht und wie Prozesse ablaufen. Unser Leben besteht aus Objekten, also wieso nicht auch unser Code?

## Klassen

Eine Klasse ist ein **Bauplan** für Objekte. Sie beschreibt die [Eigenschaften](#attribute) und [Methoden](#methoden), die ein Objekt haben soll. Das Objekt ist dann eine **Instanz** dieser Vorlage. Mithilfe von `new` kann eine Klasse **instanziiert** werden. Klassen können untereinander [vererben](#vererbung). So können Methoden und Eigenschaften von einer Klasse auf eine andere übertragen werden. Eine Klasse kann in PHP über folgenden Syntax definiert werden:

```php
<?
class Klassenname
{
    // Attribute
    // Methoden
}

$klasse = new Klassenname();
```

### Interfaces

Interfaces sind **Anforderungen** an eine [Klasse](#klassen). Darin kann beschrieben werden was für [Methoden](#methoden) und [Attribute](#attribute) eine Klasse haben muss. Eine Klasse kann mehrere Interfaces implementieren. Das Interface wird mit `implements` definiert. Eine Klasse kann mehrere Interfaces **implementieren**. Ein Interface kann nicht instanziiert werden. Es wird nur verwendet um zu definieren was eine Klasse können muss. Ein Interface kann mit folgendem Syntax definiert werden:

```php
<?
interface InterfaceName
{
    // Methoden
}

class Klassenname implements InterfaceName
{
    // Attribute
    // Methoden
}
```

### Attribute

Properties sind **Variablen**, die in einer [Klasse](#klassen) definiert werden. Sie können über die `->`-Notation aufgerufen werden, was vergleichbar mit dem Punkt (`.`) aus anderen Sprachen ist. Für lokale Variablen der Klasse wird `$this` verwendet. Für statische Variablen kann `self` verwendet werden.

```php
<?
class Klassenname
{
    public $name = "Max";
}
```

### Methoden

Methoden sind **Funktionen**, die in einer [Klasse](#klassen) definiert werden. Sie können gleich wie die Eigenschaften aufgerufen werden. Eine Methode wird nicht automatisch ausgeführt, sondern muss **explizit** aufgerufen werden. Statische Methoden werden mit `static` gekennzeichnet und können ohne Instanziierung aufgerufen werden. Methoden können wie in anderen Sprachen auch [Überschrieben](#uberschreiben) werden. [Überladen](#uberladen) ist jedoch in PHP nicht möglich.

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

Der Konstruktor ist eine [Methode](#methoden), die bei der **Erstellung** eines Objektes ausgeführt wird. Er wird mit `__construct()` definiert. Der Konstruktor kann auch Parameter enthalten, die beim Erstellen des Objektes übergeben werden können. Mithilfe eines Dekonstruktors können diese Werte am Ende der **Lebenszeit** wieder abgeräumt werden.

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

Zugriffsmodifizierer sind Schlüsselwörter, die die **Sichtbarkeit** von [Eigenschaften](#attribute) und [Methoden](#methoden) in einer Klasse steuern. Es gibt drei Modifizierer:

| :material-folder-edit: Modifizierer | Beschreibung                                                                          |
| ----------------------------------- | ------------------------------------------------------------------------------------- |
| `public`                            | Die Eigenschaft oder Methode ist für alle sichtbar.                                   |
| `protected`                         | Die Eigenschaft oder Methode ist nur für die Klasse und abgeleitete Klassen sichtbar. |
| `private`                           | Die Eigenschaft oder Methode ist nur für die Klasse sichtbar.                         |

Grundsätzlich ist es eine gute **Idee**, Eigenschaften und Methoden auf `private` zu setzen, wenn sie nicht benötigt werden. Erst wenn es nötig ist, dann wird die **Sichtbarkeit** auf `protected` oder `public` gesetzt.

## Vererbung

Vererbung ermöglicht es, Eigenschaften und [Methoden](#methoden) von einer Klasse zu **erben**. Die Klasse, die erbt, wird **Kindklasse** genannt. Die Klasse, von der geerbt wird, wird **Elternklasse** genannt. Die Vererbung wird mit `extends` definiert. Beim Erben werden alle [Attribute](#attribute) und Methoden der Elternklasse übernommen. Die Kindklasse kann diese Eigenschaften und Methoden **überschreiben**. Das heißt, dass die Kindklasse die Eigenschaften und Methoden der Elternklasse **überschreibt**. Die Kindklasse kann auch neue Eigenschaften und Methoden hinzufügen. Die Vererbung kann beliebig tief sein.

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

## Überladen

Beim Konzept vom Überladen wird eine [Methode](#methoden) mit dem **selben Namen** in einer Klasse definiert. Die Methode wird dann **automatisch** aufgerufen, wenn die Parameter mit denen der Methode übereinstimmen. Das Überladen ist in PHP **nicht möglich**. Es gibt jedoch eine Möglichkeit, das Überladen zu simulieren. Dazu wird eine Methode mit dem **selben Namen** definiert. Die Methode wird dann **manuell** aufgerufen, wenn die Parameter mit denen der Methode übereinstimmen.

```php
<?
class Klasse {
    public function __call($member, $arguments) {
        $numberOfArguments = count($arguments);

        if (method_exists($this, $function = $member.$numberOfArguments)) {
            call_user_func_array(array($this, $function), $arguments);
        }
    }

    private function multiply($argument1) {
        echo $argument1;
    }

    private function multiply2($argument1, $argument2) {
        echo $argument1 * $argument2;
    }
}

$class = new Klasse;
$class->multiply(2);
$class->multiply(5, 7);
```

## Überschreiben

Das **Überschreiben** von [Methoden](#methoden) wird mit dem wiederverwenden des Methodennamens gemacht. Die Methode wird dann in der Kindklasse überschrieben. Die Methode in der Elternklasse wird dann nicht mehr verwendet. Das Überschreiben kann auch mit dem Schlüsselwort `parent` gemacht werden. Das ruft die Methode in der Elternklasse auf.

```php
<?
class Elternklasse
{
    public function getName()
    {
        return "Max";
    }
}

class Kindklasse extends Elternklasse
{
    public function getName()
    {
        return parent::getName() . " Mustermann";
    }
}
```
