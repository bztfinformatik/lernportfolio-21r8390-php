<?php

class CarCompany extends Controller
{
    public function index()
    {
        echo 'carCompany/index';
    }

    public function test()
    {
        // Model laden
        $car = $this->loadModel('Car');

        // Werte initialisieren
        $car->brand = 'BMW';
        $car->model = 'M3';
        $car->color = 'schwarz';
        $car->description = 'This is a BMW M3';
        $car->year = '2018';
        $car->price = '100000';

        // View erstellen
        $this->loadView('home/car-company', ['car' => $car]);
    }
}
