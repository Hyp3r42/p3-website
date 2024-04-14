<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "webshop";

// Probeer een verbinding met de database tot stand te brengen
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Stel de PDO-error mode in op exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Geef een melding weer als de verbinding succesvol is
    echo "";
} catch(PDOException $e) {
    // Toon een foutmelding als de verbinding mislukt
    die("Connection failed: " . $e->getMessage());
}
?>
