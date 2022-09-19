<?php

/**
 * Erklärung:
 * Das Model ist die Datenhaltung. Hier werden die Daten gespeichert und verarbeitet. 
 * Es ist unabhängig von der View und dem Controller. Bei richtigem Design ist es möglich, 
 * dass das Model auch von anderen Programmen verwendet werden kann, ohne die View oder den Controller zu verwenden.
 */

class DB
{
  // (A) ZUR DATENBANK VERBINDEN
  public $error = "";
  private $pdo = null;
  private $stmt = null;

  function __construct()
  {
    try {
      // (A1) ZUR DATENBANK VERBINDEN MIT PDO
      $this->pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
        DB_USER,
        DB_PASSWORD,
        [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
      );
    } catch (Exception $ex) {
      // (A2) FEHLER BEIM VERBINDEN
      exit($ex->getMessage());
    }
  }

  // (B) VERBINDUNG SCHLIESSEN
  function __destruct()
  {
    // (B1) STATEMENT LÖSCHEN
    if ($this->stmt !== null) {
      $this->stmt = null;
    }
    if ($this->pdo !== null) {
      $this->pdo = null;
    }
  }

  // (C) ABFRAGE AUSFÜHREN
  function select($sql, $cond = null)
  {
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
      return $this->stmt->fetchAll();
    } catch (Exception $ex) {
      $this->error = $ex->getMessage();
      return false;
    }
  }
}

// (D) DATENBANK EINSTELLUNGEN
define("DB_HOST", "mysql");
define("DB_NAME", "userdb");
define("DB_CHARSET", "utf8");
define("DB_USER", "user");
define("DB_PASSWORD", "userpass");
