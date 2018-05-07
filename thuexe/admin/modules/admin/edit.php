<?php
$open = 'admin';
require_once __DIR__. "/../../autoload/autoload.php";

$listAdmin = $db->fetchAll('quantrivien');
$idAdmin = intval(getInput('id'));
$EditAdmin = $db->fetchID('quantrivien','id',$idAdmin);

if(empty($EditAdmin)){
    $_SESSION['error'] = "Du lieu khong ton tai trong bang quan tri vien";
    redirectAdmin('admin');
}
$data = [
    "name" => postInput('name'),
    "password" => postInput('password'),
    "hinhanh" => postInput('hinhanh'),
    "phone" => postInput('phone'),
    "gioitinh" => postInput('gioitinh'),
    "diachi" => postInput('diachi'),
    "ngaysinh" => postInput('ngaysinh'),
    "socmnd" => postInput('socmnd'),
];


if($_SERVER['REQUEST_METHOD'] == "POST")
{

    $error = [];

    if($data['password'] != md5(postInput('re_password')))
    {
        $erro['password'] = "Mat khau khong khop";
    }
    if(isset($data['socmnd'])){
        $checkExist = $db->fetchOne('quantrivien', " socmnd = '".$data['socmnd']."'");
        if($checkExist != NULL ){
            $error['socmnd'] = "Admin co so CMND nay da ton tai hoac ban chua thay doi CMND";
        }
    }



    if(empty($error))
    {
        if(isset($_FILES['hinhanh']))
        {
            $file_name  = $_FILES['hinhanh']['name'];
            $file_tmp   = $_FILES['hinhanh']['tmp_name'];
            $file_type  = $_FILES['hinhanh']['type'];
            $file_error = $_FILES['hinhanh']['error'];

            if($file_error == 0)
            {
                $part = ROOT . "admins/";
                $data['hinhanh'] = $file_name;
            }
        }
        $id_update = $db->update('quantrivien',$data,array("id" => $idAdmin));
        var_dump($id_update);
        if($id_update > 0){
            move_uploaded_file($file_tmp,$part.$file_name);
            $_SESSION['success'] = "Cap nhat admin thanh cong";
            redirectAdmin("admin");
        }else{
            $_SESSION['error'] = "Admin moi chua duoc cap nhat";
        }
    }
}
?>
<?php require_once __DIR__. "/../../layouts/header.php";?>
<div class="content-wrapper">
    <div class="container-fluid">
        <h3>Them moi admin</h3>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="../../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Quan ly Admins</a>
            </li>
            <li class="breadcrumb-item active">
                Them moi Admin
            </li>
        </ol>
        <div class="clearfix"></div>
        <?php require_once __DIR__. "/../../../partials/notification.php" ?>

    </div>
    <div class="container-fluid">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Ho va ten</label>
                <div class="col-sm-3">
                    <input id ="" type="text" required class="form-control" value="<?php echo $EditAdmin['name'] ?>" name="name">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Mat khau</label>
                <div class="col-sm-3">
                    <input type="password" required class="form-control" value="" name="password">
                    <?php if (isset($error['password'])) : ?>
                    <p class="text-danger"><?php echo $error['password'] ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Xac nhan lai</label>
                <div class="col-sm-3">
                    <input type="password" required class="form-control" value="" name="re_password">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Hinh anh</label>
                <div class="col-sm-3">
                    <img src="<?php echo uploads()?>admins/<?php echo $EditAdmin['hinhanh']?>" height="120px" width="120px" alt="">
                    <input type="file" class="form-control mt-1" name="hinhanh">
                    <?php if(isset($error['hinhanh'])): ?>
                        <p class="text-danger"> <?php echo $error['hinhanh'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">So dien thoai</label>
                <div class="col-sm-3">
                    <input type="phone" required class="form-control" value="<?php echo $EditAdmin['phone'] ?>" name="phone">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Dia chi</label>
                <div class="col-sm-3">
                    <input type="text" required class="form-control" value="<?php echo $EditAdmin['diachi'] ?>" name="diachi">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Gioi tinh</label>
                <div class="col-sm-3">
                    <input type="radio" <?php echo $EditAdmin['gioitinh'] == 'nam' ? "checked = 'checked' " : ''?> name="gioitinh" value="nam">Nam<br>
                    <input type="radio" <?php echo $EditAdmin['gioitinh'] == 'nu' ? "checked = 'checked' " : ''?> name="gioitinh" value="nu">Nu<br>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Ngay sinh</label>
                <div class="col-sm-3">
                    <input type="date"  class="form-control" value="<?php echo $EditAdmin['ngaysinh'] ?>" name="ngaysinh">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">So CMND</label>
                <div class="col-sm-3">
                    <input type="text" required class="form-control" value="<?php echo $EditAdmin['socmnd'] ?>" name="socmnd">
                    <?php if(isset($error['socmnd'])):?>
                    <p class="text-danger"><?php echo $error['socmnd']?></p>
                    <?php endif;?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-8">
                    <button type="submit" class="btn btn-primary">Cap nhat admin</button>
                </div>
            </div>
        </form>
    </div>
</div>
