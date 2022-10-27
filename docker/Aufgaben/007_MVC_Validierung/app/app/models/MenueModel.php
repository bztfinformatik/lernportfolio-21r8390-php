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

    // Alle Attribute des Models
    private $id;
    private $title;
    private $preis;
    private $description;
    private $active;

    
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