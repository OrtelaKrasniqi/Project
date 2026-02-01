<?php

require_once "db.php";
require_once "Authentication.php";

$auth = new Authentication($pdo);

$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$remember = isset($_POST['remember']); 

if ($auth->login($email, $password, $remember)) {
    header("Location: ../Dashboard/index.php");
    exit;
}

header("Location: login.php?error=1");
exit;
