<?php
require_once "includes/db.php";

// SPRAWDZENIE, CZY FORMULARZ ZOSTAŁ WYSŁANY
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: rsvp.php");
    exit;
}

$code = "RSVP";

// Pobieramy główne dane z formularza
$imiona = $_POST['imie'] ?? [];
$nazwiska = $_POST['nazwisko'] ?? [];
$obecnosci = $_POST['obecnosc'] ?? [];

// Pobieramy dane o dietach
$d_gluten = $_POST['dieta_gluten'] ?? [];
$d_vege = $_POST['dieta_vege'] ?? [];
$d_other = $_POST['dieta_other_text'] ?? [];

// Pobieramy piosenki
$piosenki = $_POST['piosenka'] ?? [];

$duplikaty = []; // lista osób, które już istnieją

for ($i = 0; $i < count($imiona); $i++) {
    // Pomijamy, jeśli imię jest puste (zabezpieczenie)
    if (empty(trim($imiona[$i]))) continue;

    $name = trim($imiona[$i] . " " . $nazwiska[$i]);
    $attending = ($obecnosci[$i] === "tak") ? 1 : 0;

    // Inicjalizacja zmiennych dla KAŻDEJ osoby osobno
    $gluten = 0;
    $vege = 0;
    $other_diet = null;
    $song = null;

    if ($attending) {
        // Diety (tylko te, które zostawiliśmy)
        if (isset($d_gluten[$i])) $gluten = 1;
        if (isset($d_vege[$i]))   $vege = 1;
        
        // Pole "Inna dieta"
        if (!empty($d_other[$i])) {
            $other_diet = trim($d_other[$i]);
        }

        // Piosenka
        if (!empty($piosenki[$i])) {
            $song = trim($piosenki[$i]);
        }
    }

    // SPRAWDZENIE DUPLIKATU (czy osoba o tym imieniu i nazwisku już jest w bazie)
    $check = $db->prepare("SELECT id FROM guests WHERE name = ?");
    $check->execute([$name]);

    if ($check->rowCount() > 0) {
        $duplikaty[] = $name;
        continue;
    }

    // ZAPIS DO BAZY
    // Zakładamy, że kolumna w bazie nazywa się 'song'. 
    // Jeśli jeszcze jej nie masz, wykonaj w bazie: ALTER TABLE guests ADD COLUMN song VARCHAR(255) DEFAULT NULL;
    $insert = $db->prepare("
        INSERT INTO guests 
        (code, name, attending, diet_gluten_free, diet_vege, diet_other, song, is_companion)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $insert->execute([
        $code,
        $name,
        $attending,
        $gluten,
        $vege,
        $other_diet,
        $song,
        ($i === 0 ? 0 : 1) // Pierwsza osoba to gość główny (0), reszta to towarzyszące (1)
    ]);
}

// JEŚLI SĄ DUPLIKATY → PRZEKIEROWANIE Z LISTĄ
if (!empty($duplikaty)) {
    $lista = urlencode(implode(", ", $duplikaty));
    header("Location: rsvp.php?duplikaty=$lista&success=1");
    exit;
}

// JEŚLI WSZYSTKO OK
header("Location: rsvp.php?success=1");
exit;