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
                <li><a href=""> Klantenservice</a></li>
            </ul>
        </nav>
    </header>
    <div class="products">
    <?php
    // Define the product information
    $products = [
        ["name" => "Peak adidas sneaker white", "price" => "€129,99", "sizes" => ["42", "43", "44", "45", "46"], "image" => "_f6d0ac54-7c9e-46e8-9c54-e3d226625aa1.jpeg"],
        ["name" => "Peak phantom", "price" => "€199,99", "sizes" => ["42", "43", "44", "45", "46"], "image" => "img/_4db56e6b-01b3-41d1-bfc7-5f9b3fa660fe.jpeg"],
        ["name" => "Peak sneaker black", "price" => "€49,99", "sizes" => ["42", "43", "44", "45", "46"], "image" => "img/_f4fe6d71-954c-4a5b-b887-42768475cf83.jpeg"],
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
