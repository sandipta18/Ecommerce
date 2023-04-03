<?php
require_once './vendor/autoload.php';
use UserClass\UserClass;
$objectProducts = new UserClass;
$array = $objectProducts->getContent();
require_once './application/views/home.php';
?>

