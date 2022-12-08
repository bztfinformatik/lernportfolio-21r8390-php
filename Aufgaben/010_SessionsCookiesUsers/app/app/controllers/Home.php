<?php
/**
 * Startpage der Applikation
 * 
 * Aufrufbar für alle
 */
class Home extends Controller
{
    
    /**
     * index - Listet die Auslastung der Mensa auf
     * TODO: ...könnte man schöner machen. So mit Chart und so. Wäre interessant wenn man ein Zubereitungszeit auf den Menüs hätte, so könnte man die Wartezeit ungefähr einschätzen.
     *
     * @param  mixed $pagename - PageTitle
     *
     * @return void
     */
    public function index($pagename = 'Mensa - Startseite')
    {
        // Aktuelle Auslastung der Mensa anzeigen
        $orderModel = $this->model('OrderModel');
        $menueModel = $this->model('MenueModel');
        $menueArray = $menueModel->getActiveMenues();
        $orderArray = $orderModel->getOrderDataInPipeline();

        $data = $orderModel->renderOderList4GUI($orderArray, $menueArray);
        echo $this->twig->render('home/index.twig.html', ['title' => $pagename, 'urlroot' => URLROOT, 'data' => $data] );                
    }
}