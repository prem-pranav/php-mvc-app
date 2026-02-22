<?php

class Auth {
    /**
     * Define permission mappings to roles
     */
    private static $permissions = [
        'MANAGE_USERS'      => ['superadmin'],
        'VIEW_DASHBOARD'    => ['superadmin', 'admin', 'user'],
    ];

    /**
     * Check if user is logged in
     */
    public static function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    /**
     * Get current user data from session
     */
    public static function user() {
        if (self::isLoggedIn()) {
            return (object) [
                'id' => $_SESSION['user_id'],
                'email' => $_SESSION['user_email'],
                'name' => $_SESSION['user_name'],
                'role' => $_SESSION['user_role']
            ];
        }
        return null;
    }

    /**
     * Get current user role
     */
    public static function role() {
        return $_SESSION['user_role'] ?? null;
    }

    /**
     * Check if user has a specific role
     */
    public static function hasRole($roles) {
        if (!self::isLoggedIn()) return false;
        
        $userRole = self::role();
        if (is_array($roles)) {
            return in_array($userRole, $roles);
        }
        return $userRole === $roles;
    }

    /**
     * Check if current user role has specific permission
     */
    public static function can($permission) {
        if (!isset(self::$permissions[$permission])) {
            return false;
        }

        return self::hasRole(self::$permissions[$permission]);
    }

    /**
     * Require authentication
     */
    public static function requireLogin() {
        if (!self::isLoggedIn()) {
            Flash::set('info', 'Please log in to access this page.');
            header('Location: ' . BASE_URL . '/admin/auth/login');
            exit;
        }
    }

    /**
     * Require a specific permission
     */
    public static function requirePermission($permission) {
        self::requireLogin();

        if (!self::can($permission)) {
            Flash::set('error', 'Access Denied. You do not have permission to access this resource.');
            header('Location: ' . BASE_URL . '/admin/dashboard');
            exit;
        }
    }

    /**
     * Set user session after login
     */
    public static function login($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_role'] = $user->role;
    }

    /**
     * Clear user session on logout
     */
    public static function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_role']);
        session_destroy();
    }
}
