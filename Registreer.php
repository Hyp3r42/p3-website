<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
    <link rel="stylesheet" type="text/css" href="stylee.css">
</head>
<body>

<div class="container">
    <h2>Registreren</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Gebruikersnaam:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Wachtwoord:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Registreren">
    </form>

    <?php
require_once 'configi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleer of gebruikersnaam en wachtwoord zijn ingevuld
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        // Ontvang de ingevulde gegevens van het formulier
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Controleer of de gebruikersnaam al bestaat
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<p>Gebruikersnaam is al in gebruik. Kies een andere.</p>";
        } else {
            // Hash het wachtwoord
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Voeg de nieuwe gebruiker toe aan de database
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $hashed_password);

            if ($stmt->execute()) {
                echo "<p>Registratie succesvol! U kunt nu <a href='login.php'>inloggen</a>.</p>";
            } else {
                echo "<p>Er is een probleem opgetreden bij het registreren. Probeer het later opnieuw.</p>";
            }
        }
        $stmt->close();
    } else {
        echo "<p>Vul alstublieft zowel gebruikersnaam als wachtwoord in.</p>";
    }
    $conn->close();
}
?>
</div>

</body>
</html>
