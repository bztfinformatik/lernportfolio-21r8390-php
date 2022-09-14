---
tags:
    - PHP
    - Cheatsheet
---

# PHP - Do's and Don'ts

Das hier ist eine **Zusammenfassung** von Do's and Don'ts rund um das Thema PHP. Die Liste ist aus dem Unterricht und wurde hier übernommen.

## Variablennamen

```php title="Welche Variablen sind ungültig?"
<?php
$preis
$1preis
$_preis
$else
$gesamtpreis12
$gesamt-preis
$MeNg
```

??? check "Lösung"

    Ungültig sind Variablennamen, die mit einer **Zahl beginnen**, ein **reserviertes Wort** sind oder ein **Sonderzeichen** enthalten.

    Ungültig sind somit die Variablen `$1preis`, `$else` und `$gesamt-preis`.

## Ausgaben

```php title="Was ist die Ausgabe?"
<?php
$j = "Hallo";
$k = "$j \"Onkel\" ";
echo $k;
```

??? check "Lösung"

    Die Ausgabe ist `Hallo "Onkel" `.

    Die Variable `$j` wird in der Variable `$k` ausgegeben, weil die doppelten Anführungszeichen verwendet wurden. Die **Anführungszeichen** werden mit ausgegeben, da sie escaped (`\`) wurden.

---

```php title="Was ist die Ausgabe?"
<?php
$a = "Hallo ";
$a .= "Welt";
echo $a;
```

??? check "Lösung"

    Die Ausgabe ist `Hallo Welt`.

    Die Variable `$a` wird mit dem Wert `Hallo ` initialisiert. Mit dem **Concatenation-Operators** (`.`) wird der Wert `Welt` an die Variable `$a` angehängt.

---

```php title="Was ist die Ausgabe?"
<?php
$a = "Hallo";
$b = "Welt";
echo $a." ".$b."<br />"
```

??? check "Lösung"

    Die Ausgabe ist:

    ```bash
    Hallo Welt
    # New Line
    ```

    Die Ausgabe würde auch in einer Konsole funktionieren, da die neue Linie durch `\n` ersetzt wird.

### Ausgaben - Preis

```php title="Was ist die Ausgabe?"
<?php
$preis = 49.90;
echo "Die Variable $preis enthält den Wert: $preis";
```

??? check "Lösung"

    Die Ausgabe ist:

    ```powershell
    Die Variable 49.9 enthält den Wert: 49.9
    ```

    Da der String **doppelten Anführungszeichen** enthält, wird der Wert `49.9` der Variable `$preis` in beiden Fällen ausgegeben.

---

```php title="Was ist die Ausgabe?"
<?php
$preis = 49.90;
echo 'Die Variable $preis enthält den Wert: $preis';
```

??? check "Lösung"

    Die Ausgabe ist:

    ```powershell
    Die Variable $preis enthält den Wert: $preis
    ```

    Da der String **einfachen Anführungszeichen** enthält, wird in beiden Fällen der **Variablenname** ausgegeben.

---

```php title="Was ist die Ausgabe?"
<?php
$preis = 49.90;
echo 'Die Variable $preis enthält den Wert: '.$preis;
```

??? check "Lösung"

    Die Ausgabe ist:

    ```powershell
    Die Variable $preis enthält den Wert: 49.9
    ```

    Da der String **einfachen Anführungszeichen** enthält, wird der **Variablenname** ausgegeben. Der Wert der Variable `$preis` wird mit dem **Concatenation-Operators** (`.`) an den String angehängt.

## Arrays

```php title="Was ist die Ausgabe?"
<?php
$familie = array("Vater", "Mutter", "Tochter", "Sohn");
echo "$familie[3]<br />";
echo "$familie[1]<br />";
echo "$familie[0]<br />";
echo "$familie[4]<br />";
echo "$familie[2]<br />";
```

??? check "Lösung"

    Die Ausgabe ist:

    ```powershell
    Sohn
    Mutter
    Vater
    # New Line
    Tochter
    ```

    Die **Array-Keys** beginnen bei `0`. Der **Array-Key** `4` existiert nicht, da nur 4 Elemente im Array sind. Aus diesem Grund wird eine neue Zeile ausgegeben. Um einen Fehler bei **Out-Of-Bound-Abfragen** zu erhalten, muss die Konfiguration vom PHP-Interpreten geändert werden.

## Mathe und Datentypen

```php title="Was ist die Ausgabe?"
<?php
$n = 5;
$o = 8;
echo $n + $o;
echo $n - $o;
echo $n * $o;
echo $n / $o;
echo $n % $o;
```

??? check "Lösung"

    Die Ausgabe ist:

    ```powershell
    13
    -3
    40
    0.625
    5
    ```

    Die **Mathe-Operatoren** funktionieren wie erwartet und wandeln den **Typ** bei Bedarf (_Division_) um.
