<?php
/**
 * Created by PhpStorm.
 * User: minhnhat
 * Date: 12/06/2018
 * Time: 10:49
 */
?>
<?php
    $open = "e-bike";
    require_once __DIR__. "/../../../autoload/autoload.php";

    $maxe = intval(getInput('maxe'));

    $EditScooter = $db->fetchID('xe','maxe',$maxe);
    if(empty($EditScooter))
    {
        $_SESSION['error'] = "Thong tin xe khong ton tai";
        redirectAdmin('vehicle/e-bike');
    }


    $display = $EditScooter['status'] == 0 ? 1 : 0;
    $update = $db->update('xe',array('status' => $display),array('maxe'=>$maxe));

    if($update > 0){
        $_SESSION['success'] = "Cap nhat hien thi xe duoc thuc hien";
        redirectAdmin('vehicle/e-bike');
    }else{
        $_SESSION['error'] = "Du lieu hien thi xe chua duoc cap nhat";
    }
?>
