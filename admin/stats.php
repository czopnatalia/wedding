<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: /wedding/admin/admin_login.php");
    exit;
}

require_once "../includes/db.php";
include '../includes/header.php';

// Statystyki główne
$total = $db->query("SELECT COUNT(*) FROM guests")->fetchColumn();
$coming = $db->query("SELECT COUNT(*) FROM guests WHERE attending = 1")->fetchColumn();
$notComing = $db->query("SELECT COUNT(*) FROM guests WHERE attending = 0")->fetchColumn();

$invited = 80; // liczba zaproszonych osób
$noResponse = $invited - ($coming + $notComing);

// Diety
// --- STATYSTYKI GŁÓWNE ---
$coming = $db->query("SELECT COUNT(*) FROM guests WHERE attending = 1")->fetchColumn();
$notComing = $db->query("SELECT COUNT(*) FROM guests WHERE attending = 0")->fetchColumn();
$invited = 80; 
$noResponse = $invited - ($coming + $notComing);

// --- NOWA LOGIKA DIET (GRUPOWANIE) ---
// Pobieramy wszystkich, którzy przyjdą
$stmt = $db->query("SELECT diet_gluten_free, diet_vege, diet_other FROM guests WHERE attending = 1");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$diet_summary = [];

foreach ($rows as $row) {
    $guest_diets = [];

    if ($row['diet_gluten_free']) $guest_diets[] = "Bezglutenowa";
    if ($row['diet_vege'])        $guest_diets[] = "Wegetariańska";

    
    if (!empty($row['diet_other'])) {
        $guest_diets[] = htmlspecialchars($row['diet_other']);
    }

    // Tworzymy klucz dla kuchni
    if (empty($guest_diets)) {
        $key = "Standardowa";
    } else {
        sort($guest_diets); // Sortujemy, żeby "Wege+Bez glutenu" zawsze było tak samo zapisane
        $key = implode(" + ", $guest_diets);
    }

    // Liczymy ten konkretny zestaw
    if (!isset($diet_summary[$key])) {
        $diet_summary[$key] = 0;
    }
    $diet_summary[$key]++;
}

// Sortujemy listę, żeby zestawy były alfabetycznie
ksort($diet_summary);

$songs_stmt = $db->query("SELECT name, song FROM guests WHERE attending = 1 AND song IS NOT NULL AND song != ''");
$songs_list = $songs_stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<style>
.login-btn {
    background: var(--accent);
    color: #000;
    padding: 12px 22px;
    border-radius: 12px;
    border: none;
    cursor: pointer;
    font-weight: 600;
    transition: 0.3s;
    text-decoration: none;
    display: inline-block;
}

.login-btn:hover {
    background: #ffe2b3;
}

.progress-wrapper {
    margin-top: 15px;
}

.progress-bar {
    width: 100%;
    height: 32px;
    background: #e6e6e6;
    overflow: visable;
    display: flex;
    position: relative;
    box-shadow: inset 0 0 6px rgba(0,0,0,0.15);
}

.progress-bar .bar {
    height: 100%;
    position: relative;
    transition: width 1s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Kolory premium z gradientem */
.present {
    background: linear-gradient(135deg, #4CAF50, #3d8f42);
}

.absent {
    background: linear-gradient(135deg, #e74c3c, #c0392b);
}

.noresponse {
    background: linear-gradient(135deg, #bfbfbf, #a6a6a6);
}

/* Tooltip premium */
.tooltip {
    position: absolute;
    top: 40px;
    background: rgba(0,0,0,0.85);
    color: #fff;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 13px;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
    left: 50%;
    transform: translate(-50%, -10px);
    transition: 0.25s ease;
    box-shadow: 0 4px 10px rgba(0,0,0,0.25);
}

/* Strzałka tooltipa */
.tooltip::after {
    content: "";
    position: absolute;
    top: -6px;
    left: 50%;
    transform: translateX(-50%);
    border-width: 6px;
    border-style: solid;
    border-color: rgba(0,0,0,0.85) transparent transparent transparent;
}

/* Pokazywanie tooltipa */
.bar:hover .tooltip {
    opacity: 1;
    transform: translate(-50%, 0);
}

.progress-bar .bar {
    height: 100%;
    position: relative;
    transition: width 1s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 0; /* start od 0% */
}

</style>

<div class="section-card" style="max-width:700px; margin:60px auto; text-align:left; padding:20px 30px;">
    <h2>Statystyki:</h2>

    <p>Potwierdzili obecność: <strong><?= $coming ?></strong></p>
    <p>Nie pojawią się: <strong><?= $notComing ?></strong></p>
    <p>Brak odpowiedzi: <strong><?= $noResponse ?></strong></p>

    <h3 style="margin-top:50px;">Postęp odpowiedzi:</h3>

    <div class="progress-wrapper">
        <div class="progress-bar">
            <div class="bar present" data-width="<?= ($coming / $invited) * 100 ?>%">
                <span class="tooltip">Obecni: <?= $coming ?></span>
            </div>
            <div class="bar absent" data-width="<?= ($notComing / $invited) * 100 ?>%">
                <span class="tooltip">Nieobecni: <?= $notComing ?></span>
            </div>
            <div class="bar noresponse" data-width="<?= ($noResponse / $invited) * 100 ?>%">
                <span class="tooltip">Brak odpowiedzi: <?= $noResponse ?></span>
            </div>
        </div>
    </div>

    <h3 style="margin-top:50px;">Zapotrzebowanie na diety specjalne:</h3>
    <div style="background: rgba(255,255,255,0.2); padding: 15px; border-radius: 10px;">
        <?php if (empty($diet_summary)): ?>
            <p>Brak potwierdzonych gości z dietami.</p>
        <?php else: ?>
            <ul style="list-style: none; padding: 0; margin: 0;">
                <?php foreach ($diet_summary as $nazwa_dania => $ilosc): ?>
                    <li style="padding: 8px 0; border-bottom: 1px solid rgba(0,0,0,0.05); display: flex; justify-content: space-between;">
                        <span><strong><?= $nazwa_dania ?></strong></span>
                        <span style="background: var(--accent); color: #000; padding: 2px 10px; border-radius: 20px; font-weight: bold;">
                            <?= $ilosc ?> szt.
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    
    <h3 style="margin-top:40px;">Lista Piosenek</h3>
    <div style="background: rgba(255,255,255,0.2); padding: 15px; border-radius: 10px; text-align: left;">
        <?php if (empty($songs_list)): ?>
            <p>Brak zgłoszonych piosenek.</p>
        <?php else: ?>
            <table style="width: 100%; border-collapse: collapse;">
                <tr style="border-bottom: 1px solid var(--accent);">
                    <th style="padding: 10px; text-align: left;">Gość</th>
                    <th style="padding: 10px; text-align: left;">Utwór</th>
                </tr>
                <?php foreach ($songs_list as $s): ?>
                    <tr>
                        <td style="padding: 10px;"><?= htmlspecialchars($s['name']) ?></td>
                        <td style="padding: 10px;"><em><?= htmlspecialchars($s['song']) ?></em></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>

    <a href="/wedding/admin/dashboard.php" class="login-btn" style="margin-top:30px; display:inline-block;">
        Powrót
    </a>
</div>

<?php include '../includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.progress-bar .bar').forEach(function(bar) {
        const target = bar.getAttribute('data-width') || '0%';
        // małe opóźnienie, żeby transition zadziałało
        setTimeout(function () {
            bar.style.width = target;
        }, 200);
    });
});
</script>
