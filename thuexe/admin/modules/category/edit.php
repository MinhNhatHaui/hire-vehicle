<?php
$open = 'category';
require_once __DIR__ . "/../../autoload/autoload.php";

$maloai = intval(getInput('maloai'));
$EditCategory = $db->fetchIDLoaiXe("loai", $maloai);
if (empty($EditCategory)) {
    $_SESSION['error'] = "Du lieu khong ton tai ";
    redirectAdmin("category");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data =
        [
            "maloai" => postInput('maloai'),
            "tenloaixe" => postInput('tenloaixe'),
            "slug" => to_slug(postInput("name")),
        ];
    $error = [];

    if (postInput('maloai') == '' && postInput('tenloaixe') == '') {
        $error['maloai'] = " Ma loai khong duoc de trong ";
        $error['tenloaixe'] = "Ten loai xe khong duoc de trong";
    }

    if (empty($error)) {
        if ($EditCategory["maloai"] != $data["maloai"]) {
            $isset = $db->fetchOne("loai", " maloai = '" . $data['maloai'] . "' ");

            if (count($isset) > 0) {
                $_SESSION['error'] = "Ma loai chua duoc thay doi";
            } else {
                $maloai_update = $db->update("loai", $data, array("maloai" => $maloai));
                if ($maloai_update > 0) {
                    $_SESSION['success'] = "Cap nhat thanh cong";
                    redirectAdmin("category");
                } else {
                    $_SESSION['error'] = "Du lieu khong thay doi";
                    redirectAdmin("category");
                }
            }
        } else {
            $maloai_update = $db->update("loai", $data, array("maloai" => $maloai));
            if ($maloai_update > 0) {
                $_SESSION['success'] = "Cap nhat thanh cong";
                redirectAdmin("category");
            } else {
                $_SESSION['error'] = "Du lieu khong thay doi";
                redirectAdmin("category");
            }
        }

    }
}
?>
<?php require_once __DIR__ . "/../../layouts/header.php"; ?>

    <div class="content-wrapper">
    <div class="container-fluid">
        <h3>Them moi danh muc</h3>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Danh muc</a>
            </li>
            <li class="breadcrumb-item active">
                Them moi danh muc
            </li>
        </ol>
        <div class="clearfix"></div>
        <?php require_once __DIR__ . "/../../../partials/notification.php"; ?>

    </div>
    <div class=" container-fluid">
        <div>
            <!--                action ko de gi se duoc xu ly tren trang dau-->
            <form action="" method="post">
                <form>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Ma loai xe</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputEmail3"
                                   value="<?php echo $EditCategory['maloai']; ?>" name="maloai">
                            <?php if (isset($error['maloai'])): ?>
                                <p class="text-danger"> <?php echo $error['maloai'] ?> </p>
                            <?php endif ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Ten loai xe</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputEmail3"
                                   value="<?php echo $EditCategory['tenloaixe']; ?>" name="tenloaixe">
                            <?php if (isset($error['tenloaixe'])): ?>
                                <p class="text-danger"> <?php echo $error['tenloaixe'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary">Cap nhat</button>
                        </div>
                    </div>
                </form>
            </form>
        </div>
    </div>
    <div>
        <!-- Area Chart Example-->
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>