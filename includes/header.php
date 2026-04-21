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
</head>
<body>
<div class="site-wrapper" style="display: flex; flex-direction: column; min-height: 100vh;">

<header class="site-header">
    <div class="site-header-inner">
        <div class="site-title-panel">
            <h1>Natalia i Łukasz</h1>
        </div>
        <nav class="main-nav">
            <a class="nav-tile" href="home.php">Strona główna</a>
            <a class="nav-tile" href="rsvp.php">Potwierdź obecność</a>
            <a class="nav-tile" href="galeria.php">Galeria zdjęć</a>
            <a class="nav-tile" href="admin/admin_login.php">Administrator</a>
        </nav>
    </div>
</header>
<div class="site-wrapper"> <div class="main">