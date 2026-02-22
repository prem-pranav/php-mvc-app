<?php

class Users extends Controller {
    private $userModel;

    public function __construct() {
        Auth::requirePermission('MANAGE_USERS');

        $this->userModel = $this->model('admin/User');
    }

    public function index() {
        $users = $this->userModel->getUsers();
        $data = [
            'users' => $users,
            'title' => 'User Management'
        ];

        $this->view('admin/header', $data);
        $this->view('admin/users/index', $data);
        $this->view('admin/footer', $data);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => password_hash(trim($_POST['password']), PASSWORD_DEFAULT),
                'role' => trim($_POST['role']),
                'status' => trim($_POST['status'])
            ];

            if ($this->userModel->register($data)) {
                Flash::set('success', 'User added successfully!');
                header('Location: ' . BASE_URL . '/admin/users');
            } else {
                Flash::set('error', 'Something went wrong while adding the user.');
                header('Location: ' . BASE_URL . '/admin/users');
            }
        } else {
            $data = ['title' => 'Add User'];
            $this->view('admin/header', $data);
            $this->view('admin/users/add', $data);
            $this->view('admin/footer', $data);
        }
    }

    public function edit($id) {
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'role' => trim($_POST['role']),
                'status' => trim($_POST['status'])
            ];

            if ($this->userModel->updateUser($data)) {
                Flash::set('success', 'User updated successfully!');
                header('Location: ' . BASE_URL . '/admin/users');
            } else {
                Flash::set('error', 'Something went wrong while updating the user.');
                header('Location: ' . BASE_URL . '/admin/users');
            }
        } else {
            $user = $this->userModel->getUserById($id);
            $data = [
                'user' => $user,
                'title' => 'Edit User'
            ];
            $this->view('admin/header', $data);
            $this->view('admin/users/edit', $data);
            $this->view('admin/footer', $data);
        }
    }

    public function delete($id) {
        if ($this->userModel->deleteUser($id)) {
            Flash::set('success', 'User deleted successfully!');
            header('Location: ' . BASE_URL . '/admin/users');
        } else {
            Flash::set('error', 'Something went wrong while deleting the user.');
            header('Location: ' . BASE_URL . '/admin/users');
        }
    }
}
