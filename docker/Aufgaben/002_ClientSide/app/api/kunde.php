<?php

/**
 * Diese Klasse repräsentiert eine kunde Datenbank
 * @author      Manuel Schumacher
 * @version     5.3
 * @category    Logik
 */

class kunde
{
    public string $action = "getData";
    public int $id = 0;
    private string $DBName = "datenbank.sqlite3";

    /**
     * Konstruktor wird automatisch beim Instanziieren ausgeführt
     */
    function __construct()
    {
        // action oder id im GET vorhanden?
        if (isset($_GET['action'])) {
            $this->action = $_GET['action'];
        }
        if (isset($_GET['id'])) {
            $this->id = $_GET['id'];

            if (!ctype_digit(strval($this->id))) {
                $kunde = array();
                $kunde['data'] = array();
                $kunde['error'] = array();
                $kunde['error'][0]['meldung'] = "Fehler, die ID muss eine Zahl sein!";
                echo json_encode($kunde);
                return;
            }
        }
        // existiert die Datenbank?
        $this->chkDB();

        switch ($this->action) {
            case "getData":
                $this->getData();
                break;
                break;
            case "deleteID":
                $this->deleteID();
                break;
            case "insert":
                $this->insert();
                break;
            case "resetDB":
                $this->resetDB();
                break;
            default:
                $this->getData();
                break;
        }
    }

    /**
     * Kunde hinzufügen
     * @param int $this->id
     * @return str html temporär 
     */
    function insert()
    {
        // Daten vom JS auslesen die per POST gesendet wurden
        $kunde_firma = $_POST['kunde_firma'];
        $kunde_email = $_POST['kunde_email'];
        $kunde_kategorie = $_POST['kunde_kategorie'];
        $kunde_rechnung = $_POST['kunde_rechnung'];
        $kunde_kontaktperson = $_POST['kunde_kontaktperson'];

        // Validation der Daten
        $speichern = true;
        $kunde = array();
        $kunde['data'] = array();
        $kunde['error'] = array();
        $stelle = 0;

        if ($this->validStrLen($kunde_firma, 3, 255)) {
            $kunde['error'][$stelle]['meldung'] = "Firmanename länge nicht gültig";
            $stelle++;
            $speichern = false;
        } else if ($this->checkHTML($kunde_firma)) {
            $kunde['error'][$stelle]['meldung'] = "Firmenname enthält HTML";
            $stelle++;
            $speichern = false;
        }
        if ($this->validStrLen($kunde_email, 10, 255)) {
            $kunde['error'][$stelle]['meldung'] = "Email länge nicht gültig";
            $stelle++;
            $speichern = false;
        } else if ($this->checkHTML($kunde_email)) {
            $kunde['error'][$stelle]['meldung'] = "Email enthält HTML";
            $stelle++;
            $speichern = false;
        }
        if ($this->checkHTML($kunde_kategorie)) {
            $kunde['error'][$stelle]['meldung'] = "Kategorie enthält HTML";
            $stelle++;
            $speichern = false;
        }
        if ($this->validStrLen($kunde_kontaktperson, 3, 255)) {
            $kunde['error'][$stelle]['meldung'] = "Kontaktperson länge nicht gültig";
            $stelle++;
            $speichern = false;
        } else if ($this->checkHTML($kunde_kontaktperson)) {
            $kunde['error'][$stelle]['meldung'] = "Kontaktperson enthält HTML";
            $stelle++;
            $speichern = false;
        }
        if ($kunde_rechnung != "Nein" && $kunde_rechnung != "Ja") {
            $kunde['error'][$stelle]['meldung'] = "Rechnung kann nur Ja oder Nein sein";
            $stelle++;
            $speichern = false;
        }

        if (!$speichern) {
            // Fehler in der Validierung vorhanden
            echo json_encode($kunde);
        } else {
            $meldung = "";
            // id == 0, dann insert
            if ($this->id == 0) {
                //INSERT in Tabelle, Timestamp ist auf DEFAULT
                $sql = "INSERT INTO kunde (kunde_firma, kunde_email, kunde_kategorie, kunde_rechnung, kunde_kontaktperson) 
            VALUES ('" . $kunde_firma . "','" . $kunde_email . "','" . $kunde_kategorie . "','" . $kunde_rechnung . "','" . $kunde_kontaktperson . "')";

                $meldung = "Hinzufügen erfolgreich, Kunde erfasst";
            } else {
                //UPDATE
                $sql = "UPDATE kunde SET
            kunde_firma = '" . $kunde_firma . "',
            kunde_email = '" . $kunde_email . "',
            kunde_kategorie = '" . $kunde_kategorie . "',
            kunde_rechnung = '" . $kunde_rechnung . "',
            kunde_kontaktperson = '" . $kunde_kontaktperson . "',
            kunde_timestamp = CURRENT_TIMESTAMP 
            WHERE kunde_id=" . $this->id;

                $meldung = "Update erfolgreich, Kunde mit der ID " . $this->id . " wurde aktualisiert";
            }


            $con = new SQLite3($this->DBName);
            $kunde = array();
            $kunde['data'] = array();
            $kunde['error'] = array();
            if ($con->query($sql)) {
                $kunde['error'][0]['meldung'] = $meldung;
            }

            echo json_encode($kunde);
        }
    }

