<?php require_once __DIR__ . "/autoload/autoload.php";
/**
 * Created by PhpStorm.
 * User: minhnhat
 * Date: 21/05/2018
 * Time: 22:44
 */
    if (isset($_SESSION['tem_maxe']))
    {
        $maxe = intval($_SESSION['temgit _maxe']);
        $getXe = $db->fetchID('xe','maxe',$maxe);

        $ngaydat = new DateTime(date('Y-m-d h:i A',strtotime($_SESSION['tem_ngaydat'])));
        $ngaytra = new DateTime(date('Y-m-d h:i A',strtotime($_SESSION['tem_ngaytra'])));

    }

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
        $_SESSION['cart'][$maxe]['ngaydat'] = $ngaydat;
        $_SESSION['cart'][$maxe]['ngaytra'] = $ngaytra;
    }
//    var_dump($_SESSION['cart']);
    echo "<script>
            alert('Them xe thanh cong');
            location.href='vehicle-cart.php';  
          </script>";

?>
