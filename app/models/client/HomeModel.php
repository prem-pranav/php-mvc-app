<?php

class HomeModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getWelcomeMessage() {
        return "Welcome to the PHP MVC App Client Section!";
    }
}
