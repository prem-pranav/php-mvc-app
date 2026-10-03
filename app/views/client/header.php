<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($data['title']) ? $data['title'] : SITENAME . ' | High Performance PHP MVC Framework' ?></title>
    <link rel="shortcut icon" href="<?= BASE_URL ?>/img/logo.png" type="image/x-icon">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/client.css">
</head>
<body>
    <header class="page-header sticky-top">
        <div class="container header-inner">
            <a href="<?= BASE_URL ?>" class="branding">
                <div class="logo-wrapper">
                    <img src="<?= BASE_URL ?>/img/logo.png" alt="Logo" class="logo">
                </div>
                <div class="brand-text">
                    <span class="highlight"><?= SITENAME ?></span>
                    <span class="badge-version">v2.4 Core</span>
                </div>
            </a>
            
            <nav class="desktop-nav">
                <div class="nav-menu-box">
                    <ul class="nav-list">
                        <li class="nav-item"><a href="<?= BASE_URL ?>" class="nav-link active"><i class="bi bi-house-door me-1"></i> Home</a></li>
                        <li class="nav-divider"></li>
                        <li class="nav-item"><a href="#features" class="nav-link"><i class="bi bi-cpu me-1"></i> Features</a></li>
                        <li class="nav-divider"></li>
                        <li class="nav-item"><a href="#architecture" class="nav-link"><i class="bi bi-diagram-3 me-1"></i> Architecture</a></li>
                        <li class="nav-divider"></li>
                        <li class="nav-item"><a href="#quickstart" class="nav-link"><i class="bi bi-terminal me-1"></i> Quick Start</a></li>
                    </ul>
                </div>
            </nav>

            <div class="header-actions">
                <a href="<?= BASE_URL ?>/admin" class="btn btn-nav-admin">
                    <i class="bi bi-speedometer2"></i>
                    <span>Admin Portal</span>
                </a>
                <a href="#quickstart" class="btn btn-nav-primary">
                    <span>Get Started</span>
                    <i class="bi bi-arrow-right-short"></i>
                </a>
            </div>
        </div>
    </header>

    <div class="container mt-3">
        <?php if (class_exists('Flash')) { Flash::display(); } ?>
    </div>

