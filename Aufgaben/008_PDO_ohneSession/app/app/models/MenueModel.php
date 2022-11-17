<?php

/**
 * Definition der MenueModel Attribute
 * 
 * id -> ID des Menü, wird referenziert werden von den Bestellungen
 * title -> Titel des Menüs
 * preis -> Preis, float
 * description -> Beschreibung
 * active -> steht das Menü aktuell zur Auswahl
 */
class MenueModel extends BaseModel
{

    /**
     * getMenues - Einfacher Select (im Hintergrund werden Prep-Statements verwendet)
     *
     * @return $results - Array aus Menues
     */
    public function getMenues()
    {
        $this->db->query("SELECT * FROM menue");
        $results = $this->db->resultSet();

        return $results;
    }

    /**
     * getMenues - Methode um nur bestimmte Menues zu laden, Anwendung von Prep-Statements mit Parametern
     *
     * @return $results - Array aus Menues
     */
    public function getMenueFilterTitle($name)
    {
        // 
        $this->db->query("SELECT * FROM menue WHERE title = :title");
        $this->db->bind(':title', $name);
        $results = $this->db->resultSet();

        return $results;
    }

    /**
     * getActiveMenues - Methode um nur um bestellbare Menues zu laden, Anwendung von Prep-Statements mit Parametern
     *
     * @return $results - Array aus Menues
     */
    public function getActiveMenues()
    {
        $this->db->query("SELECT * FROM menue WHERE menue.active != 0");
        $results = $this->db->resultSet();

        return $results;
    }


    
    /**
     * TestMethode die einfach nur Fake-Daten liefert, solange man noch keine DB hat
     *
     * @return $data : Array aus Fake-Menues
     */
    public function getFakeMenueDataArray()
    {
        $data = [
            ['id' => '1', 'title' => 'Spaghetti', 'preis' => '15', 'description' => 'Spaghetti Bolo', 'active' => true],
            ['id' => '2', 'title' => 'Spaghetti', 'preis' => '15', 'description' => 'Spaghetti Carbonara', 'active' => true],
            ['id' => '3', 'title' => 'Pizza', 'preis' => '15', 'description' => 'Napoli', 'active' => true]
        ];

        return $data;
    }

}