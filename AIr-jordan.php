<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
    <a href="Home page.html"><img src="./img/_5a711cdd-209d-436a-89db-4469bc09ab7f.jpeg" alt="PEAK logo" width="100"></a>
    <nav>
        <ul>
            <li><a href="login.php">Inloggen</a></li>
            <li><a href="">|</a></li>
            <li><a href="">Klantenservice</a></li>
        </ul>
    </nav>
</header>

<form method="get" action="">
    <label for="maxPrice">Max Price:</label>
    <input type="number" id="maxPrice" name="maxPrice" step="0.01">
    <button type="submit">Filter</button>
</form>

<div class="products">
<?php
include "configp.php";

// Define the product information
$products = [
    ["name" => "Air Jordan 1 Low Noble Red", "price" => 250, "sizes" => [], "image" => "img air jordan/1 (19).webp"],
    ["name" => "Air Jordan 1 Mid Blue Mint", "price" => 252, "sizes" => [], "image" => "img air jordan/1 (20).webp"],
    ["name" => "Air Jordan 1 Retro Hight OG True Blue", "price" => 208, "sizes" => [], "image" => "img air jordan/1 (21).webp"],
    ["name" => "Air Jordan 1 Low Reverse Bred", "price" => 126, "sizes" => [], "image" => "img air jordan/1 (22).webp"],
    ["name" => "Air Jordan 1 Retro High Light Smoke Grey", "price" => 250, "sizes" => [], "image" => "img air jordan/1 (23).webp"],
    ["name" => "Air Jordan 1 Retro High OG Yellow Toe", "price" => 220, "sizes" => [], "image" => "img air jordan/1 (24).webp"],
];

// Get the maximum price from the form submission
$maxPrice = isset($_GET['maxPrice']) ? (float)$_GET['maxPrice'] : PHP_INT_MAX;

// Loop through each product and generate HTML if it matches the filter
foreach ($products as $product) {
    if ($product['price'] <= $maxPrice) {
        echo '<div class="product">';
        echo '<a href="crud_producten.php">';
        echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '" height="400px" width="400px">';
        echo '</a>';
        echo '<div class="details">';
        echo '<h2 class="brand">PEAK</h2>';
        echo '<h3 class="name">' . $product['name'] . '</h3>';
        echo '<p class="price">€' . $product['price'] . '</p>';
        echo '</div>'; // Close details
        echo '</div>'; // Close product
    }
}
?>
</div>
</body>
</html>
