<?php

// Database connection parameters
$server = "localhost"; // Server name or IP address where the database is hosted
$username = "root"; // Username for accessing the database
$password = ""; // Password for accessing the database
$db = "webshop"; // Name of the database
define("CRUD_TABLE", "producten");
try {
  // Create a new PDO instance for database connection
  $db_connection = new PDO("mysql:host=$server; dbname=$db", $username, $password);
  // Set PDO error mode to throw exceptions
  $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
 // Catch any PDO exceptions and display error message
 echo "verbinding mislukt" . $e->getMessage();
}

?>  
