<?php
header('Location:connection.php');
session_start();

// destroy session and cookies
$_SESSION = array();
session_destroy();

setcookie('nickname', '');
setcookie('password', '');
