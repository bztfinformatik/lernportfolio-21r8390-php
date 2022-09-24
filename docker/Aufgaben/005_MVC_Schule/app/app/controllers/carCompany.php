<?php

class CarCompany extends Controller
{
    public function index()
    {
        echo 'contact/index';
    }

    public function test()
    {
        $car = $this->loadModel('Car');

        $car->brand = 'BMW';
        $car->model = 'M3';
        $car->color = 'schwarz';
        $car->description = 'This is a BMW M3';
        $car->year = '2018';
        $car->price = '100000';

        $this->loadView('home/car-company', ['car' => $car]);
    }
}
