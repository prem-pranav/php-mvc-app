<?php

class DashboardController extends Controller {
    public function index() {
        Auth::requirePermission('VIEW_DASHBOARD');

        $data = ['title' => 'Dashboard'];
        $this->view('admin/header', $data);
        $this->view('admin/dashboard', $data);
        $this->view('admin/footer', $data);
    }
}
