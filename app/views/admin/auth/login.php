<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | <?= SITENAME ?></title>
    <link rel="shortcut icon" href="<?= BASE_URL ?>/img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1; /* Indigo 500 */
            --primary-dark: #4f46e5; /* Indigo 600 */
            --bg-gradient-start: #f8fafc;
            --bg-gradient-end: #e2e8f0;
            --surface: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: #cbd5e1;
            --error: #ef4444;
            --focus-ring: rgba(99, 102, 241, 0.4);
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(135deg, var(--bg-gradient-start) 0%, var(--bg-gradient-end) 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: var(--text-main);
        }

        .login-wrapper {
            padding: 8px; /* For the outer border effect if desired, or we can use border property */
            /* Let's use a nice border and shadow instead for a cleaner "outer border" look */
        }

        .login-container {
            background-color: var(--surface);
            padding: 3rem;
            border-radius: 1rem;
            width: 100%;
            max-width: 380px;
            
            /* The requested outer border effect */
            border: 1px solid var(--border-color);
            box-shadow: 
                0 4px 6px -1px rgba(0, 0, 0, 0.1), 
                0 2px 4px -1px rgba(0, 0, 0, 0.06),
                0 0 0 4px rgba(255, 255, 255, 0.5); /* Outer glow/border ring */
            
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-container:hover {
            box-shadow: 
                0 10px 15px -3px rgba(0, 0, 0, 0.1), 
                0 4px 6px -2px rgba(0, 0, 0, 0.05),
                0 0 0 6px rgba(99, 102, 241, 0.1);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .login-header h1 {
            font-size: 1.75rem;
            font-weight: 700;
            margin: 0;
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.025em;
        }

        .login-header p {
            color: var(--text-muted);
            margin-top: 0.5rem;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            font-size: 0.9rem;
            color: var(--text-main);
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            font-size: 0.95rem;
            font-family: inherit;
            box-sizing: border-box;
            transition: all 0.2s;
            background-color: #f8fafc;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            background-color: var(--surface);
            box-shadow: 0 0 0 4px var(--focus-ring);
        }

        .is-invalid {
            border-color: var(--error);
            background-color: #fef2f2;
        }

        .is-invalid:focus {
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.2);
            border-color: var(--error);
        }

        .invalid-feedback {
            color: var(--error);
            font-size: 0.85rem;
            margin-top: 0.375rem;
            display: block;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 0.875rem;
            background: linear-gradient(to bottom right, var(--primary), var(--primary-dark));
            color: var(--white);
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.1s, box-shadow 0.2s;
            box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.3);
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 8px -1px rgba(79, 70, 229, 0.4);
        }

        .btn:active {
            transform: translateY(0);
        }

        .footer-link {
            text-align: center;
            margin-top: 2rem;
            font-size: 0.85rem;
            color: var(--text-muted);
        }
        
        .divider {
            height: 1px;
            background-color: var(--border-color);
            margin: 2rem 0;
            opacity: 0.5;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-header">
        <h1><?= SITENAME ?></h1>
        <p>Admin Portal</p>
    </div>

    <?php Flash::display(); ?>

    <form action="<?= BASE_URL ?>/admin/auth/login" method="POST">
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" class="form-control <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['email']; ?>" placeholder="name@company.com" autocomplete="email">
            <span class="invalid-feedback"><?= $data['email_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control <?= (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['password']; ?>" placeholder="••••••••" autocomplete="current-password">
            <span class="invalid-feedback"><?= $data['password_err']; ?></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn">Sign In</button>
        </div>
    </form>
    
    <div class="footer-link">
        &copy; <?= date('Y') ?> <?= SITENAME ?>. All rights reserved.
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
