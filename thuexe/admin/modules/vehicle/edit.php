<?php
$open = 'vehicle';
require_once __DIR__ . "/../../autoload/autoload.php";
$loaixe = $db->fetchAll('loai');
$maxe = intval(getInput('maxe'));
$EditVehicle = $db->fetchIDXe("xe", $maxe);
if (empty($EditVehicle)) {
    $_SESSION['error'] = "Du lieu xe khong ton tai";
    redirectAdmin('vehicle');
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $data = [
        "maloai" => postInput('maloai'),
        "maxe" => postInput('maxe'),
        "tenxe" => postInput('tenxe'),
        "slug" => to_slug(postInput('tenxe')),
        "soluong" => postInput('soluong'),
        "hinhanh" => postInput('hinhanh'),
        "status" => postInput('status'),
        "dong_co" => postInput('dong_co'),
        "cong_suat" => postInput('cong_suat'),
        "ty_so_nen" => postInput('ty_so_nen'),
        "he_thong_kd" => postInput('he_thong_kd'),
        "dung_tich_xang" => postInput('dung_tich_xang'),
    ];

    $error = [];


    if (empty($error)) {

            $maxe_update = $db->update('xe', $data, array("maxe" => $maxe));
            // dua vao ma xe ma ta co the cap nhat duoc toan bo du lieu
            if ($maxe_update > 0) {
                $_SESSION['success'] = "Cap nhat thanh cong";
                redirectAdmin("vehicle");
            } else {
                $_SESSION['error'] = "Du lieu khong duoc thay doi";
                redirectAdmin("vehicle");
            }

    }


}
?>
<?php require_once __DIR__ . "/../../layouts/header.php"; ?>

    <div class="content-wrapper">
    <div class="container-fluid">
        <h3>Quan ly thong tin cac xe</h3>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Danh sach cac xe</a>
            </li>
            <li class="breadcrumb-item active">
                Them moi xe
            </li>
        </ol>
        <div class="clearfix"></div>
        <?php require_once __DIR__ . "/../../../partials/notification.php" ?>

    </div>
    <div class=" container-fluid">
        <div>
            <!--                action ko de gi se duoc xu ly tren trang dau-->
            <form action="" method="post">
                <form>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Loai xe</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="maloai" id="">
                                <?php foreach ($loaixe as $item): ?>
                                    <option value="<?php echo $item['maloai'] ?>"
                                        <?php echo $EditVehicle['maloai'] == $item['maloai'] ? "selected = 'selected'" : '' ?>>
                                        <?php echo $item['tenloaixe'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <?php if (isset($error['maloai'])): ?>
                                <p class="text-danger"> <?php echo $error['maloai'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Ma xe</label>
                        <div class="col-sm-4">
                            <input type="text" required class="form-control" id="inputEmail3" name="maxe" value="<?php echo $EditVehicle['maxe'] ?>">
                            <?php if (isset($error['maxe'])): ?>
                                <p class="text-danger"> <?php echo $error['maxe'] ?> </p>
                            <?php endif ?>
                        </div>
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Ten xe</label>
                        <div class="col-sm-4">
                            <input type="text" required class="form-control" id="inputEmail3" name="tenxe" value="<?php echo $EditVehicle['tenxe'] ; ?>">
                            <?php if (isset($error['tenxe'])): ?>
                                <p class="text-danger"> <?php echo $error['tenxe'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Hinh anh</label>
                        <div class="col-sm-3">
                            <input type="file" id="inputEmail3" name="hinhanh">
                            <?php if (isset($error['hinhanh'])): ?>
                                <p class="text-danger"> <?php echo $error['hinhanh'] ?> </p>
                            <?php endif ?>
                            <img src="<?php echo uploads()?>xe/<?php echo $EditVehicle['hinhanh'] ?>" width="120px" height="120px" alt="">
                        </div>

                    </div>
                    <div class="form-group row">

                        <label for="inputEmail3" class="col-sm-2 col-form-label">So luong</label>
                        <div class="col-sm-3">
                            <input type="number" required class="form-control" id="inputEmail3" name="soluong"
                                   value="<?php echo $EditVehicle['soluong'] ?>">
                            <?php if (isset($error['soluong'])): ?>
                                <p class="text-danger"> <?php echo $error['soluong'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Trang thai</label>
                        <div class="col-sm-3">
                            <input type="text" required class="form-control" id="inputEmail3" value="<?php echo $EditVehicle['status']; ?>" name="status">
                            <?php if (isset($error['status'])): ?>
                                <p class="text-danger"> <?php echo $error['status'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Dong co</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php echo $EditVehicle['dong_co']; ?>" name="dong_co">
                            <?php if (isset($error['dong_co'])): ?>
                                <p class="text-danger"> <?php echo $error['dong_co'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Cong suat</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php echo $EditVehicle['cong_suat']; ?>"  name="cong_suat">
                            <?php if (isset($error['cong_suat'])): ?>
                                <p class="text-danger"> <?php echo $error['cong_suat'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Ty so nen</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php echo $EditVehicle['ty_so_nen']; ?>" name="ty_so_nen">
                            <?php if (isset($error['ty_so_nen'])): ?>
                                <p class="text-danger"> <?php echo $error['ty_so_nen'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">He thong khoi dong</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php echo $EditVehicle['he_thong_kd']; ?>" name="he_thong_kd">
                            <?php if (isset($error['he_thong_kd'])): ?>
                                <p class="text-danger"> <?php echo $error['he_thong_kd'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Dung tich xang</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php echo $EditVehicle['dung_tich_xang']; ?>" name="dung_tich_xang">
                            <?php if (isset($error['dung_tich_xang'])): ?>
                                <p class="text-danger"> <?php echo $error['dung_tich_xang'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary">Luu lai</button>
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