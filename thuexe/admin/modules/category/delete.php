<?php
$open = 'category';
require_once __DIR__ . "/../../autoload/autoload.php";

$maloai = intval(getInput('maloai'));
$EditCategory = $db->fetchID("loai", 'maloai', $maloai);
if (empty($EditCategory)) {
    $_SESSION['error'] = "Du lieu khong ton tai ";
    redirectAdmin("category");
}

// Neu ma loai chua xe thi khong xoa xe duoc
$isset_xe = $db->fetchOne('xe', " maloai = $maloai ");
if ($isset_xe == NULL) {
    $num = $db->delete("loai", "maloai", $maloai);
    if ($num > 0) {
        $_SESSION['success'] = "Xóa loại xe thành công";
        redirectAdmin("category");
    } else {
        $_SESSION['error'] = "Loai xe nay chua duoc xoa";
//        redirectAdmin("category");
    }
} else {
    $_SESSION['error'] = 'Mã loại này đang chứa xe nên không thể xóa';
//    redirectAdmin("category");
}


?>
<?php require_once __DIR__ . "/../../layouts/header.php"; ?>
<?php require_once __DIR__ . "/../../../partials/notification.php"; ?>

<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>