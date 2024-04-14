<?php
    // functie: update bestelling
    // auteur: Talha

    require_once('functionsproducten.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST['btn_wzg'])){

        // test of update gelukt is
        if(updatebestelling($_POST) == true){
            echo "<script>alert('bestelling is gewijzigd')</script>";
        } else {
            echo '<script>alert("Fout bij het wijzigen van de bestelling. Controleer uw invoer en probeer het opnieuw.")</script>';
        }
    }

    // Test of bestelcode is meegegeven in de URL
    if(isset($_GET['productcode'])){  
        // Haal alle info van de betreffende bestelcode $_GET['bestelcode']
        $bestelcode = $_GET['productcode'];
        $row = getbestelling($bestelcode);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Wijzig bestelling</title>
  <link rel="stylesheet" href="sstyle.css">
</head>
<body>
  <h2>Wijzig bestelling</h2>
  <form method="post">
    
    <label for="productcode">productcode:</label>
    <input type="text" name="productcode" value="<?php echo $row['productcode']; ?>" required><br>

    <label for="naam">naam:</label>
    <input type="text" name="naam" value="<?php echo $row['naam']; ?>" required><br>

    <label for="merk">merk:</label>
    <input type="text" name="merk" value="<?php echo $row['merk']; ?>" required><br>

    <label for="prijs">prijs:</label>
    <input type="text" name="prijs" value="<?php echo $row['prijs']; ?>" required><br>
        
    <label for="foto">foto:</label>
    <input type="text" name="foto" value="<?php echo $row['foto/img nike']; ?>" required><br>

    <input type="submit" name="btn_wzg" value="Wijzig">
  </form>
  <br><br>
  <a href='crud_producten.php'>Home</a>
</body>
</html>

<?php
    } else {
        echo "Geen bestelcode opgegeven<br>";
    }
?>
