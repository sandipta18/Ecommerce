<?php
$url = $_SERVER['REQUEST_URI'];
$url = rtrim($url);
$url = explode("/", $url);
switch ($url[1]) {

  case '':
    require_once 'application/controllers/home.php';
    break;

  case 'sort' :
    require_once 'application/controllers/sort.php';
    break;

  case 'buy' :
    require_once 'application/controllers/buy.php';
    break;

  case 'signup' :
    require_once 'application/controllers/signup.php';
    break;

  case 'checkout' :
    require_once 'application/controllers/validatelogin.php';
    break;

  case 'info' :
    require_once 'application/controllers/info.php';
    break;

  case 'confirm' :
    require_once 'application/controllers/placeorder.php';
    break;

  case 'create' :
    require_once 'application/controllers/create.php';
    break;

  default:
    require_once 'application/controllers/error.php';
}

?>
