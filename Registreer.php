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
    require_once 'configp.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verwerk het formulier

        // Controleer of gebruikersnaam en wachtwoord zijn ingevuld
        if (!empty($_POST["username"]) && !empty($_POST["password"])) {
            // Verbind met de database
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Ontvang de ingevulde gegevens van het formulier
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Controleer of de gebruikersnaam al bestaat
            $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if ($user) {
                echo "<p>Gebruikersnaam is al in gebruik. Kies een andere.</p>";
            } else {
                // Hash het wachtwoord
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Voeg de nieuwe gebruiker toe aan de database
                $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
                if ($stmt->execute([$username, $hashed_password])) {
                    echo "<p>Registratie succesvol! U kunt nu <a href='login.php'>inloggen</a>.</p>";
                } else {
                    echo "<p>Er is een probleem opgetreden bij het registreren. Probeer het later opnieuw.</p>";
                }
            }
        } else {
            echo "<p>Vul alstublieft zowel gebruikersnaam als wachtwoord in.</p>";
        }
    }
    ?>
</div>

</body>
</html>
