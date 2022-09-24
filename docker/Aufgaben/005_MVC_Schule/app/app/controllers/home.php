<?php

class Home extends Controller
{
    public function index($name = '')
    {
        $user = $this->loadModel('User');
        $user->name = $name;

        $this->loadView('home/index', ['name' => $user->name]);
    }

    public function calc($zahl1 = 1, $zahl2 = 1)
    {
        $result = $zahl1 * $zahl2;

        $this->loadView('home/calc', ['result' => $result]);
    }
}
