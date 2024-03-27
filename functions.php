<?php
require_once 'config.php';

function get_klanten() {
    global $conn;
    $sql = "SELECT * FROM klant";
    $result = $conn->query($sql);
    $klanten = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $klanten[] = $row;
        }
    }
    return $klanten;
}

function get_producten() {
    global $conn;
    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);
    $producten = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $producten[] = $row;
        }
    }
    return $producten;
}

function add_bestelling($klant_id, $product_id, $hoeveelheid) {
    global $conn;
    $sql = "INSERT INTO bestelling (klant_id, product_id, hoeveelheid) VALUES ('$klant_id', '$product_id', '$hoeveelheid')";
    $result = $conn->query($sql);
    return $result;
}
?>
