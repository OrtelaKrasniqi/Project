<?php

require_once "db.php";
require_once "classes/Authentication.php";

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$auth = new Authentication($pdo);

if ($auth->login($email, $password)) {
    header("Location: Dashboard/index.php");
    exit;
}

header("Location: login.php?error=1");
exit;

