<?php
session_start();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username === "admin@hotmail.com" && $password === "Ortela123!") {
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    header("Location: ../Dashboard/index.php");
    exit;
}

header("Location: login.php");
exit;
