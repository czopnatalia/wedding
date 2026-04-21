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
        body { margin: 0; padding: 0; background-color: #f9f9f9; }

        /* HEADER STAŁY */
        .site-header {
            position: fixed;
            top: 0; left: 0; width: 100%;
            background: #fff; /* Pełny biały kolor, aby nic nie prześwitywało */
            z-index: 10000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .site-header-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-direction: column; /* Napis nad menu */
            align-items: center;
            gap: 15px;
        }

        /* NAPIS NA ŚRODKU */
        .site-title-panel h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            margin: 0;
            color: #333;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* MENU NA KOMPUTERZE */
        .main-nav {
            display: flex;
            gap: 30px;
            justify-content: center;
        }

        .main-nav a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            padding-bottom: 5px;
        }

        /* EFEKT PODKREŚLENIA PO NAJECHANIU */
        .main-nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 1px;
            bottom: 0;
            left: 0;
            background-color: #8c7e6d;
            transition: width 0.3s ease;
        }

        .main-nav a:hover::after {
            width: 100%;
        }

        /* UKRYTY HAMBURGER NA PC */
        .menu-toggle { display: none; }

        /* ODSTĘP POD HEADEREM - kluczowy, by treść nie wjeżdżała pod spód */
        .header-spacer {
            height: 140px; /* Dopasowane do wysokości rozbudowanego headera */
        }

        /* --- RESPONSYWNOŚĆ (TELEFON) --- */
        @media (max-width: 900px) {
            .site-header-inner {
                flex-direction: row; /* Na telefonie logo i hamburger obok siebie */
                height: 70px;
                padding: 0 20px;
            }

            .site-title-panel h1 { font-size: 1.4rem; }

            .header-spacer { height: 70px; }

            .menu-toggle {
                display: flex;
                flex-direction: column;
                gap: 5px;
                background: none;
                border: none;
                cursor: pointer;
            }

            .menu-toggle span {
                display: block;
                width: 25px;
                height: 3px;
                background: #333;
            }

            .main-nav {
                display: none; /* Ukryte menu mobilne */
                flex-direction: column;
                position: absolute;
                top: 70px;
                left: 0;
                width: 100%;
                background: #fff;
                padding: 20px 0;
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
                gap: 0;
            }

            .main-nav.active { display: flex; }

            .main-nav a {
                padding: 15px;
                border-bottom: 1px solid #f5f5f5;
                width: 100%;
                text-align: center;
            }

            .main-nav a::after { display: none; } /* Wyłączamy podkreślenie na mobile */
        }
    </style>
</head>
<body>

<header class="site-header">
    <div class="site-header-inner">
        <div class="site-title-panel">
            <h1>Natalia i Łukasz</h1>
        </div>

        <button class="menu-toggle" id="menu-btn">
            <span></span><span></span><span></span>
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

<div class="site-wrapper">
    <main>

<script>
    const menuBtn = document.getElementById('menu-btn');
    const navLinks = document.getElementById('nav-links');

    menuBtn.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });
</script>