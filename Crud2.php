<?php
// Inclusie van het configuratiebestand
include 'config.php';

// CRUD-operaties

// Create - Voeg een nieuwe bestelling toe
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    // Verkrijg gegevens van het formulier
    $bestelling_code = $_POST['bestelling_code'];
    $klant_code = $_POST['klant_code'];
    $product_code = $_POST['product_code'];
    $aantal = $_POST['aantal'];

    // SQL-query voor het toevoegen van een bestelling
    $sql = "INSERT INTO bestelling (BestellingCode, KlantCode, ProductCode, Aantal) VALUES ('$bestelling_code', '$klant_code', '$product_code', $aantal)";
    // Uitvoeren van de SQL-query
    if ($pdo->query($sql) === TRUE) {
        echo "Bestelling toegevoegd!";
    } else {
        echo "Error: " . $sql . "<br>" . $pdo->error;
    }
}

// Read - Haal bestellingen op uit de database
$sql = "SELECT * FROM bestelling";
$result = $pdo->query($sql);

// Update - Wijzig een bestaande bestelling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Verkrijg gegevens van het formulier
    $id = $_POST['id'];
    $aantal = $_POST['aantal'];

    // SQL-query voor het bijwerken van een bestelling
    $sql = "UPDATE bestelling SET Aantal=$aantal WHERE id=$id";
    // Uitvoeren van de SQL-query
    if ($pdo->query($sql) === TRUE) {
        echo "Bestelling bijgewerkt!";
    } else {
        echo "Error: " . $sql . "<br>" . $pdo->error;
    }
}

// Delete - Verwijder een bestaande bestelling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Verkrijg gegevens van het formulier
    $id = $_POST['id'];

    // SQL-query voor het verwijderen van een bestelling
    $sql = "DELETE FROM bestelling WHERE id=$id";
    // Uitvoeren van de SQL-query
    if ($pdo->query($sql) === TRUE) {
        echo "Bestelling verwijderd!";
    } else {
        echo "Error: " . $sql . "<br>" . $pdo->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Schoenwinkel Bestellingen</title>
    <link rel="stylesheet" href="ccstyle.css">
</head>
<body>
    <!-- Formulier voor het toevoegen van een nieuwe bestelling -->
    <h2>Nieuwe bestelling toevoegen:</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        BestellingCode: <input type="text" name="bestelling_code"><br>
        KlantCode: <input type="text" name="klant_code"><br>
        ProductCode: <input type="text" name="product_code"><br>
        Aantal: <input type="number" name="aantal"><br>
        <br>
        <input type="submit" name="create" value="Toevoegen">
    </form>

    <!-- Weergave van bestellingen -->
    <h2>Bestellingen:</h2>
    <?php
    if ($result->rowCount() > 0) {
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "BestellingCode: " . $row["BestellingCode"]. " - KlantCode: " . $row["KlantCode"]. " - ProductCode: " . $row["ProductCode"]. " - Aantal: " . $row["Aantal"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    ?>

    <!-- Formulier voor het bijwerken van een bestelling -->
    <h2>Bestelling bijwerken:</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        ID van de bestelling: <input type="number" name="id"><br>
        Nieuw aantal: <input type="number" name="aantal"><br>
        <br>
        <input type="submit" name="update" value="Bijwerken">
    </form>

    <!-- Formulier voor het verwijderen van een bestelling -->
    <h2>Bestelling verwijderen:</h2>
