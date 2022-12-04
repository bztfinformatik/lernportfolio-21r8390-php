---
tags:
    - LB1
    - Datenbank
---

# Prepared-Statements

## Was sind Prepared-Statements?

[Prepared-Statements](https://www.php.net/manual/en/pdo.prepared-statements.php) sind eine Möglichkeit, um [SQL-Injections](../Appendix/Sicherheit.md#sql-injection) zu verhindern. Sie werden verwendet, um SQL-Statements vorzubereiten und dann auszuführen. Dabei werden die Parametern **validiert** und **escaped**, bevor sie an die Datenbank gesendet werden. Diese Aufgabe übernimmt meist **PDO**.

## Was ist PDO?

[PDO](https://www.php.net/manual/en/book.pdo.php) ist eine **Abstraktionsschicht** für Datenbanken. Es ist eine Schnittstelle, die es ermöglicht, mit **verschiedenen Datenbanken** zu kommunizieren. PDO ist eine Erweiterung für PHP, die es ermöglicht, mit einer Datenbank zu kommunizieren. Sie wird verwendet, um eine Verbindung aufzubauen und **SQL Befehle** auszuführen. Zudem übernimmt es die **Datensicherheit**, dass bösartiger Code keine SQL-Injections ausführen kann.

## Wie funktionieren Prepared-Statements?

Prepared-Statements werden in **3 Schritten** erstellt:

1.  Das Statement wird vorbereitet
2.  Die Parameter werden gebunden
3.  Das Statement wird ausgeführt
4.  Das Ergebnis ausgegeben

Dies könnte im **Code** so aussehen:

```php title="Prepared-Statement Beispiel"
<?php
// Verbindung mit PDO herstellen
$pdo = new PDO('mysql:host=localhost;dbname=test', 'username', 'password');

// 1. Statement vorbereiten
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");

// 2. Parameter binden
$stmt->bindParam(':id', $id);

// 3. Statement ausführen
$stmt->execute();

// 4. Ergebnis auslesen
$result = $stmt->fetchAll();
```

Die Parameter können auch **unbenannt** übergeben werden, was jedoch die Lesbarkeit des Codes beeinträchtigt:

```php title="Unbekannte Parameter Beispiel"
<?php
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
```

## Prepared vs Traditional Statement

Der Unterschied zwischen einem **Prepared-Statement** und einem **Traditional-Statement** ist, dass bei einem Prepared-Statement die Parameter **validiert** und **escaped** werden, bevor sie an die Datenbank gesendet werden. Dies verhindert SQL-Injections.

```php title="Prepared-Statement vs Traditional-Statement"
<?php
// Prepared-Statement
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

// Traditional-Statement
$stmt = $pdo->query("SELECT * FROM users WHERE id = $id");
```

### SQL-Injection Beispiel

Dies lässt sich am besten anhand dieses **Beispiels** verdeutlichen:

```sql title="SQL-Injection Beispiel"
id = "1; DROP TABLE users --";
```

Beim Prepared-Statement wird der Parameter **validiert** und **escaped** und somit die SQL-Injection verhindert:

```sql title="Ausgeführtes SQL"
SELECT * FROM users WHERE id = "1; DROP TABLE users --";
```

Beim Traditional-Statement wird der Parameter **nicht validiert** und **escaped** und somit die SQL-Injection ausgeführt:

```sql title="Ausgeführtes SQL"
SELECT * FROM users WHERE id = 1; DROP TABLE users --;
```

Anhand der farblichen **Unterschiede** lässt sich gut erkennen, dass der Parameter beim Prepared-Statement **escaped** wurde und beim Traditional-Statement nicht.
