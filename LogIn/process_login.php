<?php

require_once "db.php";
require_once "Authentication.php";

$auth = new Authentication($pdo);

$email    = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($auth->login($email, $password)) {
    header("Location: ../Dashboard/index.php");
    exit;
}

header("Location: login.php?error=1");
exit;

