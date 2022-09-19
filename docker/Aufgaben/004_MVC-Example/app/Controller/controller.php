<?php

/**
 * Erklärung:
 * Der Controller ist die Verbindung zwischen Model und View. Er verarbeitet die Benutzereingaben und gibt diese an das Model weiter. 
 * Er holt sich die Daten aus dem Model und gibt sie an die View weiter.
 */

require "../Model/model.php";

$searchQuery = $_POST["search"] ?? $_GET["search"] ?? null;

if (isset($searchQuery)) {
  echo searchUser($searchQuery);
}

/**
 * Sucht einen Benutzer in der Datenbank
 *
 * @param string $searchString
 * @return string JSON encoded array of users
 */
function searchUser(string $searchString): string
{
  // (A) ZUR DATENBANK VERBINDEN
  $DB = new DB();

  // (B) BENUTZER SUCHEN
  $results = $DB->select(
    "SELECT * FROM `users` WHERE `name` LIKE ? ORDER BY `id`",
    ["%{$searchString}%"]
  );

  // (C) RESULTAT ZURÜCKGEBEN
  return json_encode(count($results) == 0 ? null : $results);
}
