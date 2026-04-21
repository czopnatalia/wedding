<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$has_access = isset($_SESSION['access']) || isset($_SESSION['admin_logged_in']);
$is_index = basename($_SERVER['PHP_SELF']) === 'index.php';
if (!$has_access && !$is_index) { header("Location: /wedding/index.php"); exit; }
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
    <style>
        /* DOMYŚLNY UKŁAD (PC) - powrót do Twoich oryginałów */
        .site-header { width: 100%; background: rgba(255,255,255,0.9); padding: 20px 0; }
        .site-header-inner { display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        .site-title-panel h1 { font-family: 'Playfair Display', serif; font-size: 1.8rem; margin: 0; }
        .nav-menu { display: flex; gap: 30px; }
        .nav-menu a { text-decoration: none; color: #333; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 1px; }
        .menu-toggle { display: none; }

        /* TYLKO NA TELEFONIE */
        @media (max-width: 768px) {
            .menu-toggle { display: flex; flex-direction: column; gap: 5px; background: none; border: none; cursor: pointer; }
            .menu-toggle span { display: block; width: 25px; height: 3px; background: #333; }
            .nav-menu {
                display: none; flex-direction: column; position: absolute; top: 70px; left: 0; width: 100%;
                background: #fff; padding: 20px 0; text-align: center; box-shadow: 0 5px 10px rgba(0,0,0,0.1); z-index: 1000;
            }
            .nav-menu.active { display: flex; }
            .nav-menu a { padding: 15px 0; border-bottom: 1px solid #eee; width: 100%; }
        }
    </style>
</head>
<body>
<header class="site-header">
    <div class="site-header-inner">
        <div class="site-title-panel"><h1>Natalia i Łukasz</h1></div>
        <button class="menu-toggle" id="menu-btn"><span></span><span></span><span></span></button>
        <nav class="nav-menu" id="nav-links">
            <a href="home.php">Strona główna</a>
            <a href="rsvp.php">Potwierdź obecność</a>
            <a href="galeria.php">Galeria zdjęć</a>
            <a href="admin/admin_login.php">Administrator</a>
        </nav>
    </div>
</header>
<script>
    document.getElementById('menu-btn').onclick = function() {
        document.getElementById('nav-links').classList.toggle('active');
    };
</script>