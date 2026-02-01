<?php

class HomeModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getWelcomeMessage() {
        return "Welcome to the Trading App Client Section!";
    }
}
