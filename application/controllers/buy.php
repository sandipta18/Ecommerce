<?php

require_once './vendor/autoload.php';
use UserClass\UserClass;
$objectUser = new UserClass;
$price_1 = $objectUser->calculateAmount($_REQUEST['card_one']);
$price_2 = $objectUser->calculateAmount($_REQUEST['card_two']);
$price_3 = $objectUser->calculateAmount($_REQUEST['card_three']);
$price_4 = $objectUser->calculateAmount($_REQUEST['card_four']);
$price_5 = $objectUser->calculateAmount($_REQUEST['card_five']);
$total_price = $price_1 + $price_2 + $price_3 + $price_4 + $price_5;
session_start();
$_SESSION['price'] = $total_price;
require_once './application/views/buy.php';

?>
