<?php

class Ordersadmin extends Controller
{
    private $menueArray = array();
    private $orderArray = array();


    /**
     * changeStatus - Methode, ändert Status für eine Order
     *
     * @return void
     */
    public function changeStatus()
    {

        // Dürfen wir überhaupt diese Funktion nutzen? 
        if (!isset($_SESSION['user_id'])) {
            // Kein Login, Keine Bestellungen -> möglich wäre auch eine Weiterleitung auf Login
            redirect('Home/index');
        } else {
        
            if (!in_array("admin", $_SESSION['user_roles'])) {
                // Wir sind eingeloggt, aber nicht Admin: Weg von hier
                redirect('Orders/listmyorders');
            }
        }

        $orderModel = $this->model('OrderModel');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Im Moment nur ein Test ob es funktioniert
            //die(var_dump($_POST));

            $orderid = trim(
                filter_input(INPUT_POST, 'orderID', FILTER_SANITIZE_NUMBER_INT)
            );

            $status = trim(
                filter_input(INPUT_POST, 'status', FILTER_SANITIZE_NUMBER_INT)
            );

            if ($orderModel->changeStatusDB($orderid, $status)) {
                // Erfolg - wir leiten wieder um auf die Liste
                redirect('Ordersadmin/index');
            } else {
                // Fehler
                // Exception
            }
        }
    }

    /**
     * index - Liste aller Bestellung mit Buttons
     *
     * @param  mixed $pagename - Page Title
     *
     * @return void
     */
    public function index($pagename = 'Order - Listing')
    {

        // Dürfen wir überhaupt diese Funktion nutzen? 
        if (!isset($_SESSION['user_id'])) {
            // Kein Login, Keine Bestellungen -> möglich wäre auch eine Weiterleitung auf Login
            redirect('Home/index');
        } else {

            if (!in_array("admin", $_SESSION['user_roles'])) {
                // Wir sind eingeloggt, aber nicht Admin: Weg von hier
                redirect('Orders/listmyorders');
            }
        }

        $orderModel = $this->model('OrderModel');
        $menueModel = $this->model('MenueModel');
        $menueArray = $menueModel->getActiveMenues();
        $orderArray = $orderModel->getOrderData();

        // Fipseln uns einen Array zusammen, der dann gut auf der GUI funktioniert
        $data = $orderModel->renderOderList4GUI($orderArray, $menueArray);

        echo $this->twig->render('orderadmin/index.twig.html', ['title' => $pagename, 'urlroot' => URLROOT, 'data' => $data]);
    }
}
