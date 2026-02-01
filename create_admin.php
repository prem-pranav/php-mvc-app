<?php
require_once 'app/config.php';
require_once 'app/core/Database.php';
require_once 'app/models/User.php';

// Instantiate User Model
$userModel = new User();

// Admin Data
$name = 'Admin';
$email = 'admin@phpmvcapp.com'; // Using a placeholder email for 'admin'
$password = 'password';

// Check if admin already exists (by email) - simplified check since we don't have getByEmail yet
// But register will fail or we can just try.
// Actually, let's just generate the hash and insert directly using Database to be sure.

$db = Database::getInstance();
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Generated Hash: " . $hash . "\n";

$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
try {
    $db->execute($sql, [$name, $email, $hash]);
    echo "Admin user created successfully.\n";
    echo "Email: $email\n";
    echo "Password: $password\n";
} catch (PDOException $e) {
    echo "Error creating admin: " . $e->getMessage() . "\n";
}
