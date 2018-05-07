<?php
    $open = 'admin';
    require_once __DIR__. "/../../autoload/autoload.php";

    $maAdmin = intval(getInput('id'));
    $EditAdmin = $db->fetchID('quantrivien','id', $maAdmin);
    if(empty($EditAdmin))
    {
        $_SESSION['error'] = "Du lieu khong ton tai ";
        redirectAdmin('admin');
    }
    $admin = $db->delete('quantrivien','id',$maAdmin);
    if($admin > 0){
        $_SESSION['success'] = "Xoa thanh cong admin ";
        redirectAdmin('admin');
    }else{
        $_SESSION['error'] = "Admin chua duoc xoa";
        redirectAdmin('admin');
    }
?>
<?php echo require_once __DIR__. "/../../layouts/header.php"?>
<?php echo require_once __DIR__. "/../../layouts/footer.php"?>
