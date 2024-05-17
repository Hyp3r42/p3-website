<?php
// auteur: Talha    
// functie: configuratiebestand

// Databaseconfiguratie
define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "webshop");

// Verbinding maken met de database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Controleren op verbinding
if($conn === false){
    die("Fout: Kan geen verbinding maken met de database. " . mysqli_connect_error());
}
?>
