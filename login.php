<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="stylee.css">
</head>
<body>

<?php
include "configi.php";

// Controleer of het formulier is verzonden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ontvang gebruikersnaam en wachtwoord uit het formulier
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Zoek de gebruiker in de database
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Gebruiker gevonden, controleer het wachtwoord
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Wachtwoord is correct, doorsturen naar de homepagina
            header("Location: Home page.html");
            exit; // Zorg ervoor dat het script hier stopt om door te gaan met de redirect
        } else {
            // Wachtwoord is onjuist
            echo "<h2>Ongeldige gebruikersnaam of wachtwoord</h2>";
        }
    } else {
        // Gebruiker niet gevonden
        echo "<h2>Ongeldige gebruikersnaam of wachtwoord</h2>";
    }

    $stmt->close();
}
?>

<div class="container">
    <h1>Inloggen</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Vul uw gegevens in</h2>
        <label for="username">Gebruikersnaam:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Wachtwoord:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Inloggen">
    </form>
    <h2>Aanmelden</h2>
    <p>Nog geen account? <a href="Registreer.php">Registreer hier</a>.</p>
</div>

</body>
</html>