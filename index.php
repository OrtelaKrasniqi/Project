<?php
$dsn = "mysql:host=localhost;dbname=shop;charset=utf8";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
    // Vendos mode për error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Lidhja me databazën u bë me sukses!";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
