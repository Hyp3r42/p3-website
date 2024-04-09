<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inloggen"; // Dit moet de naam van je database zijn

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Controleer of het formulier is verzonden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de ingediende gegevens op
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Controleer of de gebruikersnaam al bestaat
    $query = "SELECT id FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query); // Correctie hier, gebruik $conn in plaats van $connection
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Deze gebruikersnaam is al in gebruik. Kies een andere.</h2>";
    } else {
        // Voeg de nieuwe gebruiker toe aan de database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
        if (mysqli_query($conn, $insert_query)) { // Correctie hier, gebruik $conn in plaats van $connection
            echo "<h2>Registratie succesvol. U kunt nu inloggen.</h2>";
        } else {
            echo "<h2>Er is een probleem opgetreden bij het registreren. Probeer het later opnieuw.</h2>";
        }
    }
}
?>
