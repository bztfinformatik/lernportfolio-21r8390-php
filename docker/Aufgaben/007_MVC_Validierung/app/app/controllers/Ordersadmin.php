<?php

class Ordersadmin extends Controller
{
    private $menueArray = array();
    private $orderArray = array();

    
    /**
     * changeStatus - Methode, wird später auf der DB den Status einer Bestellung ändern
     *
     * @return void
     */
    public function changeStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            // Im Moment nur ein Test ob es funktioniert
            die(var_dump($_POST));
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
        $menueArray = $menueModel->getFakeMenueDataArray();
        $orderArray = $orderModel->getFakeOrderData();

        // Fipseln uns einen Array zusammen, der dann gut auf der GUI funktioniert
        $data = $orderModel->renderOderList4GUI($orderArray, $menueArray);

        echo $this->twig->render('orderadmin/index.twig.html', ['title' => $pagename, 'urlroot' => URLROOT, 'data' => $data] );                
    }
}