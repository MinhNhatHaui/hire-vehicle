<?php
$open = 'vehicle';
require_once __DIR__. "/../../autoload/autoload.php";

$maxe = intval(getInput('maxe'));
$EditVehicle =  $db->fetchID("xe",'maxe',$maxe);
if(empty($EditVehicle))
{
    $_SESSION['error'] = "Du lieu khong ton tai ";
    redirectAdmin("vehicle");
}

$num = $db->delete("xe", 'maxe', $maxe);
if($num > 0){
    $_SESSION['success'] = "Xoa thanh cong loai xe ";
    redirectAdmin("vehicle");
}else{
    $_SESSION['error'] = "Loai xe nay chua duoc xoa";
    redirectAdmin("vehicle");

}

?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>