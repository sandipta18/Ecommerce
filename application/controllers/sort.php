<?php
require_once './vendor/autoload.php';
use UserClass\UserClass;
$objectUser = new UserClass;
$array = $objectUser->sortItems($_POST['Products']);
require_once './application/views/home.php';
?>

