<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if ($username === "admin@hotmail.com" && $password === "12345") {
    $_SESSION['user'] = $username;

    header("Location: ../Dashboard/index.php");
} else {
    echo "Login i pasakte!";
}
