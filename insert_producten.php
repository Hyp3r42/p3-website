<?php
    // functie: formulier en database insert bestelling
    // auteur: Talha

    echo "<h1>Insert bestelling</h1>";

    // Vereist het bestand met de functies
    require_once('functionsproducten.php');
	 
    // Test of er op de insert-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_ins'])){

        // Test of de insert gelukt is
        if(insertbestelling($_POST) == true){
            echo "<script>alert('Bestelling is toegevoegd')</script>";
        } else {
            echo '<script>alert("Fout bij het toevoegen van de bestelling")</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert bestelling</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">
        <label for="productcode">Productcode:</label>
        <input type="text" name="productcode" required><br>

        <label for="naam">Naam:</label>
        <input type="text" name="naam" required><br>

        <label for="merk">Merk:</label>
        <input type="text" name="merk" required><br>

        <label for="prijs">Prijs:</label>
        <input type="text" name="prijs" required><br>
        <input type="submit" name="btn_ins" value="Insert">
    </form>
    
    <br><br>
    <a href='crud_producten.php'>Home</a>
</body>
</html>
