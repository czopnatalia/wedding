<?php
$host = "fdb1033.awardspace.net";
$user = "4747148_wedding";
$pass = "srsU7v5Y1h_Ef[P%";
$dbname = "4747148_wedding";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Błąd połączenia: " . $e->getMessage());
}
