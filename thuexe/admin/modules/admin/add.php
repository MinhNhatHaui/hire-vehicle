<?php
$open = 'admin';
require_once __DIR__. "/../../autoload/autoload.php";

        $data = [
            "name" => postInput('name'),
            "hinhanh" => postInput('hinhanh'),
            "password" => md5(postInput('password')),
            "phone" => postInput('phone'),
            "gioitinh" => postInput('gioitinh'),
            "diachi" => postInput('diachi'),
            "ngaysinh" => postInput('ngaysinh'),
            "socmnd" => postInput('socmnd'),
        ];
if($_SERVER['REQUEST_METHOD'] == "POST")
{


        $error = [];

        if($data['password'] != md5(postInput('re_password'))){
            $error['password'] = "Mat khau khong khop ";
        }
        if(isset($data['socmnd'])){
            $checkExist = $db->fetchOne("quantrivien"," socmnd = '".$data['socmnd']."'");
            if($checkExist != NULL)
            {
                $error['socmnd'] = 'Admin co so CMND nay da ton tai';
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
                    $imageFileType = strtolower(pathinfo($part.$file_name,PATHINFO_EXTENSION));
                }
            }

            if($imageFileType != "jpg" && $imageFileType != "png"
                && $imageFileType != "jpeg" && $imageFileType != "gif" )
                {
                    $error['hinhanh'] = "Hinh anh khong dung dinh dang. Chi chap nhan dinh dang: .jpg, .png, .jpeg, .gif";
                }
            else
                {
                    $id_insert = $db->insert("quantrivien", $data);
                    if($id_insert)
                        {
                            move_uploaded_file($file_tmp,$part.$file_name);
                            $_SESSION['success'] = "Them moi admin thanh cong";
    //                      redirectAdmin("admin");
                        }
                    else
                        {
                            $_SESSION['error'] = "Admin moi chua duoc them";
                        }
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
                    <input type="text" required class="form-control" placeholder="Nguyen Van A" name="name" value="<?php echo $data['name']?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Mat khau</label>
                <div class="col-sm-3">
                    <input type="password" required class="form-control" placeholder="********" name="password">
                </div>
                <?php if(isset($error['password'])) : ?>
                    <p class="text-danger"> <?php echo $error['password'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Xac nhan lai</label>
                <div class="col-sm-3">
                    <input type="password" required class="form-control" placeholder="********" name="re_password">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Hinh anh</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control" name="hinhanh">
                    <?php if(isset($error['hinhanh'])): ?>
                        <p class="text-danger"> <?php echo $error['hinhanh'] ?> </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">

            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">So dien thoai</label>
                <div class="col-sm-3">
                    <input type="number" required class="form-control" placeholder="0123456789" value="<?php echo $data['phone']?>" name="phone">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Dia chi</label>
                <div class="col-sm-3">
                    <input type="text" required class="form-control" placeholder=" 112 Nguyễn Văn Cừ, P.Bồ Đề, Q. Long Biên, Hà Nội" value="<?php echo $data['diachi']?>" name="diachi">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Gioi tinh</label>
                <div class="col-sm-3">
                    <input type="radio" <?php echo isset($data['gioitinh']) && $data['gioitinh'] == 'nam' ? "checked = 'checked' " : ''?> name="gioitinh" value="nam">Nam<br>
                    <input type="radio" <?php echo isset($data['gioitinh']) && $data['gioitinh'] == 'nu' ? "checked = 'checked' " : ''?> name="gioitinh" value="nu">Nu<br>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Ngay sinh</label>
                <div class="col-sm-3">
                    <input type="date" required class="form-control" name="ngaysinh" value="<?php echo $data['ngaysinh']?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">So CMND</label>
                <div class="col-sm-3">
                    <input type="number" required class="form-control" placeholder="123456789" name="socmnd" value="<?php echo $data['socmnd']?>">
                </div>
                <?php if(isset($error['socmnd'])):?>
                <p class="text-danger"><?php echo $error['socmnd']?></p>
                <?php endif;?>
            </div>
            <div class="form-group row">
                <div class="col-sm-8">
                    <button type="submit" class="btn btn-primary mr-5 ml-5">Tao admin</button>
                    <a class="btn btn-warning" href="<?php echo modules('admin')?>">Quay lai trang chu</a>
                </div>
            </div>
        </form>
    </div>
</div>
