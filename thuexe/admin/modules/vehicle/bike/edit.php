<?php
/**
 * Created by PhpStorm.
 * User: minhnhat
 * Date: 12/06/2018
 * Time: 10:48
 */
?>
<?php
$open = 'bike';
require_once __DIR__ . "/../../../autoload/autoload.php";
$id = intval(getInput('id'));
//var_dump($maxe);
$EditVehicle = $db->fetchID("xe",'id', $id);
if (empty($EditVehicle)) {
    $_SESSION['error'] = "Du lieu xe khong ton tai";
    redirectAdmin('vehicle');
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $data = [
        "maxe" => postInput('maxe'),
        "tenxe" => postInput('tenxe'),
        "slug" => to_slug(postInput('tenxe')),
        "soluong" => postInput('soluong'),
        "gia" => postInput('gia'),
        "hinhanh" => postInput('hinhanh'),
        "status" => postInput('status'),
    ];

    $error = [];


    if (empty($error)) {
        if(isset($_FILES['hinhanh']))
        {
            $file_name  = $_FILES['hinhanh']['name'];
            $file_tmp   = $_FILES['hinhanh']['tmp_name'];
            $file_type  = $_FILES['hinhanh']['type'];
            $file_error = $_FILES['hinhanh']['error'];

            if($file_error == 0)
            {
                $part = ROOT . "xe/";
                $data['hinhanh'] = $file_name;
            }
            else{
                $part = ROOT . "xe/";
                $data['hinhanh'] = $EditVehicle['hinhanh'];
            }
        }
        if($data['soluong'] == 0 )
        {
            $data['status'] = 0;
        }
        $maxe_update = $db->update('xe', $data, array("id" => $id));
        // dua vao ma xe ma ta co the cap nhat duoc toan bo du lieu
        if ($maxe_update > 0) {
            move_uploaded_file($file_tmp,$part.$file_name);
            $_SESSION['success'] = "Cap nhat thanh cong";
            redirectAdmin("vehicle/bike");
        } else {
            $_SESSION['error'] = "Du lieu khong duoc thay doi";
            redirectAdmin("vehicle/bike");
        }

    }
    var_dump($data['hinhanh']);

}
?>
<?php require_once __DIR__ . "/../../../layouts/header.php"; ?>

<div class="content-wrapper">
    <div class="container-fluid">
        <h3>Quan ly thong tin cac xe</h3>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="../../../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="../bike/index.php">Danh sach cac xe</a>
            </li>
            <li class="breadcrumb-item active">
                Them moi xe
            </li>
        </ol>
        <div class="clearfix"></div>
        <?php require_once __DIR__ . "/../../../../partials/notification.php" ?>

    </div>
    <div class=" container-fluid">
        <div>
            <!--                action ko de gi se duoc xu ly tren trang dau-->
            <form action="" method="post" enctype="multipart/form-data">
                <form>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Ma xe</label>
                        <div class="col-sm-3">
                            <input type="text" required class="form-control" id="inputEmail3" name="maxe" value="<?php echo $EditVehicle['maxe'] ?>">
                        </div>
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Ten xe</label>
                        <div class="col-sm-3">
                            <input type="text" required class="form-control" id="inputEmail3" name="tenxe" value="<?php echo $EditVehicle['tenxe'] ; ?>">
                            <?php if (isset($error['tenxe'])): ?>
                                <p class="text-danger"> <?php echo $error['tenxe'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Hinh anh</label>
                        <div class="col-sm-3">
                            <input type="file" id="inputEmail3" name="hinhanh" class="mb-2">
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
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Gia</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="inputEmail3"  name="gia"
                                   value="<?php echo $EditVehicle['gia'] ?>">
                            <?php if(isset($error['gia'])): ?>
                                <p class="text-danger"><?php echo $error['gia'] ?></p>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Trang thai</label>
                        <div class="col-sm-3">
                            <select name="status" id="">
                                <option value="1" <?php echo $EditVehicle['status'] == 1 ? "selected" : ""?> >Available</option>
                                <option value="0" <?php echo $EditVehicle['status'] == 0 ? "selected" : ""?> >Unavailable</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-outline-primary">Luu lai</button>
                        </div>
                        <div class="col-sm-2">
                            <a href="index.php" class="btn btn-outline-secondary">Huy</a>
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

    <?php require_once __DIR__ . "/../../../layouts/footer.php"; ?>
