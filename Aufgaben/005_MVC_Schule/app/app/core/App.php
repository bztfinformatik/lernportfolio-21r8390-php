<?php

/**
 * This is the main class of the application.
 * It is responsible for the routing and the loading of the controllers.
 */
class App
{
    protected $controller = 'home';
    protected $method = 'index';

    protected $params = [];

    public function __construct()
    {
        // Parse the URL
        $url = $this->parseUrl();

        // Loads the controller
        $this->loadController($url);

        // Loads the method
        $this->loadMethod($url);

        // Gets all parameters which are not null to be passed to the method
        $this->params = isset($url) ? array_values($url) : [];

        // Call the method with the parameters of the controller
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Loads the controller from the URL
     *
     * @param array $url The URL as an array
     * @return void
     */
    private function loadController(array $url)
    {
        // Gets the controller name from the URL
        $controllerName = isset($url[0]) ? $url[0] : '404';

        // Checks if the controller exists and sets the controller
        if (file_exists('../app/controllers/' . $controllerName . '.php')) {
            $this->controller = $controllerName;
            unset($url[0]);
        }

        // Controller laden
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
    }

    /**
     * Load the method from the URL
     *
     * @param array $url The URL as an array
     * @return void
     */
    private function loadMethod(array $url)
    {
        // Check if url has a method and if the method exists
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }
    }

    /**
     * Parse the URL into an array
     *
     * @return string[] Array with the URL parts
     */
    private function parseUrl()
    {
        if (isset($_GET['url'])) {
            // Split URL into parts
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        // No URL given
        return [];
    }
}
