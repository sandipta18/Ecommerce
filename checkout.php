<?php

require_once 'Classes/UserClass.php';
$objectUser = new UserClass;
$login = $objectUser->loginUser($_POST['email'],$_POST['password']);
if($login) {
  session_start();
  header('Location: info.php');
} else {
  $GLOBALS['error'] = "Invalid Credentials";
  require_once 'buy.php';
}

?>
