<?php
// Include the database connection file
include("dbconn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="wproductcodeth=device-wproductcodeth, initial-scale=1.0">
  <title>Producten</title>
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

<section class="container">
  <div class="col-md-12 mt-4">
  <!-- Table to display products -->
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <!-- Table headers -->
        <th>Naam</th>
        <th>Merk</th>
        <th>Prijs</th>
        <!-- Link to add a new product -->
        <th class="d-flex justify-content-end"><a href="add_product.php" class="btn btn-success">Schoen toevoegen</a></th>
      </tr>
    </thead>
    <tbody>

    <?php
    try {
    // Select all products from the database
    $query = "SELECT * FROM product";
    $get_products = $db_connection->prepare($query);
    $get_products->execute();

    // Fetch all products
    $products = $get_products->fetchAll();
    
    if($products){
      // Loop through each product
      foreach($products as $product){
    
       ?>

      <tr>
        <!-- Display product name, stock, and availability -->
        <td><?= $product["naam"] ?></td>
        <td><?= $product["merk"] ?></td>
        <td><?= $product["prijs"] ?></td>
        <!-- Buttons to edit and delete the product -->
        <td class="d-flex justify-content-end">
          <a href="edit_product.php?productcode=<?= $product['productcode']?>" class="btn btn-primary me-2">Bewerken</a>
          <form action="CRUD_product.php" method="POST">
             <!-- Button to delete the product -->
             <button value="<?= $product['productcode']?>" name="delete_product" class="btn btn-danger">Verwijderen</button>
          </form>
      </td>
      </tr>


       <?php

      }
    }
  }catch(PDOException $e){
    // Catch any PDO exceptions and display error message
    echo $e->getMessage();
  }


    ?>
    </tbody>
  </table>
  </div>
  </section>
</body>
</html>