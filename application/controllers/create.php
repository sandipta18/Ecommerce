<?php
require_once './vendor/autoload.php';
use UserClass\UserClass;
$objectUser = new UserClass;
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$signUp = $objectUser->createAccount($name,$email,$password);
if($signUp) {
  session_start();
  header('Location:info');
}
else {
  $GLOBALS['error'] = "Account already Exists";
  require_once './application/views/signup.php';
}
?>

