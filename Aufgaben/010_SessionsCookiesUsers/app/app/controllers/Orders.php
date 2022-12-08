<?php

class Orders extends Controller
{

    private $menueArray = array();
    private $orderArray = array();
    
    /**
     * index - wird hier nicht gebraucht, redirect auf Home/index
     *
     *
     * @return void
     */
    public function index()
    {
        redirect('Home/index');
    }

    /**
     * add - Order Bestellung
     *
     * @param  mixed $pagename - Page Title
     * 
     * @return void
     */
    public function add($pagename = 'Order - Add')
    {

        // Dürfen wir überhaupt diese Funktion nutzen? 
        if (!isset($_SESSION['user_id']))
        {
            // Kein Login, Keine Bestellungen -> möglich wäre auch eine Weiterleitung auf Login
            redirect('Home/index');
        } else
        {
            if (!in_array("user", $_SESSION['user_roles']))
            {
                // Wir sind eingeloggt, aber nicht User...komischer Fall, aber trotzdem: Weg von hier
                redirect('Home/index');
            }
        }

        $orderModel = $this->model('OrderModel');
        $menueModel = $this->model('MenueModel');
        $menueArray = $menueModel->getActiveMenues();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process Form -> weil Post-Aufruf

            // Zuerst mal trimen und filtern auf gesunde Daten
            /* DEPRECATED
            $username = trim(
                filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)
            );
            $comment = trim(
                filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING)
            );
            */

            // Since 8.0
            $username = trim(htmlspecialchars($_POST['username']));
            $comment = trim(htmlspecialchars($_POST['comment']));
            
            $email = trim(
                filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)
            );
            $refmenue = trim(
                filter_input(INPUT_POST, 'refmenue', FILTER_SANITIZE_NUMBER_INT)
            );
            $userid = $_SESSION['user_id'];

            // Daten setzen
            $data = [
                'userid' => $userid,
                'username' => $username,       // Form-Feld-Daten
                'username_err' => '',   // Feldermeldung für Attribute
                'email' => $email,          // Form-Feld-Daten
                'email_err' => '',      // Feldermeldung für Attribute
                'refmenue' => $refmenue,       // Form-Feld-Daten
                'refmenue_err' => '',   // Feldermeldung für Attribute
                'comment' => $comment       // Form-Feld-Daten
            ];


            // Gucken ob die Daten plausibel sind
            // Da müsste man aber noch mehr machen

            if(empty($data['userid']) && !isset($_SESSION['user_id']))
            {
                // Schlimmer Ausnahmefehler...darf nie passieren.
                die("Schlimmer Fehler");
            } 

            if(empty($data['username']))
            {
                $data['username_err'] = 'Bitte Name angeben';
            }

            if(empty($data['email']))
            {
                $data['email_err'] = 'Bitte Email angeben';
            }

            if(empty($data['refmenue']))
            {
                $data['refmenue_err'] = 'Bitte Menü auswählen';
            }

            // Keine Errors vorhanden
            if (empty($data['username_err']) && empty($data['email_err']) && empty($data['refmenue_err']))
            {
                // Alles gut, keine Fehler vorhanden
                // Los auf die DB
                if ($orderModel->insertOrderDB($data))
                {
                    // Erfolgsfall
                    // Umleiten auf Liste meiner Bestellungen
                    redirect('Orders/listmyorders');
                } else 
                {
                    // Fehlerfall
                    die('Fehler');
                }
                
            }
            else {
                // Fehler vorhanden - Fehler anzeigen
                // View laden mit Fehlern

                echo $this->twig->render('order/add.twig.html', ['title' => $pagename, 'urlroot' => URLROOT, 'data' => $data, 'menues' => $menueArray]);
            }

        } else {
            // Init Form mit Default-Daten, weil Get-Aufruf

            // So - Wir holen mal ein paar relevante Daten aus der Session
            $data = [
                'userid' => $_SESSION['user_id'],         // Haben wir noch nicht. Faken wir
                'username' => $_SESSION['user_name'],       // Form-Feld-Daten
                'username_err' => '',   // Feldermeldung für Attribute
                'email' => $_SESSION['user_email'],          // Form-Feld-Daten
                'email_err' => '',      // Feldermeldung für Attribute
                'refmenue' => '',       // Form-Feld-Daten
                'refmenue_err' => '',    // Feldermeldung für Attribute
                'comment' => ''       // Form-Feld-Daten
            ];

            echo $this->twig->render('order/add.twig.html', ['title' => "Order - Add", 'urlroot' => URLROOT, 'data' => $data, 'menues' => $menueArray]);
        }
    }

    /**
     * listmyorders - Liste nur meine Orders auf
     *
     * @param  mixed $pagename - Page Title
     *
     * @return void
     */
    public function listmyorders($pagename = 'Order - List my Orders')
    { 

        // Dürfen wir überhaupt diese Funktion nutzen? 
        if (!isset($_SESSION['user_id']))
        {
            // Kein Login, Keine Bestellungen -> möglich wäre auch eine Weiterleitung auf Login
            redirect('Home/index');
        } else
        {
            if (!in_array("user", $_SESSION['user_roles']))
            {
                // Wir sind eingeloggt, aber nicht User...komischer Fall, aber trotzdem: Weg von hier
                redirect('Home/index');
            }
        }
        
        // Diese Var wird in Zukunft aus der Session kommen...so wie eingeloggt, so ist die Userid.
        $userid = $_SESSION['user_id'];

        $orderModel = $this->model('OrderModel');
        $menueModel = $this->model('MenueModel');
        $menueArray = $menueModel->getActiveMenues();
        $orderArray = $orderModel->getOrderDataForUserID($userid);

        // Fipseln uns einen Array zusammen, der dann gut auf der GUI funktioniert
        $data = $orderModel->renderOderList4GUI($orderArray, $menueArray);

        echo $this->twig->render('order/list.twig.html', ['title' => $pagename, 'urlroot' => URLROOT, 'data' => $data]);
    }
}
