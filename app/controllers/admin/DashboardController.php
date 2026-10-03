<?php

class DashboardController extends Controller {
    public function index() {
        Auth::requirePermission('VIEW_DASHBOARD');

        $userModel = $this->model('admin/User');
        $users = $userModel->getUsers() ?: [];
        $totalUsers = count($users);
        $activeUsers = 0;
        $adminUsers = 0;

        foreach ($users as $user) {
            $status = is_object($user) ? ($user->status ?? 'active') : ($user['status'] ?? 'active');
            $role = is_object($user) ? ($user->role ?? 'user') : ($user['role'] ?? 'user');

            if ($status === 'active') $activeUsers++;
            if (in_array($role, ['admin', 'superadmin'])) $adminUsers++;
        }

        $data = [
            'title' => 'Dashboard',
            'totalUsers' => $totalUsers,
            'activeUsers' => $activeUsers,
            'adminUsers' => $adminUsers,
            'recentUsers' => array_slice($users, 0, 5)
        ];

        $this->view('admin/header', $data);
        $this->view('admin/dashboard', $data);
        $this->view('admin/footer', $data);
    }
}