    /**
     * Nach HTML Validieren
     * @param string $text
     * @return bool enthält
     */
    function checkHTML($text)
    {
        if (preg_match("/<(.*)>/", $text)) {
            return true;
        }
        return false;
    }

    /**
     * String länge Validieren
     * @param str, min, max
     * @return bool
     */
    function validStrLen($str, $min, $max)
    {
        $len = strlen($str);
        if ($len < $min || $len > $max) {
            return true;
        }
        return false;
    }

    /**
     * Kunde löschen
     * @param int $this->id
     * @return json 
     */
    function deleteID()
    {
        $sql = "DELETE FROM kunde WHERE kunde_id=" . $this->id;
        $con = new SQLite3($this->DBName);

        $kunde = array();
        $kunde['data'] = array();
        $kunde['error'] = array();
        if ($con->query($sql) && $con->changes() > 0) {
            $kunde['error'][0]['meldung'] = "Kunde mit der ID " . $this->id . " wurde gelöscht";
        } else {
            $kunde['error'][0]['meldung'] = "Löschung fehlgeschlagen, Kunde konnte nicht gelöscht werden";
        }
        echo json_encode($kunde);
    }

    /**
     * Daten als JSON anzeigen
     * @param int $this->id - wenn > 0 dann nur einen Datensatz anzeigen
     * @return json 
     */
    function getData()
    {
        if ($this->id == 0) {
            // Alle Daten anzeigen
            $sql = "SELECT * FROM kunde ORDER BY kunde_timestamp DESC";
        } else {
            // Nur Daten mit ID anzeigen
            $sql = "SELECT * FROM kunde WHERE kunde_id=" . $this->id;
        }
        $con = new SQLite3($this->DBName);
        $results = $con->query($sql);
        $arr = array();
        $i = 0;
        while ($res = $results->fetchArray(SQLITE3_ASSOC)) {
            foreach ($res as $key => $value) {
                // $key = name der Spalte
                // $value = wert
                $arr[$i][$key] = $value;
            }
            $i++;
        }
        $kunde = array();
        $kunde['data'] = $arr;
        $kunde['error'] = array();

        echo json_encode($kunde);
    }

    /**
     * Datenbank Check und erstellen falls nicht vorhanden
     */
    function chkDB()
    {
        // existiert die Datenbank, bzw. das file? 
        if (!file_exists($this->DBName)) {
            // Nein, dann File erstellen
            $this->resetDB();
        } else {
            // Datenbank existiert bereits
        }
    }

    /**
     * Datenbank erstellen, natürlich für Echtfall nicht öffentlich machen
     */
    function resetDB()
    {
        usleep(500);

        // Verbindung mit Datenbank herstellen
        $con = new SQLite3($this->DBName);

        // Tabellen löschen, falls vorhanden
        $sql = "DROP TABLE IF EXISTS kunde;";
        $con->query($sql);

        // Tabellen erstellen
        $sql = "CREATE TABLE IF NOT EXISTS kunde (
                kunde_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
                kunde_firma VARCHAR(255) NOT NULL,
                kunde_email VARCHAR(255) NOT NULL,
                kunde_kategorie VARCHAR(255) NOT NULL DEFAULT Privat,
                kunde_rechnung VARCHAR(4) NOT NULL DEFAULT Nein,
                kunde_kontaktperson VARCHAR(255) NOT NULL DEFAULT 0,
                kunde_timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
            )";
        $con->query($sql);

        // Beispieldaten einfügen
        $sql = "INSERT INTO kunde (kunde_firma, kunde_email, kunde_rechnung, kunde_kontaktperson) 
                VALUES ('Max AG', 'email@adresse.com', 'Ja', 'Hans Muster')";
        $con->query($sql);

        $sql = "INSERT INTO kunde (kunde_firma, kunde_email, kunde_kategorie, kunde_rechnung, kunde_kontaktperson) 
                VALUES ('Linda GmbH', 'info@daxer.com', 'Medien', 'Ja', 'Max Volk')";
        $con->query($sql);

        $sql = "INSERT INTO kunde (kunde_firma, kunde_email, kunde_kategorie, kunde_kontaktperson) 
        VALUES ('Mario Ltd.', 'power@mario.com', 'Verkehr', 'Stanley Ash')";
        $con->query($sql);

        if ($this->action == "resetDB") {
            $kunde = array();
            $kunde['data'] = array();
            $kunde['error'] = array();
            $kunde['error'][0]['meldung'] = "Datenbank wurde erfolgreich resettet";
            echo json_encode($kunde);
        }
    }
}

$neuerKunde = new kunde();
