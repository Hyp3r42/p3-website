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
include "connectpdo.php";


// Define the product information
$products = [
    ["name" => "Yeezy Boost 350 V2 Linen", "price" => "€149,99", "sizes" => ["42", "43", "44", "45", "46"], "image" => "img yzy/1.webp"],
    ["name" => "Yeezy Slide Resin", "price" => "€149,99", "sizes" => ["42", "43", "44", "45", "46"], "image" => "img yzy/1 (1).webp"],
    ["name" => "Yeezy Boost 350 V2 Dazzling Blue", "price" => "€149,99", "sizes" => ["42", "43", "44", "45", "46"], "image" => "img yzy/1 (2).webp"],
    ["name" => "Yeezy Boost 700 V1 Wave Runner", "price" => "€149,99", "sizes" => ["41", "42", "43", "44", "45", "46", "47"], "image" => "img yzy/1 (3).webp"],
    ["name" => "Yeezy Foam RNNR Stone Stage", "price" => "€257", "sizes" => ["41", "42", "43", "44", "45", "46", "47"], "image" => "img yzy/1 (4).webp"],
    ["name" => "Yeezy Boost 350 V2 Yeezreel", "price" => "€260", "sizes" => ["42", "43", "44", "45", "46"], "image" => "img yzy/1 (5).webp"],
    ["name" => "Yeezy Boost 700 V1 Faded Azure", "price" => "€349", "sizes" => ["41", "42", "43", "44", "45", "46", "47"], "image" => "img yzy/1 (6).webp"],
    ["name" => "Nike Air Force 1 Low Grey", "price" => "€149,99", "sizes" => ["42", "43", "44", "45", "46"], "image" => "img/1 (7).webp"],
    ["name" => "Air Jordan 2 retro Low ", "price" => "€149,99", "sizes" => ["42", "43", "44", "45", "46"], "image" => "img/1 (8).webp"],
    ["name" => "Nike Dunk Low Retro White Black", "price" => "€149,99", "sizes" => ["41", "42", "43", "44", "45", "46", "47"], "image" => "img/1 (9).webp"],
    ["name" => "Peak adidas sneaker grey", "price" => "€149,99", "sizes" => ["41", "42", "43", "44", "45", "46", "47"], "image" => "img/1 (10).webp"],
    ["name" => "Nike Air Max 90 Scream Green", "price" => "€149,99", "sizes" => ["42", "43", "44", "45", "46"], "image" => "img/1 (11).webp"],
    ["name" => "Nike Air FOrce 1 Low", "price" => "€149,99", "sizes" => ["41", "42", "43", "44", "45", "46", "47"], "image" => "img/1 (12).webp"],
    ["name" => "Nike Air FOrce 1 Low", "price" => "€149,99", "sizes" => ["41", "42", "43", "44", "45", "46", "47"], "image" => "img/1 (13).webp"],
];

// Loop through each product and generate HTML
foreach ($products as $product) {
    echo '<div class="product">';
    echo '<a href=""><img src="' . $product['image'] . '" alt="' . $product['name'] . '" height="400px" width="400px"></a>';
    echo '<h2 class="brand">PEAK</h2>';
    echo '<h3 class="name">' . $product['name'] . '</h3>';
    echo '<p class="price">' . $product['price'] . '</p>';
    echo '<p class="sizes">' . implode(" ", $product['sizes']) . '</p>';
    echo '</div>';
}
?>
</div>
</body>
</html>
