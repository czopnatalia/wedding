<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Sprawdzamy, czy użytkownik ma JAKIKOLWIEK dostęp (jako gość LUB jako admin)
$has_access = isset($_SESSION['access']) || isset($_SESSION['admin_logged_in']);
$is_index = basename($_SERVER['PHP_SELF']) === 'index.php';

// Jeśli nie ma dostępu i nie jest na stronie głównej (index.php) - wyrzuć do bramki
if (!$has_access && !$is_index) {
    header("Location: /wedding/index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Natalia i Łukasz</title>
    <base href="/wedding/">
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/jpeg" href="/wedding/favicon.jpg">
    <style>
        .nav-menu { display: flex; gap: 15px; }
        .nav-menu a { text-decoration: none; color: #333; font-weight: 500; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; white-space: nowrap; }

        .menu-toggle { display: none; flex-direction: column; gap: 5px; background: none; border: none; cursor: pointer; padding: 5px; }
        .menu-toggle span { display: block; width: 25px; height: 3px; background: #333; transition: 0.3s; }
        @media (max-width: 900px) {
            .menu-toggle { display: flex; }
            .nav-menu {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 70px; left: 0; width: 100%;
                background: #fff;
                padding: 10px 0;
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
                text-align: center;
                gap: 0;
            }
            .nav-menu.active { display: flex; }
            .nav-menu a { padding: 15px; border-bottom: 1px solid #f5f5f5; width: 100%; box-sizing: border-box; }
        }
    </style>
</head>
<body>
<div class="site-wrapper" style="display: flex; flex-direction: column; min-height: 100vh;">

<header class="site-header">
    <div class="site-header-inner">
        <div class="site-title-panel">
            <h1>Natalia i Łukasz</h1>
        </div>
        <button class="menu-toggle" id="menu-btn">
            <span></span><span></span><span></span>
        </button>
        <nav class="main-nav" id="nav-links">
            <a class="nav-tile" href="home.php">Strona główna</a>
            <a class="nav-tile" href="rsvp.php">Potwierdź obecność</a>
            <a class="nav-tile" href="galeria.php">Galeria zdjęć</a>
            <a class="nav-tile" href="admin/admin_login.php">Administrator</a>
        </nav>
    </div>
</header>
<div style="margin-top: 80px;"></div>
<script>
    const menuBtn = document.getElementById('menu-btn');
    const navLinks = document.getElementById('nav-links');
    menuBtn.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });
</script>
<div class="site-wrapper"> <div class="main">