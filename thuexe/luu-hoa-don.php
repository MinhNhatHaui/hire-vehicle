<?php require_once __DIR__ . "/autoload/autoload.php"; ?>
<?php if(!isset($_SESSION['cart']))
    {
        echo "<script>
                    alert('Ban chua chon xe de thue');
                    location.href='bao-gia.php';
                </script>
                ";
    }
?>
<?php foreach($_SESSION['cart'] as $key => $value): ?>
<?php if(isset($_SESSION['cart']))
        {

            $data = [
                "maxe"=>$key,
                "hoten" => postInput('hoten'),
                "email" => postInput('email'),
                "soluong" =>$value['soluong'],
                "sdt" => postInput('sdt'),
                "gioitinh" => postInput('gioitinh'),
                "diachi" => postInput('diachi'),
                "ngaysinh" => postInput('ngaysinh'),
                "ngaydat" => postInput('ngaydat'),
                "ngaytra" => postInput('ngaytra'),
                "socmnd" => postInput('socmnd'),
                "ghichu" => postInput('ghichu'),
            ];

            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $error = [];

                if(postInput('hoten') == ''){
                    $error['hoten'] = "Ban chua nhap ho ten";
                }
                if(postInput('sdt') == ''){
                    $error['sdt'] = "Ban chua nhap so dien thoai";
                }
                if(postInput('ngaysinh') == ''){
                    $error['ngaysinh'] = "Ban chua nhap ngay sinh";
                }
                if(postInput('ngaydat') == ''){
                    $error['ngaydat'] = "Ban chua nhap ngay sinh";
                }
                if(postInput('ngaytra') == ''){
                    $error['ngaytra'] = "Ban chua nhap ngay sinh";
                }
                if(postInput('diachi') == ''){
                    $error['diachi'] = "Ban chua nhap dia chi";
                }
                if(postInput('socmnd') == ''){
                    $error['socmnd'] = "Ban chua nhap so chung minh thu nhan dan";
                }
                if(empty($error)){
                    $user_id = $db->insert("users",$data);
                    if($user_id > 0){
                        $_SESSION['ok'] = 'Da luu thong tin';
                    }
                }
            }
        }
        endforeach;
                if(isset($_SESSION['ok'])){

                    unset($_SESSION['cart']);
                    unset($_SESSION['tongxe']);
                    unset($_SESSION['ok']);
                    echo "<script>
                                alert('Chung toi da luu lai thong tin thue xe cua ban!' +
                                 ' Hen ban ngay gan nhat den cua hang de nhan xe');
                                location.href= '/gioi-thieu.php';
                            </script>";

                }
?>
<?php require_once __DIR__ . "/layouts/header.php"; ?>
    <div class="row content">
        <div class="col-md-9 trai" style="padding-left: 60px;padding-bottom: 50px;font-family: 'Font Awesome 5 Free';font-size: 20px">
            <div class="container-fluid bg-success">
                <h3 class="text-center text-danger" STYLE="font-family: 'Font Awesome 5 Free';font-size: 30px">THONG TIN DANG KY THUE XE</h3>
                <div>
                    <h3>So xe ban dang ky thue: <?php echo $_SESSION['tongxe']?></h3>
                    <div class="text-center">
                        <?php foreach($_SESSION['cart'] as $key => $value): ?>
                            <img src="<?php echo base_url()?>public/uploads/xe/<?php echo $value['hinhanh']?>" alt="" width="100px" height="100px">
                                <span class="badge bg-danger"><?php echo $value['soluong']?></span>
                        <?php endforeach;?>
                    </div>
                    <br>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Ho va ten</label>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" placeholder="Nguyen Van A" name="hoten" value="">
                                <?php if(isset($error['hoten'])):?>
                                    <p class="bg-danger text-danger"><?php echo $error['hoten']?></p>
                                <?php endif;?>
                            </div>
                            <label for="" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" placeholder="vana_grooo@gmail.vn" value="<?php echo $data['email']?>" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">So dien thoai</label>
                            <div class="col-sm-4">
                                <input type="number"  class="form-control" placeholder="0123456789" value="<?php echo $data['sdt']?>" name="sdt">
                                <?php if(isset($error['sdt'])):?>
                                    <p class="bg-danger text-danger"><?php echo $error['sdt']?></p>
                                <?php endif;?>
                            </div>
                            <label for="" class="col-sm-2 col-form-label">Dia chi</label>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" placeholder=" 112 Nguyễn Văn Cừ, P.Bồ Đề, Q. Long Biên, Hà Nội" value="<?php echo $data['diachi']?>" name="diachi">
                                <?php if(isset($error['diachi'])):?>
                                    <p class="bg-danger text-danger"><?php echo $error['diachi']?></p>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Gioi tinh</label>
                            <div class="col-sm-4">
                                <input type="radio" name="gioitinh" value="nam">Nam<br>
                                <input type="radio" name="gioitinh" value="nu">Nu<br>
                            </div>
                            <label for="" class="col-sm-2 col-form-label">Ngay sinh</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="ngaysinh" value="<?php echo $data['ngaysinh']?>">
                                <?php if(isset($error['ngaysinh'])):?>
                                    <p class="bg-danger text-danger"><?php echo $error['ngaysinh']?></p>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Ngay dat</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="ngaydat" value="" min="<?php echo $today?>">
                                <?php if(isset($error['ngaydat'])):?>
                                    <p class="bg-danger text-danger"><?php echo $error['ngaydat']?></p>
                                <?php endif;?>
                            </div><label for="" class="col-sm-2 col-form-label">Ngay tra</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="ngaytra" value="" min="<?php echo $today?>">
                                <?php if(isset($error['ngaytra'])):?>
                                    <p class="bg-danger text-danger"><?php echo $error['ngaytra']?></p>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">So CMND</label>
                            <div class="col-sm-4">
                                <input type="number"  class="form-control" placeholder="123456789" name="socmnd" value="<?php echo $data['socmnd']?>">
                                <?php if(isset($error['socmnd'])):?>
                                    <p class="bg-danger text-danger"><?php echo $error['socmnd']?></p>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Ghi chu them</label>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" placeholder="123456789" name="ghichu" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 text-center">
                                <button href="" id="accept" class="btn btn-warning" style="width: 200px">DONG Y THUE XE
                                    <span>  </span>
                                </button>
                                <!--                            <a class="btn btn-warning" href="--><?php //echo modules('admin')?><!--">Quay lai trang chu</a>-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php echo require_once __DIR__ . "/layouts/quick-links.php" ?>

    </div>
<?php echo require_once __DIR__ . "/layouts/footer.php" ?>