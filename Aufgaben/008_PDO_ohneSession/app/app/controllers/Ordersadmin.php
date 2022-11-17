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
        $orderModel = $this->model('OrderModel');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            // Im Moment nur ein Test ob es funktioniert
            //die(var_dump($_POST));

            $orderid = trim(
                filter_input(INPUT_POST, 'orderID', FILTER_SANITIZE_NUMBER_INT)
            );

            $status = trim(
                filter_input(INPUT_POST, 'status', FILTER_SANITIZE_NUMBER_INT)
            );

            if ($orderModel->changeStatusDB($orderid, $status))
            {
                // Erfolg - wir leiten wieder um auf die Liste
                redirect('Ordersadmin/index');
            } else {
                // Schlimmer Fehler - Wir konnten den Status nicht auf die DB schreiben, Sollte eigentliche
                /**
                 * 1 - Exception auslösen
                 * 2 - Schönes Log schreiben
                 * 3 - Saubere Weiterleitung und Info an Benutzer
                 */
                die('Schlimmer Fehler - Wir konnten den Status nicht auf die DB schreiben');
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
        $orderModel = $this->model('OrderModel');
        $menueModel = $this->model('MenueModel');
        $menueArray = $menueModel->getActiveMenues();
        $orderArray = $orderModel->getOrderData();


        //var_dump($orderArray);

        // Fipseln uns einen Array zusammen, der dann gut auf der GUI funktioniert
        $data = $orderModel->renderOderList4GUI($orderArray, $menueArray);

        echo $this->twig->render('orderadmin/index.twig.html', ['title' => $pagename, 'urlroot' => URLROOT, 'data' => $data] );                
    }
}