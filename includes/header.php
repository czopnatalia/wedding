<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Logika dostępu - nienaruszona
$has_access = isset($_SESSION['access']) || isset($_SESSION['admin_logged_in']);
$is_index = basename($_SERVER['PHP_SELF']) === 'index.php';

if (!$has_access && !$is_index) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Natalia i Łukasz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/wedding/">
    <link rel="stylesheet" href="assets/style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    
    <style>
        body, html { margin: 0; padding: 0; height: 100%; width: 100%; font-family: 'Inter', sans-serif; }
        .split-container { display: flex; min-height: 100vh; width: 100%; }

        /* TWOJE ZDJĘCIE - LEWA STRONA */
        .side-image {
            flex: 1;
            background-image: url('assets/hero.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        /* TREŚĆ - PRAWA STRONA */
        .main-content {
            flex: 1.2;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            color: #1a1a1a;
        }

        .site-header { padding: 30px 20px; text-align: center; }
        .site-title-panel h1 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        /* TWOJA NAWIGACJA Z ADMINISTRATOREM */
        .main-nav { display: flex; justify-content: center; gap: 15px; flex-wrap: wrap; }
        .nav-tile {
            text-decoration: none;
            color: #000;
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            opacity: 0.5;
            transition: 0.3s;
        }
        .nav-tile:hover { opacity: 1; }
        .admin-link { border-left: 1px solid #ddd; padding-left: 15px; margin-left: 5px; }

        .content-wrapper {
            padding: 40px 60px;
            max-width: 850px;
            margin: 0 auto;
            width: 100%;
            box-sizing: border-box;
        }

        @media (max-width: 1024px) {
            .split-container { flex-direction: column; }
            .side-image { height: 40vh; flex: none; background-attachment: scroll; }
            .content-wrapper { padding: 30px 20px; }
        }
    </style>
</head>
<body>

<div class="split-container">
    <div class="side-image"></div>
    <div class="main-content">
        <?php if ($has_access && !$is_index): ?>
        <header class="site-header">
            <div class="site-title-panel"><h1>Natalia i Łukasz</h1></div>
            <nav class="main-nav">
                <a class="nav-tile" href="home.php">Strona główna</a>
                <a class="nav-tile" href="rsvp.php">Potwierdź obecność</a>
                <a class="nav-tile" href="galeria.php">Galeria zdjęć</a>
                <a class="nav-tile admin-link" href="admin/admin_login.php">Administrator</a>
            </nav>
        </header>
        <?php endif; ?>
        <div class="content-wrapper">