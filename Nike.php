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
        ["name" => "Nike Air Max 90 Scream Green", "price" => "€178", "sizes" => ["42", "43", "44", "45", "46"], "image" => "img nike/1 (11).webp"],
        ["name" => "Nike Dunk High Game Royal", "price" => "€161", "sizes" => ["42", "43", "44", "45", "46"], "image" => "img nike/1 (12).webp"],
        ["name" => "Peak sneaker black", "price" => "€129", "sizes" => ["42", "43", "44", "45", "46"], "image" => "img nike/1 (13).webp"],
        ["name" => "Peak sneaker", "price" => "€149,99", "sizes" => ["41", "42", "43", "44", "45", "46", "47"], "image" => "sneaker.jpg"],
        ["name" => "Peak adidas sneaker grey", "price" => "€149,99", "sizes" => ["41", "42", "43", "44", "45", "46", "47"], "image" => "grey.jpg"],
        ["name" => "Peak sneaker green", "price" => "€149,99", "sizes" => ["42", "43", "44", "45", "46"], "image" => "green.jpg"]
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
