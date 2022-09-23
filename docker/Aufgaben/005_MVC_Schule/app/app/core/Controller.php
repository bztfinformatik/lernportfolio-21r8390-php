<?php

class Controller
{
    protected function model($model)
    {

        if (file_exists('../app/models/' . $model . '.php'))
        {
            require_once '../app/models/' . $model . '.php';
            return new $model();
        }
        else {
            echo 'Error : Model does not exists!';
        }
    }

    protected function view($view, $data = [])
    {

        if (file_exists('../app/views/' . $view . '.php'))
        {
            require_once '../app/views/' . $view . '.php';
        }
        else {
            echo 'Error : View does not exists!';
        }
    }


    

}