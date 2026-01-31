<?php
require_once 'classes/Authentication.php';

Auth::logout();
header("Location: login.php");
exit;
