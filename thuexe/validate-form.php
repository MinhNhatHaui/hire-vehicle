<?php require_once __DIR__ . "/autoload/autoload.php";
/**
 * Created by PhpStorm.
 * User: minhnhat
 * Date: 21/05/2018
 * Time: 22:44
 */
    $maxe = intval(getInput('maxe'));
    $getXe = $db->fetchID('xe','maxe',$maxe);
//    var_dump($getXe);
    if(isset($_SESSION['cart'][$maxe]))
    {
        $_SESSION['cart'][$maxe]['soluong'] +=1;
    }
    else{
        $_SESSION['cart'][$maxe]['name'] = $getXe['tenxe'];
        $_SESSION['cart'][$maxe]['gia']  = $getXe['gia'];
        $_SESSION['cart'][$maxe]['hinhanh']  = $getXe['hinhanh'];
        $_SESSION['cart'][$maxe]['soluong']  = 1;

    }
//    var_dump($_SESSION['cart'][$maxe]);
    echo "<script>alert('Them xe thanh cong');
            location.href='vehicle-cart.php';  
          </script>"
?>
