<?php

/**
* Definition der Order-Attribute
* id -> ID der Bestellung
* userid -> Referenz auf den User (zukünftig)
* username -> Benutzername
* email -> Email des Benutzers
* comment -> Kommentar
* refmenue -> Referenz auf das bestellte Menü
* status -> ein int. 0 => "Bestellt", 1 => "Abholbereit", 2 => "Abgeholt"
* dateorder -> Datum und Zeitpunkt der Bestellung
*/


class OrderModel extends BaseModel
{

    /**
     * insertOrderDB - Übernimmt den data-Array und inserted es in die DB
     *
     * @param  mixed $data - Data Array aus der GUI
     *
     * @return boolean - Erfolgsfall oder nicht
     */
    public function insertOrderDB($data)
    {
        $this->db->query("INSERT INTO `orders` 
        (`userid`, `username`, `email`, `comment`, `refmenue`, `status`, `dateorder`)
        VALUES (:userid, :username, :email, :comment, :refmenue, :status, now())");

        $this->db->bind(':userid',$data['userid']);
        $this->db->bind(':username',$data['username']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':comment',$data['comment']);
        $this->db->bind(':refmenue',$data['refmenue']);
        $this->db->bind(':status',0); // Neue Bestellung, Status ist immer 0

        return $this->db->execute(); // Gibt True im Erfolgsfall, False im Fehlerfall
    }

    /**
     * changeStatusDB - Ändert den Status für eine Bestellung auf der DB. Wird benutzt vom Admin-Controller aus
     *
     * @param  mixed $orderID - Order ID
     * @param  mixed $status - Status der gesetzt werden soll (TinyInt)
     *
     * @return boolean - Erfolg oder nicht
     */
    public function changeStatusDB($orderID, $status)
    {
        $this->db->query("UPDATE orders SET status = :status WHERE id = :oderid");
        $this->db->bind(':oderid',$orderID);
        $this->db->bind(':status',$status);


        // Wenn man gucken will was da gebaut wurde, Debug-Methode aufrufen!

        return $this->db->execute(); // Gibt True im Erfolgsfall, False im Fehlerfall
    }

    /**
     * getOrderData - Holt die Liste aller Bestellungen aus der Datenbank
     *
     * @return $results - Array aus Bestellungen
     */
    public function getOrderData()
    {
        $this->db->query("SELECT * FROM `orders`");
        $results = $this->db->resultSet();

        return $results;
    }

    /**
     * getOrderDataForUserID - Holt die Liste aller Bestellungen für einen Benutzer aus der Datenbank
     *
     * @return $results - Array aus Bestellungen
     */
    public function getOrderDataForUserID($userid)
    {
        $this->db->query("SELECT * FROM orders WHERE userid = :userid");
        $this->db->bind(':userid', $userid);
        $results = $this->db->resultSet();

        return $results;
    }

    
    /**
     * TestMethode die einfach einen var_dump macht. Sie ist dazu da die GUI-Funktionaltiäten zu testen
     *
     * @param  mixed $data
     *
     * @return void
     */
    public function fakewriteData($data)
    {
        die(var_dump($data));
        
    }

    
    /**
     * TestMethode die einfach nur Fake-Daten liefert, solange man noch keine DB hat
     *
     * @return $data : Liste aus Orders
     */
    public function getFakeOrderData()
    {
        $data = [
            ['id' => '2', 'userid' => '', 'username' => 'TestBenutzer1','email' => 'test1@test.ch','comment' => 'TestKommentar1','refmenue' => '1','status' => '0','dateorder' => ''],
            ['id' => '3', 'userid' => '', 'username' => 'TestBenutzer2','email' => 'test2@test.ch','comment' => 'TestKommentar2','refmenue' => '2','status' => '1','dateorder' => ''],
            ['id' => '4', 'userid' => '', 'username' => 'TestBenutzer3','email' => 'test3@test.ch','comment' => 'TestKommentar3','refmenue' => '1','status' => '2','dateorder' => ''],
            ['id' => '5', 'userid' => '', 'username' => 'TestBenutzer4','email' => 'test4@test.ch','comment' => 'TestKommentar4','refmenue' => '3','status' => '0','dateorder' => '']
        ];

        return $data;
    }

    /**
     * TestMethode die einfach nur Fake-Daten liefert, solange man noch keine DB hat
     *
     * @param  mixed $userid
     *
     * @return $data : Liste aus Orders
     */
    public function getFakeOrderDataForUserID($userid)
    {
        $data = [
            ['id' => '2', 'userid' => '1','username' => 'TestBenutzer1','email' => 'test1@test.ch','comment' => 'TestKommentar1','refmenue' => '1','status' => '1','dateorder' => '']
        ];

        return $data;
    }


    /**
     * Hilfsmethode : die eine Liste für die GUI zusammenfipselt
     *
     * @param  mixed $orderArray, Liste aus Orders
     * @param  mixed $menueArray, Liste aus Menues
     *
     * @return $data : Array für GUI
     */
    public function renderOderList4GUI($orderArray, $menueArray)
    {
        // Anstatt Dinge in der GUI kompliziert zu machen, bauen wir hier die Dinge so zusammen wie 
        // wir sie brauchen
        // Diesen Array wollen wir zusammenbauen, dann der GUI übergeben
        // Etwas ungeschickt ist hier, dass die Arrays aus Orders und Menues übergeben werden. Dabei könnte sich eigentlich das Model selbst um die Listen kümmern
        
        $data = [];
        foreach($orderArray as $order)
        {
            $orderrow = [];
            foreach ($order as $key => $value) {

                // für jede Bestellung noch das Menü rausfipseln
                if ($key == 'refmenue')
                {
                    
                    foreach($menueArray as $menue){
                        
                        if ($menue['id'] == $value)
                        {
                            //echo var_dump();
                            $orderrow['menueinfo'] = $menue['title'] . "," . $menue['description'];
                        }
                    }
                }

                // alle anderen Dinge einfach rüberkopieren
                $orderrow[$key] = $value;
            }

            array_push($data, $orderrow);
        }

        return $data;
    }

}
