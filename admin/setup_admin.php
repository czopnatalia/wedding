<?php
require '../includes/db.php';

$admins = [
    ['login' => 'natalia', 'pass' => 'HasloNatalia123'],
    ['login' => 'lukasz',  'pass' => 'HasloLukasz123']
];

$stmt = $db->prepare("INSERT INTO admins (username, password_hash) VALUES (?, ?)");

foreach ($admins as $user) {
    $hashed = password_hash($user['pass'], PASSWORD_DEFAULT);
    
    if ($stmt->execute([$user['login'], $hashed])) {
        echo "Dodano administratora: " . $user['login'] . "<br>";
    } else {
        echo "Błąd przy dodawaniu: " . $user['login'] . " (możliwe, że login już istnieje)<br>";
    }
}

echo "Gotowe. Pamiętaj, aby usunąć ten plik z serwera!";
?>