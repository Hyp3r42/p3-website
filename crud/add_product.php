<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="wproductcodeth=device-wproductcodeth, initial-scale=1.0">
  <title>Product toevoegen</title>
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Include custom CSS -->

</head>

<body>

<section class="container">
  <div class="col-md-12 mt-4">
  <div class="card">
  <!-- Card header with title and back button -->
  <div class="card-header d-flex justify-content-between">
    <h3>Voeg een sneaker toe</h3>
    <a href="index.php" class="btn btn-danger">Terug</a>
  </div>
  <div class="card-body">
  <!-- Form to add a new product -->
  <div class="mb-3">
  <form action="CRUD_product.php" method="POST">
    <!-- Input field for product name -->
    <label for="name">Naam Schoen</label>
    <input type="text" productcode="name" name="name" class="form-control">
</div>

<!-- Radio buttons for availability -->
<div class="mb-3">
    <label for="available">Ja</label>
    <input type="radio" productcode="available" name="available" value="Ja">
    <label for="available">Nee</label>
    <input type="radio" productcode="available" name="available" value="Nee">
</div>

<!-- Input field for stock -->
<div class="mb-3">
    <label for="stock">Voorraad</label>
    <input type="number" productcode="stock" name="stock" class="form-control">
</div>
    <!-- Submit button to add the product -->
    <input type="submit" name="add_product" value="Toevoegen" class="btn btn-primary">
  </form>
   
  </div>
</div>

  </div>
  </section>
</body>
</html>
