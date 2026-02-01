/*
Create Database - PhpMvcApp
1. utf8mb4 → supports full Unicode, including emojis or special symbols.
2. utf8mb4_unicode_ci → case-insensitive collation.
*/
CREATE DATABASE IF NOT EXISTS phpmvcapp_db;

USE phpmvcapp_db;

-- Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'superadmin', 'user') DEFAULT 'user',
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert Default Admin User (Password: admin123)
INSERT INTO users (name, email, password, role, status) VALUES ('Admin', 'admin@phpmvcapp.com', '$2y$10$hWGlIItGthxNvUV/Exi7w.MAe1bpYaJwcqW.38w3OU8A.xbrWKAQG', 'superadmin', 'active');
