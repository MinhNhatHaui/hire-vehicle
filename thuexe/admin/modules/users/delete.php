<?php
/**
 * Created by PhpStorm.
 * User: minhnhat
 * Date: 27/05/2018
 * Time: 10:16
 */
?>
<?php
    require_once __DIR__. "/../../autoload/autoload.php";

    $id_xe = intval(getInput('id'));
    $selected = $db->fetchID('users','id',$id_xe);

    if(empty($selected)){
        $_SESSION['error'] = 'Thong tin khach hang khong ton tai';
        redirectAdmin('users');
    }

    $checkDelete = $db->delete('users','id',$id_xe);
    if($checkDelete > 0){
        $_SESSION['success'] = 'Thong tin don hang da bi huy bo';
        redirectAdmin('users');
    }
    /*else{
        $_SESSION['error'] = 'Thong tin don hang dang ton tai trong CSDL';
        redirectAdmin('users');
    }*/


?>
