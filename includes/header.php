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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natalia i Łukasz</title>
    <base href="/wedding/">
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/jpeg" href="/wedding/favicon.jpg">
    <style>
        /* Twoje oryginalne style dla komputera zostają w assets/style.css, 
           tutaj dodajemy tylko obsługę wersji mobilnej */

        /* Przycisk hamburgera - domyślnie ukryty na komputerze */
        .menu-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 10px;
            z-index: 1001;
        }

        .menu-toggle span {
            display: block;
            width: 25px;
            height: 3px;
            background-color: #333; /* Dopasuj kolor do Twojego stylu */
            transition: 0.3s;
        }

        /* STYLIZACJA TYLKO DLA TELEFONU (poniżej 768px) */
        @media (max-width: 768px) {
            .menu-toggle {
                display: flex; /* Pokaż kreski na telefonie */
            }

            .site-header-inner {
                display: flex;
                justify-content: space-between;
                align-items: center;
                position: relative;
            }

            .main-nav {
                display: none; /* Ukryj menu na start */
                flex-direction: column;
                position: absolute;
                top: 100%; /* Pojawi się tuż pod headerem */
                left: 0;
                width: 100%;
                background-color: #fff; /* Tło panelu */
                box-shadow: 0 5px 10px rgba(0,0,0,0.1);
                padding: 20px 0;
                z-index: 1000;
            }

            /* Klasa dodawana przez JS po kliknięciu */
            .main-nav.active {
                display: flex;
            }

            .nav-tile {
                padding: 15px 20px;
                width: 100%;
                box-sizing: border-box;
                border-bottom: 1px solid #eee;
            }
            
            /* Napis Natalia i Łukasz - dopasowanie rozmiaru na mobile */
            .site-title-panel h1 {
                font-size: 1.5rem;
            }
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

        <button class="menu-toggle" id="mobile-menu-trigger">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="main-nav" id="main-navigation">
            <a class="nav-tile" href="home.php">Strona główna</a>
            <a class="nav-tile" href="rsvp.php">Potwierdź obecność</a>
            <a class="nav-tile" href="galeria.php">Galeria zdjęć</a>
            <a class="nav-tile" href="admin/admin_login.php">Administrator</a>
        </nav>
    </div>
</header>

<script>
    // Skrypt obsługujący kliknięcie w hamburgera
    document.getElementById('mobile-menu-trigger').addEventListener('click', function() {
        document.getElementById('main-navigation').classList.toggle('active');
        
        // Opcjonalnie: prosta animacja kresek (zmieniają się w X)
        this.classList.toggle('open');
        const spans = this.querySelectorAll('span');
        if (this.classList.contains('open')) {
            spans[0].style.transform = "rotate(45deg) translate(5px, 6px)";
            spans[1].style.opacity = "0";
            spans[2].style.transform = "rotate(-45deg) translate(5px, -6px)";
        } else {
            spans[0].style.transform = "none";
            spans[1].style.opacity = "1";
            spans[2].style.transform = "none";
        }
    });
</script>

<div class="site-wrapper"> 
    <div class="main">