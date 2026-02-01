<?php
class AuthController extends Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = $this->model('admin/User');
    }

    public function login() {
        // Check if already logged in
        if (isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/admin/dashboard');
            exit; // Important
        }

        $data = [
            'email' => '',
            'password' => '',
            'email_err' => '',
            'password_err' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            
            // Sanitize POST data
            // FILTER_SANITIZE_STRING is deprecated as of PHP 8.1
            // Use FILTER_SANITIZE_FULL_SPECIAL_CHARS or just trim if not specifically stripping tags
            // For email/pass, special chars might be valid in password, so be careful.
            // Let's just trim mainly, and htmlspecialchars on output.
            // But to satisfy the pattern:
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            // Check for user/email
            if ($this->userModel->findUserByEmail($data['email'])) {
                // User found
            } else {
                $data['email_err'] = 'No user found';
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    // Create Session
                    $this->createUserSession($loggedInUser);
                } else {
                    Flash::set('error', 'Invalid credentials. Please try again.');
                    $data['password_err'] = 'Password incorrect';
                    $this->view('admin/auth/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('admin/auth/login', $data);
            }

        } else {
            // Init data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];

            // Load view
            $this->view('admin/auth/login', $data);
        }
    }

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_role'] = $user->role;
        
        Flash::set('success', 'Successfully logged-in! Welcome back, ' . $user->name);
        header('Location: ' . BASE_URL . '/admin/dashboard');
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_role']);
        
        Flash::set('info', 'Successfully logged out!');
        header('Location: ' . BASE_URL . '/admin/auth/login');
    }
}
