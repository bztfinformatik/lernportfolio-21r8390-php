<?php

class Auto extends Controller
{

    private $autoArray = array();

    public function index($name = '')
    {
        $this->addAuto("Duster", "Dacia");
        $this->addAuto("GTR", "Porsche");
        $this->addAuto("Irgendwas", "Ferrari");

        //var_dump($this->autoArray);
    
        echo $this->twig->render('auto/index.twig.html', ['title' => "Auto / Index", 'autos' => $this->autoArray] );                
    }

    public function add($marke = 'dummyMarke', $typ = 'dummyType')
    {
        // Hier müsste jetzt die Logik für die DB kommen...
        //$this->addAuto($typ, $marke);

        // Aus der Helper-Klasse unter helpers/url_helper.php
        redirect('auto/index');
    }


    private function addAuto($typ, $marke)
    {
        $auto = $this->model('AutoModel');
        $auto->type = $typ;
        $auto->marke = $marke;

        array_push($this->autoArray, $auto);
    }
}