<?php
session_start();
// unset($_SESSION['is_login']);
$_SESSION['is_login']= false;
$_SESSION['username']= null;

header("Location: ../../pages/samples/login-2.php");