<?php
$open = 'vehicle';
require_once __DIR__. "/../../autoload/autoload.php";


/*
    danh sach danh muc san pham
 */
$loai = $db->fetchAll("loai");



if($_SERVER['REQUEST_METHOD'] == "POST")
{

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

    //ham xu ly loi khi chua nhap ten loai xe
    //thieu khi chua nhap ma loai xe, bo sung sau
    /* if(postInput('maloai') == '')
     {
         $error['maloai'] = "Ban chua nhap ten loai xe ";
     }*/

    /*if(empty($error))
    {
        $isset = $db->fetchOne("loai", " maloai = '".$data['maloai']."' ");
        //neu isset co tra ve thi da lay duoc thong tin
        // chi tiep tuc khi ma khong ton tai ma loai xe
        if(count($isset) > 0)
        {
            $_SESSION['error'] = " Thong tin ban nhap chua hoan chinh. Hay kiem tra lai ";
        }
        else
        {
            $maxe_insert = $db->insert("xe",$data);
            if($maxe_insert == 0)
            {
                $_SESSION['success'] = 'Them moi thanh cong';
                redirectAdmin("category");
            }
            else{
                $_SESSION['error'] = 'Them moi that bai';
            }
        }
//        var_dump($maloai_insert);

    }*/




}
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>

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
        <?php require_once __DIR__. "/../../../partials/notification.php" ?>

    </div>
    <div class=" container-fluid">
        <div>
            <!--                action ko de gi se duoc xu ly tren trang dau-->
            <form action="" method="post">
                <form>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Ma loai xe</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="maloai" id="">
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
                        <div class="col-sm-4">
                            <input type="text" required class="form-control" id="inputEmail3"  name="maxe">
                            <?php if(isset($error['maxe'])): ?>
                                <p class="text-danger"> <?php echo $error['maxe'] ?> </p>
                            <?php endif ?>
                        </div>
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Ten xe</label>
                        <div class="col-sm-4">
                            <input type="text" required class="form-control" id="inputEmail3"  name="tenxe">
                            <?php if(isset($error['tenxe'])): ?>
                                <p class="text-danger"> <?php echo $error['tenxe'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Hinh anh</label>
                        <div class="col-sm-3">
                            <input type="file" id="inputEmail3"  name="hinhanh">
                            <?php if(isset($error['hinhanh'])): ?>
                                <p class="text-danger"> <?php echo $error['hinhanh'] ?> </p>
                            <?php endif ?>
                        </div>

                    </div>
                    <div class="form-group row">

                        <label for="inputEmail3" class="col-sm-2 col-form-label">So luong</label>
                        <div class="col-sm-3">
                            <input type="number" required class="form-control" id="inputEmail3"  name="soluong" value="0">
                            <?php if(isset($error['soluong'])): ?>
                                <p class="text-danger"> <?php echo $error['soluong'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Trang thai</label>
                        <div class="col-sm-3">
                            <input type="text" required class="form-control" id="inputEmail3"  name="status">
                            <?php if(isset($error['status'])): ?>
                                <p class="text-danger"> <?php echo $error['status'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Dong co</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3"  name="dong_co">
                            <?php if(isset($error['dong_co'])): ?>
                                <p class="text-danger"> <?php echo $error['dong_co'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Cong suat</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3"  name="cong_suat">
                            <?php if(isset($error['cong_suat'])): ?>
                                <p class="text-danger"> <?php echo $error['cong_suat'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Ty so nen</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3"  name="ty_so_nen">
                            <?php if(isset($error['ty_so_nen'])): ?>
                                <p class="text-danger"> <?php echo $error['ty_so_nen'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">He thong khoi dong</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3"  name="he_thong_kd">
                            <?php if(isset($error['he_thong_kd'])): ?>
                                <p class="text-danger"> <?php echo $error['he_thong_kd'] ?> </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Dung tich xang</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3"  name="dung_tich_xang">
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