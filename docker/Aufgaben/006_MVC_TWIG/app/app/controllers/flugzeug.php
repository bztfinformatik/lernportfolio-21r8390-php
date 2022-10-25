<?php

require_once '../app/models/FlugiTypen.php';

class Flugzeug extends Controller
{
    public function index($name = '')
    {
        $flugzeug = $this->model('Flugi');
        $flugzeug->id = 1;
        $flugzeug->name = "Boing 747";
        $flugzeug->speed = 1000;
        $flugzeug->typ = FlugiTypen::Ballon;

        $typen = array_map(
            fn ($enumItem) => "{$enumItem->value}",
            FlugiTypen::cases()
        );

        echo $this->twig->render('flugzeug/index.twig.html', ['title' => "Flugzeug / Index", 'flugzeug' => $flugzeug, 'typen' => $typen]);
    }
}
