<?php
/**
 * Created by PhpStorm.
 * User: minhnhat
 * Date: 27/05/2018
 * Time: 21:53
 */
 require_once __DIR__. "/autoload/autoload.php";
?>

<?php
    $remove_key = intval(getInput('id'));
    unset($_SESSION['cart'][$remove_key]);
    $_SESSION['success'] = 'Xoa xe thanh cong khoi don dat xe';
    header("location: vehicle-cart.php");

?>
