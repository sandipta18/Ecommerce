<?php

require_once './vendor/autoload.php';
use UserClass\UserClass;
$objectUser = new UserClass;
$login = $objectUser->loginUser($_POST['email'],$_POST['password']);
if($login) {
  session_start();
  header('Location: info');
} else {
  $GLOBALS['error'] = "Invalid Credentials";
  require_once './application/views/buy.php';
}

?>


