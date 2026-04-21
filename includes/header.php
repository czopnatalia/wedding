<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$has_access = isset($_SESSION['access']) || isset($_SESSION['admin_logged_in']);
$is_index = basename($_SERVER['PHP_SELF']) === 'index.php';

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
        /* RESET I PODSTAWA */
        body { margin: 0; padding: 0; }

        .site-header {
            position: fixed;
            top: 0; 
            left: 0;
            width: 100%;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            z-index: 10000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .site-header-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            max-width: 1200px;
            margin: 0 auto;
            height: 70px; /* Stała wysokość */
        }

        .site-title-panel h1 { 
            font-family: 'Playfair Display', serif; 
            font-size: 1.4rem; 
            margin: 0; 
            color: #333; 
        }

        /* MENU NA DUŻYM EKRANIE */
        .main-nav { 
            display: flex; 
            gap: 20px; 
        }

        .main-nav a { 
            text-decoration: none; 
            color: #333; 
            font-weight: 500; 
            font-size: 0.8rem; 
            text-transform: uppercase; 
            letter-spacing: 1px; 
            white-space: nowrap;
            transition: color 0.3s;
        }

        .main-nav a:hover { color: #8c7e6d; }

        /* HAMBURGER - UKRYTY DOMYŚLNIE */
        .menu-toggle { 
            display: none; 
            flex-direction: column; 
            gap: 5px; 
            background: none; 
            border: none; 
            cursor: pointer; 
            padding: 5px; 
            z-index: 10001;
        }

        .menu-toggle span { 
            display: block; 
            width: 25px; 
            height: 3px; 
            background: #333; 
            transition: 0.3s; 
        }

        /* ODSTĘP POD HEADEREM - zapobiega wjeżdżaniu treści pod spód */
        .header-spacer {
            height: 70px; /* Tyle samo co wysokość headera */
        }

        /* STYLE DLA TELEFONU (MOBILE) */
        @media (max-width: 900px) {
            .menu-toggle { 
                display: flex; /* Pokazuje kreski na telefonie */
            }

            .main-nav {
                display: none; /* Ukrywa standardowe menu */
                flex-direction: column;
                position: absolute;
                top: 70px; 
                left: 0; 
                width: 100%;
                background: #fff;
                padding: 10px 0;
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
                text-align: center;
                gap: 0;
            }

            .main-nav.active { 
                display: flex; /* Pokazuje menu po kliknięciu w kreski */
            }

            .main-nav a { 
                padding: 15px; 
                border-bottom: 1px solid #f5f5f5; 
                width: 100%; 
                box-sizing: border-box; 
                display: block;
            }
        }
    </style>
</head>
<body>

<header class="site-header">
    <div class="site-header-inner">
        <div class="site-title-panel">
            <h1>Natalia i Łukasz</h1>
        </div>

        <button class="menu-toggle" id="menu-btn" aria-label="Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="main-nav" id="nav-links">
            <a href="home.php">Strona główna</a>
            <a href="rsvp.php">Potwierdź obecność</a>
            <a href="galeria.php">Galeria zdjęć</a>
            <a href="admin/admin_login.php">Administrator</a>
        </nav>
    </div>
</header>

<div class="header-spacer"></div>

<div class="site-wrapper" style="display: flex; flex-direction: column; min-height: calc(100vh - 70px);">

<script>
    const menuBtn = document.getElementById('menu-btn');
    const navLinks = document.getElementById('nav-links');

    menuBtn.addEventListener('click', () => {
        navLinks.classList.toggle('active');
        
        // Opcjonalnie: animacja skrzyżowania kresek
        const spans = menuBtn.getElementsByTagName('span');
        if (navLinks.classList.contains('active')) {
            spans[0].style.transform = "rotate(45deg) translate(5px, 5px)";
            spans[1].style.opacity = "0";
            spans[2].style.transform = "rotate(-45deg) translate(7px, -7px)";
        } else {
            spans[0].style.transform = "none";
            spans[1].style.opacity = "1";
            spans[2].style.transform = "none";
        }
    });
</script>
<div class="site-wrapper"> <div class="main">