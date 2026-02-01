<?php

class App {
    protected $controller = 'HomeController'; // Default client controller
    protected $method = 'index';
    protected $params = [];
    protected $area = 'client'; // 'client' or 'admin'

    public function __construct() {
        $url = $this->parseUrl();

        // 1. Determine Area (Admin vs Client)
        if (isset($url[0]) && strtolower($url[0]) === 'admin') {
            $this->area = 'admin';
            $this->controller = 'DashboardController'; // Default admin controller
            unset($url[0]); // Remove 'admin' from URL params
            $url = array_values($url); // Re-index array
        }

        $controllerPath = '../app/controllers/' . $this->area . '/';

        // 2. Determine Controller
        // Check for 'Name.php' or 'NameController.php'
        if (isset($url[0])) {
            $name = ucfirst($url[0]);
            if (file_exists($controllerPath . $name . '.php')) {
                 $this->controller = $name;
                 unset($url[0]);
            } elseif (file_exists($controllerPath . $name . 'Controller.php')) {
                 $this->controller = $name . 'Controller';
                 unset($url[0]);
            }
        }

        require_once $controllerPath . $this->controller . '.php';
        $this->controller = new $this->controller;

        // 3. Determine Method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // 4. Params
        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
}
