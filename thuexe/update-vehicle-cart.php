<?php
/**
 * Created by PhpStorm.
 * User: minhnhat
 * Date: 28/05/2018
 * Time: 10:00
 */
require_once __DIR__. "/autoload/autoload.php";

$key = intval(getInput("key"));
$qty = intval(getInput("qty"));

$_SESSION['cart'][$key]['soluong'] = $qty;

echo 1;

?>

