# 🚀 PHP MVC APP

**PHP MVC APP** is a lightweight, custom-built PHP MVC starter framework designed for modern web applications. It provides a clean separation of concerns, a zero-dependency architecture, built-in security protections, an integrated logging system, and an out-of-the-box administrative panel with Role-Based Access Control (RBAC).

---

## 💡 Core Motive

Most modern web projects are overwhelmed by heavy third-party vendor directories, complex build toolchains, and steep configuration learning curves. 

**PHP MVC APP** was built to solve this problem by providing a **lean, fast, and fully transparent PHP MVC foundation**. It offers sub-millisecond execution times, native PDO database security, centralized error logging, and modular admin/client separation—giving developers complete control over routing, business logic, and UI design without heavy vendor overhead.

---

## ✨ Key Features & Capabilities

- **⚡ Lightweight Custom MVC Engine**: Tailored routing dispatcher with dynamic URL parameters and clean URL rewriting.
- **📝 Integrated Logging System**: Built-in `Logger` class with log levels (`ERROR`, `WARNING`, `INFO`, `DEBUG`), custom PHP error handler interception, and automated log persistence.
- **🎛️ Dual Silo Architecture**: Complete separation between user-facing client views (`app/controllers/client`) and administrative tools (`app/controllers/admin`).
- **🛡️ Secure Authentication & RBAC**: Session-based auth with fine-grained permissions (`superadmin`, `admin`, `user`).
- **🔒 PDO Database Security**: Singleton database wrapper utilizing prepared statements to protect against SQL Injection.
- **💬 Flash Notification System**: Real-time, session-driven alert messaging for cross-request user feedback.
- **🎨 Redesigned Modern Client UI**: High-contrast, responsive multi-tone interface with glassmorphic navigation, interactive code tabs, performance metrics, and quickstart blocks.
- **📦 Zero Heavy Dependencies**: Runs on 100% native PHP and MySQL without requiring Composer or NPM build pipelines.

---

## 📝 Centralized Logging System

The framework includes an automated, file-based logging system (`app/core/Logger.php`) that catches application runtime errors, warnings, and custom debug messages.

### Key Capabilities:
- **Multiple Log Severity Levels**: Supports `LEVEL_ERROR`, `LEVEL_WARNING`, `LEVEL_INFO`, and `LEVEL_DEBUG`.
- **Global Error Handler**: Automatically registers PHP's `set_error_handler()` to log runtime errors directly to `app/logs/error.log`.
- **HTTP Request Performance Timing**: Automatically captures `REQUEST_TIME_FLOAT` via PHP's `register_shutdown_function()` and logs total request processing duration in milliseconds (`ms`).
- **Automated Directory & File Creation**: Creates log directories safely with timestamped entries.

### Usage Example:
```php
// Creating a Logger instance (or using global $logger)
$logger = new Logger(__DIR__ . "/../logs/error.log");

// Log custom severity entries
$logger->info("User login attempt successful.");
$logger->warning("Unusual password attempt threshold reached.");
$logger->error("Database connection failure: " . $e->getMessage());
$logger->debug("Session payload state verified.");
```

### Log File Output Format (`app/logs/error.log`):
```text
[2026-10-03 12:25:00] [INFO] User login attempt successful.
[2026-10-03 12:25:01] [WARNING] Unusual password attempt threshold reached.
[2026-10-03 12:25:02] [ERROR] Database connection failure: Access denied for user 'root'@'localhost'
[2026-10-03 12:25:03] [DEBUG] Session payload state verified.
[2026-10-03 12:25:04] [INFO] HTTP Request Completed: [GET] /php-mvc-app/public/admin/dashboard - Duration: 1.42 ms
```

---

## 🏗️ Architecture & Life Cycle

Every incoming HTTP request follows a simple, deterministic execution lifecycle:

```text
               +-----------------------+
               |  HTTP Request (Browser)|
               +-----------+-----------+
                           |
                           v
               +-----------------------+
               |  Apache .htaccess     |  (Rewrites clean URIs)
               +-----------+-----------+
                           |
                           v
               +-----------------------+
               |  public/index.php     |  (Single Entry Bootstrap)
               +-----------+-----------+
                           |
                           v
               +-----------------------+
               |  Core App Router      |  (Parses /controller/method/params)
               +-----------+-----------+
                           |
            +--------------+--------------+
            |                             |
            v                             v
  +-------------------+         +-------------------+
  | Client Controller |         | Admin Controller  |
  +---------+---------+         +---------+---------+
            |                             |
            +--------------+--------------+
                           |
                           v
               +-----------------------+
               |  PDO Database Model   |  (Executes prepared queries)
               +-----------+-----------+
                           |
                           v
               +-----------------------+
               |  Logger & Exception   |  (Catches & records runtime errors)
               +-----------+-----------+
                           |
                           v
               +-----------------------+
               |  View Composition     |  (Renders Header + View + Footer)
               +-----------------------+
```

---

## 📁 Project Directory Structure

