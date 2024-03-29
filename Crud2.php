<?php
// Database configuratie
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webshop";

// Verbinding maken met de database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// CRUD-operaties

// Create
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $bestelling_code = $_POST['bestelling_code'];
    $klant_code = $_POST['klant_code'];
    $product_code = $_POST['product_code'];
    $aantal = $_POST['aantal'];

    $sql = "INSERT INTO bestellingen (BestellingCode, KlantCode, ProductCode, Aantal) VALUES ('$bestelling_code', '$klant_code', '$product_code', $aantal)";
    if ($conn->query($sql) === TRUE) {
        echo "Bestelling toegevoegd!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Read
$sql = "SELECT * FROM bestelling";
$result = $conn->query($sql);

// Update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $aantal = $_POST['aantal'];

    $sql = "UPDATE bestellingen SET Aantal=$aantal WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Bestelling bijgewerkt!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM bestellingen WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Bestelling verwijderd!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <h2>Nieuwe bestelling toevoegen:</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        BestellingCode: <input type="text" name="bestelling_code"><br>
        KlantCode: <input type="text" name="klant_code"><br>
        ProductCode: <input type="text" name="product_code"><br>
        Aantal: <input type="number" name="aantal"><br>
        <input type="submit" name="create" value="Toevoegen">
    </form>

    <h2>Bestellingen:</h2>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "BestellingCode: " . $row["BestellingCode"]. " - KlantCode: " . $row["KlantCode"]. " - ProductCode: " . $row["ProductCode"]. " - Aantal: " . $row["Aantal"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    ?>

    <h2>Bestelling bijwerken:</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        ID van de bestelling: <input type="number" name="id"><br>
        Nieuw aantal: <input type="number" name="aantal"><br>
        <input type="submit" name="update" value="Bijwerken">
    </form>

    <h2>Bestelling verwijderen:</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        ID van de bestelling: <input type="number" name="id"><br>
        <input type="submit" name="delete" value="Verwijderen">
    </form>
</body>
</html>

<?php
// Verbinding met de database sluiten
$conn->close();
?>
