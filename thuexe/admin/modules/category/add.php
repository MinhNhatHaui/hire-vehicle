<?php
$open = 'category';
require_once __DIR__. "/../../autoload/autoload.php";

if($_SERVER['REQUEST_METHOD'] == "POST")
{

    $data = [
        "tenloaixe" => postInput('tenloaixe'),
        "maloai" => postInput('maloai'),
        "slug" => to_slug(postInput('tenloaixe')),

    ];

    $error = [];

    //ham xu ly loi khi chua nhap ten loai xe
    //thieu khi chua nhap ma loai xe, bo sung sau
    if(postInput('maloai') == '')
    {
        $error['maloai'] = "Ban chua nhap ma loai xe ";
    }
    if(postInput('tenloaixe') == '')
    {
        $error['tenloaixe'] = "Ban chua nhap ten loai xe ";
    }

    if(empty($error))
    {
        $isset = $db->fetchOne("loai", " maloai = '".$data['maloai']."' ");
        //neu isset co tra ve thi da lay duoc thong tin
        // chi tiep tuc khi ma khong ton tai ma loai xe
        if(count($isset) > 0)
        {
            $_SESSION['error'] = " Loai xe ban vua nhap da ton tai! Vui long thu lai. ";
        }
        else
        {
            $maloai_insert = $db->insert("loai",$data);
            if($maloai_insert == 0)
            {
                $_SESSION['success'] = 'Them moi thanh cong';
                redirectAdmin("category");
            }
            else{
                $_SESSION['error'] = 'Them moi that bai';
            }
        }
//        var_dump($maloai_insert);

    }




}
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>

    <div class="content-wrapper">
        <div class="container-fluid">
            <h3>Them moi danh muc</h3>
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../../index.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="../category/index.php">Danh muc</a>
                </li>
                <li class="breadcrumb-item active">
                    Them moi danh muc
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
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Ma loai xe" name="maloai">
                                <?php if(isset($error['maloai'])): ?>
                                    <p class="text-danger"> <?php echo $error['maloai'] ?> </p>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Ten loai xe</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Ten loai xe" name="tenloaixe">
                                <?php if(isset($error['tenloaixe'])): ?>
                                    <p class="text-danger"> <?php echo $error['tenloaixe'] ?> </p>
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