```text
php-mvc-app/
├── app/                         # Application Logic Core
│   ├── config.php               # Global Database & Base URL Configuration
│   ├── init.php                 # Core Bootstrapper & Class Includer
│   ├── controllers/             # Request Handling Controllers
│   │   ├── admin/               # Administrative Controllers (Auth, Dashboard, Users)
│   │   └── client/              # End-user Controllers (HomeController)
│   ├── core/                    # Framework Engine Base Classes
│   │   ├── App.php              # Core URL Router & Dispatcher
│   │   ├── Controller.php       # Base Controller (Loads Models & Views)
│   │   ├── Database.php         # PDO Singleton Database Wrapper
│   │   ├── Flash.php            # Session Flash Alert Manager
│   │   ├── Logger.php           # Core Logger class & error handler registration
│   │   └── Session.php          # Session Guard Utilities
│   ├── logs/                    # Application Log Output Silo
│   │   └── error.log            # Runtime error & system log output file
│   ├── models/                  # Data Logic & Database Layer
│   │   ├── admin/               # Admin Models (UserModel, AuthModel)
│   │   └── client/              # Client Models (HomeModel)
│   └── views/                   # User Interface Views
│       ├── admin/               # Admin Portal Templates
│       └── client/              # Client Interface Templates (header, home, footer)
├── public/                      # Public Web Root (Exposed to Web Server)
│   ├── .htaccess                # Rewrites request URIs to index.php
│   ├── index.php                # Web Application Entry Point
│   ├── css/                     # Application Stylesheets (client.css, admin.css)
│   ├── img/                     # Graphic Assets & Icons (logo.png, hero_preview.jpg)
│   └── js/                      # Frontend JavaScript Logic
├── database_schema.sql          # MySQL Schema & Initial Data Seeder
├── create_admin.php             # CLI/Web One-Time Superadmin Seeder (Delete after use)
├── .htaccess                    # Root URL Rewrite Configuration
└── README.md                    # Project Documentation
```

---

## 🛠️ Step-by-Step Local Setup Guide

Follow these simple steps to set up and launch the application on your local machine in under **60 seconds**.

### Step 1: Clone or Download the Repository
Place the project folder inside your web server directory (e.g., `C:\xampp\htdocs\php-mvc-app` for XAMPP users).

### Step 2: Database Configuration
1. Open **phpMyAdmin** or your preferred MySQL client (e.g., MySQL Workbench, DBeaver, or CLI).
2. Create a new database named `phpmvcapp_db` and import `database_schema.sql`:
   ```bash
   mysql -u root -p phpmvcapp_db < database_schema.sql
   ```
3. Open `app/config.php` and verify your local database credentials and base URL:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', '');               // Your MySQL password (default is empty in XAMPP)
   define('DB_NAME', 'phpmvcapp_db');

   define('BASE_URL', 'http://localhost/php-mvc-app/public');
   define('SITENAME', 'PHP MVC APP');
   ```

### Step 3: Seed Initial Administrator Account
Run the admin creation script once to generate the default `superadmin` account:

- **Method A (Terminal CLI)**:
  ```bash
  php create_admin.php
  ```
- **Method B (Web Browser)**:
  Open `http://localhost/php-mvc-app/create_admin.php` in your browser.

> [!IMPORTANT]
> **Delete `create_admin.php`** immediately after the administrator account is created for production security.

---

## 🚀 Running the Application

### Method 1: Using XAMPP / Apache
1. Ensure Apache and MySQL modules are running in your XAMPP Control Panel.
2. Visit the following URLs in your browser:
   - **Client Home Portal**: [`http://localhost/php-mvc-app/public`](http://localhost/php-mvc-app/public)
   - **Admin Management Console**: [`http://localhost/php-mvc-app/public/admin`](http://localhost/php-mvc-app/public/admin)

### Method 2: Using PHP Built-in Web Server (CLI)
If you don't use XAMPP, start PHP's built-in web server directly from the project root:
```bash
php -S localhost:8000 -t public
```
Then access:
- **Client Interface**: `http://localhost:8000`
- **Admin Interface**: `http://localhost:8000/admin`

---

## 🔐 Default Credentials

| Portal | URL Route | Default Email | Default Password | Role |
| :--- | :--- | :--- | :--- | :--- |
| **Admin Console** | `/admin` | `admin@phpmvcapp.com` | `admin123` | Superadmin |

---

## 🔄 Framework Transition & Customization Guide

To adapt this baseline framework into a custom web project (e.g., an e-commerce store, SaaS platform, or analytics dashboard):

1. **Rename Project Root**: Rename `php-mvc-app` to your project name (e.g., `my-custom-app`).
2. **Update Configuration**: Open `app/config.php` and set `SITENAME`, `BASE_URL`, and `DB_NAME`.
3. **Database Schema**: Update `database_schema.sql` to include your domain tables (e.g., `products`, `orders`, `invoices`).
4. **Build Controllers & Views**: Create new controllers in `app/controllers/client/` or `app/controllers/admin/` to add new routes and UI features.

---

## 📄 License & Credits

Built with precision for modern, high-performance PHP web applications. Released under the MIT License.
