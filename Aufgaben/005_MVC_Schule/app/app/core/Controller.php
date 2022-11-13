<?php

/**
 * The core controller class which is extended by all other controllers.
 *
 * It loads the models and the views.
 */
class Controller
{
    /**
     * Loads the model
     *
     * @param string $model The name of the model
     * @return object The model object
     */
    protected function loadModel(string $model)
    {
        if (file_exists('../app/models/' . $model . '.php')) {
            require_once '../app/models/' . $model . '.php';
            return new $model();
        } else {
            echo 'Error : Model does not exists!';
        }
    }

    /**
     * Loads the view
     *
     * @param string $view The name of the view
     * @param array $data The data which is passed to the view
     * @return void
     */
    protected function loadView(string $view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            echo 'Error : View does not exists!';
        }
    }
}
