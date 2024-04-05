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
<div class="products">
<?php
include "config.php";


// Define the product information
$products = [
    ["name" => "Yeezy Boost 350 V2 Linen", "price" => "€333", "sizes" => [], "image" => "img yzy/1.webp"],
    ["name" => "Yeezy Slide Resin", "price" => "€181", "sizes" => [], "image" => "img yzy/1 (1).webp"],
    ["name" => "Yeezy Boost 350 V2 Dazzling Blue", "price" => "€323", "sizes" => [], "image" => "img yzy/1 (2).webp"],
    ["name" => "Yeezy Boost 700 V1 Wave Runner", "price" => "€497", "sizes" => [], "image" => "img yzy/1 (3).webp"],
    ["name" => "Yeezy Foam RNNR Stone Stage", "price" => "€257", "sizes" => [], "image" => "img yzy/1 (4).webp"],
    ["name" => "Yeezy Boost 350 V2 Yeezreel", "price" => "€260", "sizes" => [], "image" => "img yzy/1 (5).webp"],
    ["name" => "Yeezy Boost 700 V1 Faded Azure", "price" => "€349", "sizes" => [], "image" => "img yzy/1 (6).webp"],
    ["name" => "Yeezy Boost 350 V2 Core Black Red", "price" => "€250", "sizes" => [], "image" => "img yzy/1 (7).webp"],
    ["name" => "Yeezy 450 Dark Slate", "price" => "€297", "sizes" => [], "image" => "img yzy/1 (29).webp"],
];

  // Loop through each product and generate HTML
  foreach ($products as $product) {
    echo '<div class="product">';
    echo '<a href="crud2.php">';
    echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '" height="400px" width="400px">';
    echo '</a>';
    echo '<div class="details">';
    echo '<h2 class="brand">PEAK</h2>';
    echo '<h3 class="name">' . $product['name'] . '</h3>';
    echo '<p class="price">' . $product['price'] . '</p>';
    echo '</div>'; // Close details
    echo '</div>'; // Close product
}
?>
</div>
</body>
</html>
