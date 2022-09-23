<?php

class Home extends Controller
{
    public function index($name = '')
    {
        $user = $this->model('User');
        $user->name = $name;

        $this->view('home/index', ['name' => $user->name]);
    }

    public function calc($zahl1 = 1, $zahl2 = 1)
    {
        $result = $zahl1 * $zahl2;

        $this->view('home/calc', ['result' => $result]);
    }
}