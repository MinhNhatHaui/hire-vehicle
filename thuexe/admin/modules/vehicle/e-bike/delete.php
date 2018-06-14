<?php
/**
 * Created by PhpStorm.
 * User: minhnhat
 * Date: 12/06/2018
 * Time: 10:48
 */
?>
<?php
$open = 'e-bike';
require_once __DIR__. "/../../../autoload/autoload.php";

$idxe = intval(getInput('id'));
$getBike =  $db->fetchID("xe",'id',$idxe);
if(empty($getBike))
{
    $_SESSION['error'] = "Du lieu khong ton tai ";
    redirectAdmin("vehicle/e-bike");
}

$num = $db->delete("xe", 'id', $idxe);
var_dump($num);
if($num > 0){
    $_SESSION['success'] = "Xoa thanh cong xe ";
    redirectAdmin("vehicle/e-bike");
}
/*else{
    $_SESSION['error'] = "Loai xe nay chua duoc xoa";
    redirectAdmin("vehicle");

}*/

?>
<?php require_once __DIR__. "/../../../layouts/header.php"; ?>

<?php require_once __DIR__. "/../../../layouts/footer.php"; ?>
