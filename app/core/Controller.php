<?php

class Controller {
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        
        // Extract class name if a path is provided (e.g., 'admin/User' -> 'User')
        $parts = explode('/', $model);
        $className = end($parts);
        
        return new $className();
    }

    public function view($view, $data = []) {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die("View does not exist.");
        }
    }
}
