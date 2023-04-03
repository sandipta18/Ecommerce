<?php

session_start();
require_once './vendor/autoload.php';
use UserClass\UserClass;
$objectUser = new UserClass;
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$price = $_SESSION['price'];
$objectUser->sendMail($name,$email,$phone,$price);
$objectUser->makePdf($name,$email,$phone,$price);
session_destroy();
header('Location: /');

?>


