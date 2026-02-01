<?php
class User {
    private $db;
    private $table = 'users';

    public function __construct() {
        $this->db = Database::getInstance();
    }

    // Get all users
    public function getUsers() {
        return $this->db->read($this->table, [], "*", [], null, 0, "created_at DESC");
    }

    // Get user by ID
    public function getUserById($id) {
        return $this->db->selectOne("SELECT * FROM {$this->table} WHERE id = ?", [$id]);
    }

    // Find user by email
    public function findUserByEmail($email) {
        return $this->db->selectOne("SELECT * FROM {$this->table} WHERE email = ?", [$email]);
    }

    // Login User
    public function login($email, $password) {
        $row = $this->findUserByEmail($email);

        if ($row == false) return false;

        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    // Add User
    public function register($data) {
        $userData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => isset($data['role']) ? $data['role'] : 'admin',
            'status' => isset($data['status']) ? $data['status'] : 'active'
        ];
        
        $id = $this->db->create($this->table, $userData);
        return $id ? true : false;
    }

    // Update User
    public function updateUser($data) {
        $userData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => isset($data['role']) ? $data['role'] : 'admin',
            'status' => isset($data['status']) ? $data['status'] : 'active'
        ];
        $conditions = ['id' => $data['id']];
        
        return $this->db->update($this->table, $userData, $conditions);
    }

    // Delete User
    public function deleteUser($id) {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}
