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
        ["name" => "Air Jordan 1 Low Noble Red", "price" => "€250", "sizes" => [], "image" => "img air jordan/1 (19).webp"],
        ["name" => "Air Jordan 1 Mid Blue Mint", "price" => "€252", "sizes" => [], "image" => "img air jordan/1 (20).webp"],
        ["name" => "Air Jordan 1 Retro Hight OG True Blue", "price" => "€208", "sizes" => [], "image" => "img air jordan/1 (21).webp"],
        ["name" => "Air Jordan 1 Low Reverse Bred", "price" => "€126", "sizes" => [], "image" => "img air jordan/1 (22).webp"],
        ["name" => "Air Jordan 1 Retro High Light Smoke Grey", "price" => "€250", "sizes" => [], "image" => "img air jordan/1 (23).webp"],
        ["name" => "Air Jordan 1 Retro High OG Yellow Toe", "price" => "€220", "sizes" => [], "image" => "img air jordan/1 (24).webp"],
        ["name" => "Air Jordan 1 Mid Mulit Patent", "price" => "€349", "sizes" => [], "image" => "img air jordan/1 (25).webp"],
        ["name" => "Air Jordan 1 Retro Hight Royal Toe", "price" => "€297", "sizes" => [], "image" => "img air jordan/1 (26).webp"],
        ["name" => "Air Jordan 7 Retro Greater China", "price" => "€204", "sizes" => [], "image" => "img air jordan/1 (27).webp"],
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
