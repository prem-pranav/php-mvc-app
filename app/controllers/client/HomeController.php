<?php

class HomeController extends Controller {
    public function index($name = '') {
        $homeModel = $this->model('client/HomeModel');
        $welcomeMessage = $homeModel->getWelcomeMessage();

        $data = [
            'title' => SITENAME,
            'description' => $welcomeMessage,
            'name' => $name
        ];
        
        $this->view('client/header', $data);
        $this->view('client/home', $data);
        $this->view('client/footer', $data);
    }
}
