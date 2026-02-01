<?php

class DashboardController extends Controller {
    public function index() {
        // Enforce Login
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/admin/auth/login');
            exit;
        }

        $data = ['title' => 'Dashboard'];
        $this->view('admin/header', $data);
        $this->view('admin/dashboard', $data);
        $this->view('admin/footer', $data);
    }
}
