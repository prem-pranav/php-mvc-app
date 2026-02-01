# PHP MVC App

**PHP MVC App** is a lightweight, custom-built PHP MVC framework designed for a web-based application. It features a clean separation of concerns, a scalable architecture, and built-in administrative tools.

## 🚀 Core Features

- **Custom-built MVC Engine**: A tailored framework optimized for speed and maintainability.
- **Admin & Client Separation**: Distinct silos for administrative tasks and user-facing functionality.
- **Authentication System**: Secure login and session management for administrators and users.
- **Role-Based Access Control (RBAC)**: Fine-grained permissions (e.g., `superadmin`, `admin`, `user`).
- **User Management**: Full CRUD interface for managing system users.
- **Responsive Design**: Modern, glassmorphic UI using Vanilla CSS.

## 📁 Project Structure

```text
php-mvc-app/              # (Project root folder)
├── app/                  # Application Core
│   ├── controllers/      # Route controllers (Admin/Client)
│   ├── core/             # Core classes (App, Controller, Database)
│   ├── models/           # Data models
│   ├── views/            # User interface files
│   ├── logs/             # Application logs
│   ├── config.php        # Global Configuration
│   └── init.php          # Main bootstrap file
├── public/               # Entry point and static assets
│   ├── css/              # Stylesheets
│   ├── js/               # Javascript logic
│   └── index.php         # Main application loader
├── logs/                 # Application error and info logs
├── .htaccess             # URL Rewriting for clean URLs
└── README.md             # This file
```

## 🛠️ Setup & Installation

1.  **Database Configuration**:
    - Create a database in MySQL.
    - Import the `database_schema.sql` file.
    - Configure settings in `app/config.php`.
2.  **Web Server**:
    - Ensure your web server (e.g., Apache/XAMPP) has `mod_rewrite` enabled.
    - Set the `BASE_URL` in `app/config.php` to match your local setup (e.g., `http://localhost/php-mvc-app`).
3.  **Administrator Setup**:
    - Run the `create_admin.php` script once to create the initial `superadmin` user.
    - **Method 1 (CLI)**: Open terminal in root and run `php create_admin.php`.
    - **Method 2 (Browser)**: Visit `http://localhost/php-mvc-app/create_admin.php`.
    - > [!IMPORTANT]
      > Delete `create_admin.php` after the admin user is created for security.

## 🔍 Functionality Walkthrough

### 1. The Core Framework
The application uses a custom `App` class to handle routing based on URLs (e.g., `controller/method/params`). The base `Controller` class manages model loading and view rendering from their respective subdirectories.

### 2. Admin Section
Accessible via `/admin`, this section allows management of the entire platform:
-   **Dashboard**: High-level overview of system status.
-   **User Management**: Superadmins can create, edit, or delete users and assign roles.
-   **Auth**: Secure login portal with automatic session timeouts.

### 3. Client Section
The `/client` or home route serves the end-user trading interface. It is designed to be highly interactive and scalable for financial tools and real-time data.

### 4. Database Interaction
The system uses a Singleton-patterned `Database` wrapper around PDO, providing secure, prepared-statement-driven methods (`read`, `create`, `update`, `delete`) to prevent SQL injection.

## 📝 Recent Restructuring
The project has recently been optimized to move `header.php` and `footer.php` files directly into their respective section directories (`app/views/admin/` and `app/views/client/`), removing redundant layout folders for a flatter, more intuitive structure.
