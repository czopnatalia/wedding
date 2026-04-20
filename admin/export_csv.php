<?php
error_reporting(0);
ini_set('display_errors', 0);

require_once "../includes/db.php";

// Pobranie danych
$stmt = $db->query("SELECT * FROM guests ORDER BY name ASC");
$guests = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Nagłówki CSV
header('Content-Type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="lista_gosci.csv"');

echo "\xEF\xBB\xBF";

// Otwieramy strumień
$output = fopen('php://output', 'w');

// Nagłówki kolumn
fputcsv($output, [
    'Imię i nazwisko',
    'Obecność',
    'Dieta',
    'Piosenka'
], ';'); 

// Dane
foreach ($guests as $g) {

    $diets = [];
    if ($g['diet_gluten_free']) $diets[] = "Bezglutenuowa";
    if ($g['diet_vege']) $diets[] = "Wegetariańska";
    if ($g['diet_other']) $diets[] = $g['diet_other'];

    fputcsv($output, [
        $g['name'],
        $g['attending'] ? "Obecny" : "Nieobecny",
        implode(", ", $diets),
        trim((string)($g['song'] ?? ''))
    ], ';');
}

fclose($output);
exit;
