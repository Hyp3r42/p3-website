<!-- functions.php -->
<?php
require_once 'config.php';

function get_records() {
    global $database_file;
    if(file_exists($database_file)) {
        $records = file($database_file, FILE_IGNORE_NEW_LINES);
        return array_map('json_decode', $records);
    } else {
        return [];
    }
}

function add_record($record) {
    global $database_file;
    file_put_contents($database_file, json_encode($record) . PHP_EOL, FILE_APPEND);
}

function update_record($index, $new_record) {
    global $database_file;
    $records = get_records();
    if(isset($records[$index])) {
        $records[$index] = $new_record;
        file_put_contents($database_file, implode(PHP_EOL, array_map('json_encode', $records)));
        return true;
    } else {
        return false;
    }
}

function delete_record($index) {
    global $database_file;
    $records = get_records();
    if(isset($records[$index])) {
        unset($records[$index]);
        file_put_contents($database_file, implode(PHP_EOL, array_map('json_encode', $records)));
        return true;
    } else {
        return false;
    }
}
?>
