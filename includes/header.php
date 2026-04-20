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
    <title>Natalia i Łukasz</title>
    <base href="/wedding/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Inter:wght@200;300;400&display=swap" rel="stylesheet">
    <link rel="icon" type="image/jpeg" href="favicon.jpg">
</head>
<body>

<header class="site-header" style="position: absolute; width: 100%; z-index: 100; background: transparent;">
    <nav class="main-nav" style="display: flex; justify-content: center; gap: 20px; padding: 20px;">
        <a class="nav-tile" href="home.php" style="text-decoration: none; color: #000; text-transform: uppercase; font-size: 0.7rem; letter-spacing: 2px;">Home</a>
        <a class="nav-tile" href="rsvp.php" style="text-decoration: none; color: #000; text-transform: uppercase; font-size: 0.7rem; letter-spacing: 2px;">RSVP</a>
        <a class="nav-tile" href="galeria.php" style="text-decoration: none; color: #000; text-transform: uppercase; font-size: 0.7rem; letter-spacing: 2px;">Galeria</a>
    </nav>
</header>