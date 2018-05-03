<?php
$open = 'category';
require_once __DIR__. "/../../autoload/autoload.php";

$maloai = intval(getInput('maloai'));
$EditCategory =  $db->fetchIDLoaiXe("loai",$maloai);
//    var_dump($maloai);
if(empty($EditCategory))
{
    $_SESSION['error'] = "Du lieu khong ton tai ";
    redirectAdmin("category");
}

$num = $db->deleteLoaiXe("loai", $maloai);
if($num > 0){
    $_SESSION['success'] = "Xoa thanh cong loai xe ";
    redirectAdmin("category");
}else{
    $_SESSION['error'] = "Loai xe nay chua duoc xoa";
    redirectAdmin("category");

}

?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>