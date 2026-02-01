<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($data['title']) ? $data['title'] : SITENAME ?></title>
    <link rel="shortcut icon" href="<?= BASE_URL ?>/img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/client.css">
</head>
<body>
    <header>
        <div class="container">
            <div id="branding" style="display: flex; align-items: center; gap: 10px;">
                <img src="<?= BASE_URL ?>/img/logo.png" alt="Logo" style="width: 35px; height: 35px; object-fit: contain;">
                <h1><span class="highlight"><?= SITENAME ?></span></h1>
            </div>
            <nav>
                <ul>
                    <li><a href="<?= BASE_URL ?>">Home</a></li>
                    <li><a href="<?= BASE_URL ?>/admin">Admin</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <?php Flash::display(); ?>
    </div>
