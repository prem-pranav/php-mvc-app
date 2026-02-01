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
The `/client` or home route serves the end-user interface. It is designed to be highly interactive and scalable for financial tools and real-time data.

### 4. Database Interaction
The system uses a Singleton-patterned `Database` wrapper around PDO, providing secure, prepared-statement-driven methods (`read`, `create`, `update`, `delete`) to prevent SQL injection.

## 🔄 Framework Transition Guide

To convert this baseline framework into a new project (like "Trade Pilot"), follow these essential steps:

1.  **Project Root Setup**:
    - Rename the root directory to your new project name (e.g., from `php-mvc-app` to `trade-pilot`).

2.  **Configuration Alignment**:
    - Open `app/config.php` and update the following:
        - `SITENAME`: Your new app name.
        - `BASE_URL`: The local path to your project's `/public` folder.
        - `DB_NAME`: The name of the database you will create for the new project.

3.  **Database Preparation**:
    - Open `database_schema.sql` and update the `CREATE DATABASE` and `USE` statements to match your new `DB_NAME`.
    - Update the default admin user's credentials or any placeholder data in the `INSERT` statements to reflect your project.

4.  **Rewrite Rules**:
    - Verify that `.htaccess` files in the root and `/public` are correctly routing traffic. No changes are usually required unless your local environment has unique pathing requirements.

5.  **Initialization**:
    - Run the `create_admin.php` script (via CLI or Browser) to seeds the initial user in your new database.
    - **Delete** `create_admin.php` immediately after use for security.
