<?php
include_once "configp.php";

function connectDb(){
    $servername = SERVERNAME;
    $username = USERNAME;
    $password = PASSWORD;
    $dbname = DATABASE;

    // Maak verbinding met de database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Controleer de verbinding
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Selecteer de data uit de opgegeven tabel
function getData($table){
    // Connect database
    $conn = connectDb();
 
    // Select data uit de opgegeven tabel
    $sql = "SELECT * FROM $table";
    $result = $conn->query($sql);
 
    // Controleer of de query is gelukt
    if ($result === false) {
        die("Error fetching data: " . $conn->error);
    }
 
    // Haal de resultaten op
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
 
    // Sluit de verbinding
    $conn->close();
 
    return $data;
}

// Haal de bestelling op aan de hand van de productcode
function getBestelling($bestelcode){
    // Connect database
    $conn = connectDb();
 
    // Selecteer data uit de tabel aan de hand van de productcode
    $sql = "SELECT * FROM " . CRUD_TABLE . " WHERE productcode = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $bestelcode);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
 
    // Sluit de verbinding
    $stmt->close();
    $conn->close();
 
    return $result;
}

// Toon een overzicht van de bestellingen
function overzichtBestellingen(){
    // Haal alle bestellingen op
    $result = getData(CRUD_TABLE);
   
    // Print de tabel
    printTabel($result);
}

// Print een HTML-tabel met de gegeven data
function printTabel($data){
    // Controleer of de data leeg is
    if(empty($data)) {
        echo "Geen data beschikbaar";
        return;
    }

    // Print de header van de tabel
    $headers = array_keys($data[0]);
    echo "<table>";
    echo "<tr>";
    foreach($headers as $header){
        echo "<th>" . $header . "</th>";
    }
    echo "</tr>";

    // Print de rijen van de tabel
    foreach ($data as $row) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . $cell . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

// Toon een CRUD-overzicht van de bestellingen
function crudBestelling(){
    // Menu-item insert
    $txt = "
    <h1>CRUD Bestellingen</h1>
    <nav>
        <a href='insert_producten.php'>Toevoegen nieuwe bestelling</a>
    </nav><br>";
    echo $txt;

    // Haal alle bestellingen op
    $result = getData(CRUD_TABLE);

    // Print de tabel
    printCrudBestelling($result);
}

// Print een CRUD-tabel van de bestellingen
function printCrudBestelling($result){
    // Controleer of er data is
    if(empty($result)) {
        echo "Geen data beschikbaar";
        return;
    }

    // Print de tabel
    echo "<table>";
    // Print de header van de tabel
    $headers = array_keys($result[0]);
    echo "<tr>";
    foreach($headers as $header){
        echo "<th>" . $header . "</th>";
    }
    echo "<th colspan=2>Actie</th>";
    echo "</tr>";

    // Print de rijen van de tabel
    foreach ($result as $row) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . $cell . "</td>";
        }

        // Wijzig knopje
        echo "<td>
            <form method='post' action='update_product.php?productcode={$row['productcode']}' >      
                <button>Wzg</button>    
            </form></td>";

        // Verwijder knopje
        echo "<td>
            <form method='post' action='delete_producten.php?productcode={$row['productcode']}' >      
                <button>Verwijder</button>  
            </form></td>";

        echo "</tr>";
    }
    echo "</table>";
}

// Werk een bestelling bij
function updateBestelling($productcode, $naam, $merk, $prijs){
    // Maak database connectie
    $conn = connectDb();
 
    // Maak een query
    $sql = "UPDATE " . CRUD_TABLE . " SET naam = ?, merk = ?, prijs = ? WHERE productcode = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssds", $naam, $merk, $prijs, $productcode);
    $stmt->execute();
 
    // Test of de database actie is gelukt
    $retVal = ($stmt->affected_rows == 1) ? true : false ;
 
    // Sluit de verbinding
    $stmt->close();
    $conn->close();
 
    return $retVal;
}

// Voeg een nieuwe bestelling toe
function insertBestelling($post){
    // Maak database connectie
    $conn = connectDb();
 
    // Controleer op duplicaat productcode
    $existingOrder = getBestelling($_POST['productcode']);
    if($existingOrder) {
        // Als er al een bestelling bestaat met dezelfde productcode, geef een foutmelding
        echo "Fout: Er bestaat al een bestelling met deze productcode.";
        return false;
    }

    // Maak een query
    $sql = "INSERT INTO " . CRUD_TABLE . " (productcode, naam, merk) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $_POST['productcode'], $_POST['naam'], $_POST['merk']);
    $stmt->execute();
 
    // Test of de database actie is gelukt
    $retVal = ($stmt->affected_rows == 1) ? true : false ;
 
    // Sluit de verbinding
    $stmt->close();
    $conn->close();
 
    return $retVal;  
}

// Verwijder een bestelling
function deleteBestelling($bestelcode){
    // Maak database connectie
    $conn = connectDb();
   
    // Maak een query
    $sql = "DELETE FROM " . CRUD_TABLE . " WHERE productcode = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_GET['productcode']);
    $stmt->execute();
 
    // Test of de database actie is gelukt
    $retVal = ($stmt->affected_rows == 1) ? true : false ;
 
    // Sluit de verbinding
    $stmt->close();
    $conn->close();
 
    return $retVal;
}
?>
