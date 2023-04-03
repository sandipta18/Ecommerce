<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'Classes/UserClass.php';
$objectUser = new UserClass;
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$signUp = $objectUser->createAccount($name,$email,$password);
if($signUp) {
  // $GLOBALS['message'] = "Signed Up Succesfully";
  $_COOKIE['message'] = "Signed up Succesfully";
  // require_once 'buy.php';
  header('Location: buy.php');
}
else {
  $GLOBALS['error'] = "Account already Exists";
  require_once 'signup.php';
}
?>
