<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Inter:wght@200;300;400;500&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --accent: #1a1a1a;
            --text-main: #1a1a1a;
            --glass: rgba(255, 255, 255, 0.45);
        }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            /* Tło chmury czarno-białe */
            background: url('assets/chmury.webp') no-repeat center center fixed;
            background-size: cover;
            filter: none; /* Tu nie dajemy grayscale, bo zszarzy wszystko. Lepiej mieć zszarzony plik graficzny */
            backdrop-filter: grayscale(1); /* To zszarzy tylko tło pod spodem */
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            display: flex;
            flex-direction: column;
        }

        /* Aby tylko tło było czarno-białe, a treść nie */
        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: inherit;
            filter: grayscale(100%) brightness(1.1);
            z-index: -1;
        }

        .site-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        header.site-header {
            width: 100%;
            max-width: 900px;
            margin-bottom: 40px;
            text-align: center;
        }

        .site-title-panel h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            letter-spacing: 6px;
            text-transform: uppercase;
            margin: 40px 0 20px;
            font-weight: 400;
        }

        .main-nav {
            display: flex;
            justify-content: center;
            gap: 25px;
            flex-wrap: wrap;
        }

        .nav-tile {
            text-decoration: none;
            color: var(--text-main);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            opacity: 0.6;
            transition: 0.3s;
            padding: 5px 0;
            border-bottom: 1px solid transparent;
        }

        .nav-tile:hover {
            opacity: 1;
            border-bottom: 1px solid var(--text-main);
        }

        /* Karta z efektem szkła */
        .section-card {
            width: 100%;
            max-width: 850px;
            background: var(--glass);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            padding: 60px 50px;
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
            box-sizing: border-box;
            margin-bottom: 50px;
        }

        @media (max-width: 768px) {
            .section-card { padding: 40px 20px; }
            .site-title-panel h1 { font-size: 1.6rem; letter-spacing: 3px; }
        }
    </style>
</head>
<body>

<div class="site-wrapper">
    <?php if ($has_access && !$is_index): ?>
    <header class="site-header">
        <div class="site-title-panel">
            <h1>Natalia & Łukasz</h1>
        </div>
        <nav class="main-nav">
            <a class="nav-tile" href="home.php">Zaproszenie</a>
            <a class="nav-tile" href="rsvp.php">Potwierdź obecność</a>
            <a class="nav-tile" href="galeria.php">Galeria zdjęć</a>
            <a class="nav-tile" href="admin/admin_login.php" style="margin-left: 10px; opacity: 0.4;">Administrator</a>
        </nav>
    </header>
    <?php endif; ?>