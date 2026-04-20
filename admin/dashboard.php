<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: /wedding/admin/admin_login.php");
    exit;
}


include '../includes/header.php';
?>

<div class="section-card" style="max-width:900px; margin:60px auto; text-align:center;">

    <h2 style="margin-bottom:30px;">Panel administratora</h2>

    <nav class="main-nav" style="display:flex; justify-content:center; gap:20px; flex-wrap:wrap;">

        <a class="nav-tile" href="/wedding/admin/guests.php">Lista gości</a>
        <a class="nav-tile" href="/wedding/admin/stats.php">Statystyki</a>
        <a class="nav-tile" href="/wedding/admin/gallery.php">Moderacja zdjęć</a>
        <a class="nav-tile" href="/wedding/admin/admin_logout.php">Wyloguj</a>

    </nav>

</div>

<?php include '../includes/footer.php'; ?>
