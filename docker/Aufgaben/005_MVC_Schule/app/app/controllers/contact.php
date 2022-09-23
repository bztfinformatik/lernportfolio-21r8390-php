<?php

class Contact extends Controller
{
    public function index()
    {
        echo 'contact/index';
    }

    public function test($param1 = '', $param2 = '')
    {
        echo $param1 . ' '. $param2;
    }
}