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
    ["name" => "Peak adidas sneaker white", "price" => "€129,99", "sizes" => ["42", "43", "44", "45", "46"], "image" => "img/1 (1).webp"],
    ["name" => "Peak phantom", "price" => "€199,99", "sizes" => ["42", "43", "44", "45", "46"], "image" => "img/1 (2).webp"],
    ["name" => "Peak sneaker black", "price" => "€49,99", "sizes" => ["42", "43", "44", "45", "46"], "image" => "img/1 (3).webp"],
    ["name" => "Peak sneaker", "price" => "€149,99", "sizes" => ["41", "42", "43", "44", "45", "46", "47"], "image" => "img/_e4ed7742-392d-4718-a7a1-d0f2f4b2f221-removebg-preview.png"],
    ["name" => "Peak adidas sneaker grey", "price" => "€149,99", "sizes" => ["41", "42", "43", "44", "45", "46", "47"], "image" => "img/_46c37e2e-c554-4c25-be68-b2ce350134ab-removebg-preview.png"],
    ["name" => "Peak sneaker green", "price" => "€149,99", "sizes" => ["42", "43", "44", "45", "46"], "image" => "img/1.webp"]
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
