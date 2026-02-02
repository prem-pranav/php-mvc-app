<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($data['title']) ? $data['title'] . ' | ' . SITENAME : SITENAME . ' Admin' ?></title>
    <link rel="shortcut icon" href="<?= BASE_URL ?>/img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="sidebar">
    <div class="sidebar-brand">
        <img src="<?= BASE_URL ?>/img/logo.png" alt="Logo" style="width: 32px; height: 32px; object-fit: contain;">
        <span><?= SITENAME ?></span>
    </div>
    <nav class="sidebar-nav">
        <a href="<?= BASE_URL ?>/admin/dashboard" class="nav-item <?= ($data['title'] == 'Dashboard') ? 'active' : '' ?>">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
        </a>

        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'superadmin'): ?>
        <a href="<?= BASE_URL ?>/admin/users" class="nav-item <?= ($data['title'] == 'User Management') ? 'active' : '' ?>">
            <i class="bi bi-people"></i>
            <span>Users</span>
        </a>
        <?php endif; ?>

        <a href="<?= BASE_URL ?>/admin/auth/logout" class="nav-item mt-auto" style="color: var(--danger);">
            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>
        </a>
    </nav>
    <div class="sidebar-footer">
        &copy; <?= date('Y') ?> <?= SITENAME ?>
    </div>
</div>

<div class="main-content">
    <header class="top-header">
        <div style="display:flex; align-items:center; gap:12px">
            <button id="sidebarToggle" class="btn btn-outline" aria-label="Toggle sidebar">
                <i class="bi bi-list"></i>
            </button>
            <div class="header-title"><?= isset($data['title']) ? $data['title'] : 'Dashboard' ?></div>
        </div>
        <div class="user-menu">
            <div class="user-info-detailed">
                <span class="user-name-detailed">
                    <?= $_SESSION['user_name'] ?? 'Admin' ?>
                    <span class="user-role-inline">(<?= ucfirst($_SESSION['user_role'] ?? 'Admin') ?>)</span>
                </span>
            </div>
            <a href="<?= BASE_URL ?>/admin/auth/logout" class="btn btn-outline btn-sm" title="Logout">
                <i class="bi bi-box-arrow-right"></i>
            </a>
        </div>
    </header>

    <main class="content-wrapper">
        <?php Flash::display(); ?>
