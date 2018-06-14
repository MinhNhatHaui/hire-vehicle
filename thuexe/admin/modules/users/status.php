<?php
/**
 * Created by PhpStorm.
 * User: minhnhat
 * Date: 27/05/2018
 * Time: 10:01
 */
?>
<?php
    $open = 'datxe';
    require_once __DIR__. "/../../autoload/autoload.php";

    $id_xe = intval(getInput('id'));
    $selected = $db->fetchID('users','id',$id_xe);
//    var_dump($selected);

if(empty($selected))
{
    $_SESSION['error'] = "Thong tin dat xe khong ton tai";
    redirectAdmin('users');
}

//Xu ly tinh trang don dat xe
    //Kiem tra
    $checkProcess = $selected['status'] == 0 ? 1 : 0;
//var_dump($checkProcess);
    if( $checkProcess == 1){
        $update = $db->update('users',array('status' => $checkProcess),array('id'=>$id_xe));

    //Update tinh trang dat xe
        if($update > 0){
            $sql = "SELECT id, soluong FROM xe WHERE id = ".$selected['id'];
            $resSql = $db->fetchSql($sql);
            //        var_dump($resSql);
                foreach ($resSql as $item){
                    $soluong = $item['soluong'] - $selected['soluong'];
                    $update_qty = $db->update('xe',array('soluong'=>$soluong),array('id'=>$selected['id']));
                }

                $_SESSION['success'] = "Cap nhat tinh trang dat xe duoc thuc hien";
                redirectAdmin('users');
            }
    }
    else{
            $update = $db->update('users',array('status' => $checkProcess),array('id'=>$id_xe));

    //Update tinh trang dat xe
            if($update > 0){
                $sql = "SELECT id, soluong FROM xe WHERE id = ".$selected['id'];
                $resSql = $db->fetchSql($sql);
                //        var_dump($resSql);
                foreach ($resSql as $item){
                    $soluong = $item['soluong'] + $selected['soluong'];
                    $update_qty = $db->update('xe',array('soluong'=>$soluong),array('id'=>$selected['id']));
                }
        }



        $_SESSION['success'] = "Cap nhat tinh trang dat xe duoc thuc hien";
        redirectAdmin('users');

    }
    /*else{
        $_SESSION['error'] = "Cap nhat tinh trang dat xe chua duoc thuc hien";
    }*/
?>


