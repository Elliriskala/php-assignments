<?php
require __DIR__ . '/../../dbconfig.php';

if (isset($host) && isset($dbname) && isset($username) && isset($password)) {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

    try {
        $DBH = new PDO($dsn, $username, $password);
        $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Could not connect to database.";
        file_put_contents(__DIR__ . '/../logs/PDOErrors.txt', 'dbConnect.php - ' . $e->getMessage(), FILE_APPEND);
    }

} else {
    die("Database Config Error");
}