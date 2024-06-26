<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ccstyle.css">
    <title>CRUD Webshop in PHP</title>
</head>
<body>
    <h1>Klanten</h1>
    <ul>
        <?php if (!empty($klanten)): ?>
            <?php foreach ($klanten as $klant): ?>
                <li><?php echo $klant["naam"]; ?> (<?php echo $klant["email"]; ?>) 
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="display:inline;">
                        <input type="hidden" name="klant_id" value="<?php echo $klant["id"]; ?>">
                        <input type="submit" name="update_klant" value="Wijzigen">
                    </form>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="display:inline;">
                        <input type="hidden" name="klant_id" value="<?php echo $klant["id"]; ?>">
                        <input type="submit" name="delete_klant" value="Verwijderen">
                    </form>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Geen klanten gevonden</li>
        <?php endif; ?>
    </ul>

    <h2>Producten</h2>
    <ul>
        <?php if (!empty($producten)): ?>
            <?php foreach ($producten as $product): ?>
                <li><?php echo $product["naam"]; ?> - €<?php echo $product["prijs"]; ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="display:inline;">
                        <input type="hidden" name="product_id" value="<?php echo $product["id"]; ?>">
                        <input type="submit" name="update_product" value="Wijzigen">
                    </form>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="display:inline;">
                        <input type="hidden" name="product_id" value="<?php echo $product["id"]; ?>">
                        <input type="submit" name="delete_product" value="Verwijderen">
                    </form>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Geen producten gevonden</li>
        <?php endif; ?>
    </ul>

    <h2>Voeg Klant Toe</h2>
    <form method="post">
        Naam: <input type="text" name="naam"><br>
        Email: <input type="text" name="email"><br>
        <input type="submit" name="add_klant" value="Toevoegen">
    </form>

    <h2>Voeg Bestelling Toe</h2>
    <form method="post">
        Klant: <select name="klant_id">
            <?php foreach ($klanten as $klant): ?>
                <option value="<?php echo $klant["id"]; ?>"><?php echo $klant["naam"]; ?></option>
            <?php endforeach; ?>
        </select><br>
        Product: <select name="product_id">
            <?php foreach ($producten as $product): ?>
                <option value="<?php echo $product["id"]; ?>"><?php echo $product["naam"]; ?></option>
            <?php endforeach; ?>
        </select><br>
        Hoeveelheid: <input type="text" name="hoeveelheid"><br>
        <input type="submit" name="add_bestelling" value="Toevoegen">
    </form>
</body>
</html>
