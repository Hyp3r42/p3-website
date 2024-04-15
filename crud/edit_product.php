<?php 
include("dbconn.php");

// Als het formulier voor het toevoegen van een nieuw product is ingediend
if(isset($_POST["add_product"])){

 $name = $_POST["naam"];
 $merk = $_POST["merk"];
 $prijs = $_POST["prijs"];

 try {
  // Voorbereid SQL-query om een nieuw product toe te voegen
  $query = "INSERT INTO product (naam, merk, prijs) VALUES (:naam, :merk, :prijs)";
  $query_run = $db_connection->prepare($query);

  // Associatieve array van productgegevens
  $webshop = [
    ':naam' => $name,
    ':merk' => $merk,
    ':prijs' => $prijs
  ];

  // Uitvoeren van de query
  $query_execute = $query_run ->execute($webshop);

  // Controleren op succesvolle uitvoering en doorsturen naar de startpagina
  if($query_execute){
    echo "Het is toegevoegd!";
    header("Location: index.php");
    exit(0);
  } else {
    echo " Het is niet gelukt";
    header("Location: index.php");
    exit(1);
  }


 }catch(PDOException $e){
   echo $e->getMessage();
 }

}

// Als het formulier voor het bewerken van een product is ingediend
if(isset($_POST["edit_product"])){
  
  $product_productcode = $_POST["product_productcode"];
  $name = $_POST["name"];
  $merk = $_POST["merk"];
  $prijs = $_POST["prijs"];
 
  try {
   // Voorbereid SQL-query om een product bij te werken
   $query = "UPDATE product SET naam=:naam, merk=:merk, prijs=:prijs WHERE productcode=:product_productcode";
   $query_run = $db_connection->prepare($query);
 
   // Associatieve array van bijgewerkte productgegevens
   $product = [
     ':product_productcode' => $product_productcode,
     ':naam' => $name,
     ':merk' => $merk,
     ':prijs' => $prijs
   ];
 
   // Uitvoeren van de query
   $query_execute = $query_run ->execute($product);
 
   // Controleren op succesvolle uitvoering en doorsturen naar de startpagina
   if($query_execute){
     echo "Het is bewerkt!";
     header("Location: index.php");
     exit(0);
   } else {
     echo " Het is niet gelukt";
     header("Location: index.php");
     exit(1);
   }
 
 
  }catch(PDOException $e){
    echo $e->getMessage();
  }
 
 }


 // Als het formulier voor het verwijderen van een product is ingediend
 if(isset($_POST["delete_product"])){
  
  $product_productcode = $_POST["delete_product"];

 
  try {
   // Voorbereid SQL-query om een product te verwijderen
   $query = "DELETE FROM product WHERE productcode=:product_productcode";
   $query_run = $db_connection->prepare($query);
 
   // Associatieve array met het product-productcode om te verwijderen
   $product = [
     ':product_productcode' => $product_productcode,
   
   ];
 
   // Uitvoeren van de query
   $query_execute = $query_run ->execute($product);
 
   // Controleren op succesvolle uitvoering en doorsturen naar de startpagina
   if($query_execute){
     echo "Het is bewerkt!";
     header("Location: index.php");
     exit(0);
   } else {
     echo " Het is niet gelukt";
     header("Location: index.php");
     exit(1);
   }
 
 
  }catch(PDOException $e){
    echo $e->getMessage();
  }
 
 }
?>
