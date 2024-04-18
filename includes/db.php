<?php
$DSN = 'mysql:host=localhost;dbname=bincom_test';
$username = 'root';
$password = '';

// - check for connection to database ----
try {
    $conn = new PDO($DSN, $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    // echo "Connected to the database successfully.";
} catch (PDOException $e) {
    // echo "Unable to connect to the database: " . $e->getMessage();
}
