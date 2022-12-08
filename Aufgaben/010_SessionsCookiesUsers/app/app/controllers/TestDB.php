<?php

/**
 * Müsste für die Produktion wieder ausgebaut werden
 * Dummer Test um die DB-Verbindung anschaulich zu zeigen
 */
class TestDB extends Controller
{
    public function index($name = '')
    {
        echo "das ist nur Datenbank-Test-Controller";
    }

    public function showMenues()
    {
        //$orderModel = $this->model('OrderModel');
        $menueModel = $this->model('MenueModel');

        echo "-------- TEST : Hole alle Menues ----------<br><br><br><br>";


        $results = $menueModel->getMenues();

        if(count($results) != 0)
        {
            var_dump($results);
        }


        echo "-------- TEST : Hole nur Menues, gefiltet mit Namen ----------<br><br><br><br>";

        $results = $menueModel->getMenueFilterTitle('Classic Sashimi');

        if(count($results) != 0)
        {
            var_dump($results);
        }



        echo "-------- TEST : Hole nur aktive Menues ----------<br><br><br><br>";

        $results = $menueModel->getActiveMenues();

        if(count($results) != 0)
        {
            var_dump($results);
        }        
    }

    public function showOrders()
    {
        $orderModel = $this->model('OrderModel');

        echo "-------- TEST : Hole Orders ----------<br><br><br><br>";

        $results = $orderModel->getOrderData();

        if(count($results) != 0)
        {
            var_dump($results);
        }   
        
        echo "-------- TEST : Hole Orders für einen User ----------<br><br><br><br>";

        $userid = 77;
        $results = $orderModel->getOrderDataForUserID($userid);

        if(count($results) != 0)
        {
            var_dump($results);
        }     
    }

    public function showUsers()
    {
        $userModel = $this->model('UserModel');

        echo "-------- TEST : Hole User ----------<br><br><br><br>";

        $results = $userModel->getUsers();

        if(count($results) != 0)
        {
            var_dump($results);
        }   

        echo "-------- TEST : Hole User für Rolle----------<br><br><br><br>";

        $role = "admin";
        $results = $userModel->getUsersForRole($role);

        if(count($results) != 0)
        {
            var_dump($results);
        }   

        echo "-------- TEST : Hole User für Email ----------<br><br><br><br>";

        $email = "testadmin@test.ch";
        $results = $userModel->getUserForEmail($email);

        if(count($results) != 0)
        {
            var_dump($results);
        }  
           
    }

}