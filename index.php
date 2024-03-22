<!-- index.php -->
<?php
require_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add"])) {
        $name = $_POST["name"];
        $age = $_POST["age"];
        add_record(["name" => $name, "age" => $age]);
    } elseif (isset($_POST["update"])) {
        $index = $_POST["index"];
        $name = $_POST["name"];
        $age = $_POST["age"];
        update_record($index, ["name" => $name, "age" => $age]);
    } elseif (isset($_POST["delete"])) {
        $index = $_POST["index"];
        delete_record($index);
    }
}

$records = get_records();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD in PHP met bestanden</title>
</head>
<body>
    <h1>Records</h1>
    <ul>
        <?php foreach ($records as $index => $record): ?>
            <li>
                <?php echo "Naam: " . $record->name . ", Leeftijd: " . $record->age; ?>
                <form method="post">
                    <input type="hidden" name="index" value="<?php echo $index; ?>">
                    <input type="submit" name="edit" value="Bewerk">
                    <input type="submit" name="delete" value="Verwijder">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Voeg Record Toe</h2>
    <form method="post">
        Naam: <input type="text" name="name"><br>
        Leeftijd: <input type="text" name="age"><br>
        <input type="submit" name="add" value="Toevoegen">
    </form>
</body>
</html>
