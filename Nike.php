<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="products">
    <?php
    include "connectpdo.php";
    
    // Define the product information
    $products = [
        ["name" => "Nike Air Max 90 Scream Green", "price" => "€178", "sizes" => [], "image" => "img nike/1 (11).webp"],
        ["name" => "Nike Dunk High Game Royal", "price" => "€161", "sizes" => [], "image" => "img nike/1 (12).webp"],
        ["name" => "Nike Dunk Low SE Copper Swoosh", "price" => "€129", "sizes" => [], "image" => "img nike/1 (13).webp"],
        ["name" => "Nike Dunk Low Hyper Cobalt", "price" => "€184", "sizes" => [], "image" => "img nike/1 (14).webp"],
        ["name" => "Nike SB Dunk High Green Suede", "price" => "€195", "sizes" => [], "image" => "img nike/1 (15).webp"],
        ["name" => "Nike Dunk Low College Navy", "price" => "€268", "sizes" => [], "image" => "img nike/1 (16).webp"],
        ["name" => "Nike Air Max 90 SE Animal White", "price" => "€268", "sizes" => [], "image" => "img nike/1 (17).webp"],
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
