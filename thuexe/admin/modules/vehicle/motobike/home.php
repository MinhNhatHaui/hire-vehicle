<?php
/**
 * Created by PhpStorm.
 * User: minhnhat
 * Date: 12/06/2018
 * Time: 10:49
 */
?>
<?php
    $open = "motobike";
    require_once __DIR__. "/../../../autoload/autoload.php";

    $id = intval(getInput('id'));

    $EditScooter = $db->fetchID('xe','id',$id);
    if(empty($EditScooter))
    {
        $_SESSION['error'] = "Thong tin xe khong ton tai";
        redirectAdmin('vehicle/motobike');
    }


    $display = $EditScooter['status'] == 0 ? 1 : 0;
    $update = $db->update('xe',array('status' => $display),array('id'=>$id));

    if($update > 0){
        $_SESSION['success'] = "Cap nhat hien thi xe duoc thuc hien";
        redirectAdmin('vehicle/motobike');
    }else{
        $_SESSION['error'] = "Du lieu hien thi xe chua duoc cap nhat";
    }
?>
