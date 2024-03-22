<?php
require_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add_klant"])) {
        $naam = $_POST["naam"];
        $email = $_POST["email"];
        $sql = "INSERT INTO klant (naam, email) VALUES ('$naam', '$email')";
        $result = $conn->query($sql);
    } elseif (isset($_POST["add_bestelling"])) {
        $klant_id = $_POST["klant_id"];
        $product_id = $_POST["product_id"];
        $hoeveelheid = $_POST["hoeveelheid"];
        add_bestelling($klant_id, $product_id, $hoeveelheid);
    }
}

$klanten = get_klanten();
$producten = get_producten();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Webshop in PHP</title>
</head>
<body>
    <h1>Klanten</h1>
    <ul>
        <?php foreach ($klanten as $klant): ?>
            <li><?php echo $klant["naam"]; ?> (<?php echo $klant["email"]; ?>)</li>
        <?php endforeach; ?>
    </ul>

    <h2>Producten</h2>
    <ul>
        <?php foreach ($producten as $product): ?>
            <li><?php echo $product["naam"]; ?> - €<?php echo $product["prijs"]; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Voeg Klant Toe</h2>
    <form method="post">
        Naam: <input type="text" name="naam"><br>
        Email: <input type="text" name="email"><br>
        <input type="submit" name="add_klant" value="Toevoegen">
    </form>

    <h2>Voeg Bestelling Toe</h2>
    <form method="post">
        Klant: <select name="klant_id">
            <?php foreach ($klanten as $klant): ?>
                <option value="<?php echo $klant["id"]; ?>"><?php echo $klant["naam"]; ?></option>
            <?php endforeach; ?>
        </select><br>
        Product: <select name="product_id">
            <?php foreach ($producten as $product): ?>
                <option value="<?php echo $product["id"]; ?>"><?php echo $product["naam"]; ?></option>
            <?php endforeach; ?>
        </select><br>
        Hoeveelheid: <input type="text" name="hoeveelheid"><br>
        <input type="submit" name="add_bestelling" value="Toevoegen">
    </form>
</body>
</html>
