<?php
$open = 'vehicle';
require_once __DIR__. "/../../autoload/autoload.php";


    /*
        danh sach danh muc san pham
     */
    $loai = $db->fetchAll("loai");

    $data = [
        "maloai" => postInput('maloai'),
        "maxe" => postInput('maxe'),
        "tenxe" => postInput('tenxe'),
        "slug" => to_slug(postInput('tenxe')),
        "soluong" => postInput('soluong'),
        "gia" => postInput('gia'),
        "hinhanh" => postInput('hinhanh'),
        "status" => postInput('status'),
        "dong_co" => postInput('dong_co'),
        "cong_suat" => postInput('cong_suat'),
        "dung_tich_xang" => postInput('dung_tich_xang'),
    ];
if($_SERVER['REQUEST_METHOD'] == "POST")
{



    $error = [];

    //ham xu ly loi khi chua nhap ten loai xe
    //thieu khi chua nhap ma loai xe, bo sung sau
    //kiem  tra hinh anh
    /*if(!isset($_FILES['hinhanh']))
    {
        $error['hinhanh'] = "Ban chua nhap hinh anh";
    }*/


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
                $part = ROOT ."xe/";
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
                $id_insert = $db->insert("xe",$data);
            if($id_insert)
            {
                move_uploaded_file($file_tmp, $part.$file_name);
                $_SESSION['success'] = 'Them xe thanh cong';
//              redirectAdmin('vehicle');
            }
            else{
                $_SESSION['error'] = 'Them xe that bai';
            }
        }


    }




}
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>

    <div class="content-wrapper">
    <div class="container-fluid">
        <h3>Quan ly thong tin cac xe</h3>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="../../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Danh sach cac xe</a>
            </li>
            <li class="breadcrumb-item active">
                Them moi xe
            </li>
        </ol>
        <div class="clearfix"></div>
        <?php require_once __DIR__. "/../../../partials/notification.php" ?>

    </div>
    <div class=" container-fluid">
        <div>
            <!--                action ko de gi se duoc xu ly tren trang dau-->
            <form action="" method="post" enctype="multipart/form-data">
                <form>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Ten loai xe</label>
                        <div class="col-sm-3">
                            <select class="form-control" required name="maloai" id="">
                                <option value="" >- Chon loai xe -</option>
                                <?php foreach ($loai as $item): ?>
                                    <option value="<?php echo $item['maloai'] ?>">
                                        <?php echo $item['tenloaixe'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <?php if(isset($error['maloai'])): ?>
                                <p class="text-danger"> <?php echo $error['maloai'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Ma xe</label>
                        <div class="col-sm-3">
                            <input type="text" required class="form-control" id="inputEmail3"
                                   value="<?php echo $data['maxe'] ?>" name="maxe">
                            <?php if(isset($error['maxe'])): ?>
                                <p class="text-danger"> <?php echo $error['maxe'] ?> </p>
                            <?php endif ?>
                        </div>
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Ten xe</label>
                        <div class="col-sm-3">
                            <input type="text" required class="form-control" id="inputEmail3"
                                   value="<?php echo postInput('tenxe')?>" name="tenxe">
                            <?php if(isset($error['tenxe'])): ?>
                                <p class="text-danger"> <?php echo $error['tenxe'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Hinh anh</label>
                        <div class="col-sm-3">
                            <input type="file" required id="inputEmail3"  name="hinhanh">
                            <?php if(isset($error['hinhanh'])): ?>
                                <p class="text-danger"> <?php echo $error['hinhanh'] ?></p>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">So luong</label>
                        <div class="col-sm-3">
                            <input type="number" required class="form-control" id="inputEmail3"  name="soluong"
                                   value="<?php echo postInput('soluong')?>">
                            <?php if(isset($error['soluong'])): ?>
                                <p class="text-danger"> <?php echo $error['soluong'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Gia</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="inputEmail3"  name="gia"
                                   value="<?php echo postInput('gia')?>" placeholder="2.000.000">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Trang thai</label>
                        <div class="col-sm-3">
                            <input type="text" required class="form-control" id="inputEmail3"
                                   value="<?php echo postInput('status')?>"  name="status">
                            <?php if(isset($error['status'])): ?>
                                <p class="text-danger"> <?php echo $error['status'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Dong co</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3"
                                   value="<?php echo postInput('dong_co')?>" name="dong_co">
                            <?php if(isset($error['dong_co'])): ?>
                                <p class="text-danger"> <?php echo $error['dong_co'] ?> </p>
                            <?php endif ?>
                        </div>
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Cong suat</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3"
                                   value="<?php echo postInput('cong_suat')?>" name="cong_suat">
                            <?php if(isset($error['cong_suat'])): ?>
                                <p class="text-danger"> <?php echo $error['cong_suat'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Dung tich xang</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3"
                                   value="<?php echo postInput('dung_tich_xang')?>" name="dung_tich_xang">
                            <?php if(isset($error['dung_tich_xang'])): ?>
                                <p class="text-danger"> <?php echo $error['dung_tich_xang'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary">Them loai xe</button>
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

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>