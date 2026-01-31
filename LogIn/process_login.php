<?php

require_once '../classes/Authentication.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$auth = new Auth($username, $password);

if ($auth->login()) {
    header("Location: ../Dashboard/index.php");
    exit;
}

header("Location: login.php");
exit;
