<?php
require_once 'Classes/UserClass.php';
$objectUser = new UserClass;
$array = $objectUser->sortItems($_POST['Products']);
require_once 'index.php';

?>
