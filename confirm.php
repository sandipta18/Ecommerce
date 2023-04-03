<?php

session_start();
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$price = $_SESSION['price'];
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'sandiptasardar99@gmail.com';
$mail->Password = 'lwkbmdihsqvbqple';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('sandiptasardar99@gmail.com');
$mail->addAddress('sandipta.sardar@Innoraft.com');
$mail->isHTML(true);
$mail->Subject = 'Order Confirmation';
$mail->Body = $name . $email . $phone . $price;
$mail->send();
session_destroy();
header('Location: index.php');


?>

