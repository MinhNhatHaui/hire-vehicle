<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>thuexegiare</title>
    <link rel="icon"  href="<?php echo base_url()?>public/icon.png" />
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="<?php echo base_url()?>public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>public/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="<?php echo base_url()?>public/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/style.css" />
</head>
<body>
<div class="container-fuild" id="bk">
    <!-- head -->
    <div class="row">
        <div class="col-md-12">
            <div class="head">
                <img src="<?php echo base_url()?>public/image3.png" width="100%">
            </div>
        </div>
    </div>
    <!-- end head -->
    <!-- menu -->
    <nav class="navbar navbar-default " role="navigation">
        <div class="container-fluid">
            <ul class="nav navbar-nav ">
                <li><a class="a-header" href="<?php echo base_url()?>">Trang chủ <i class="fas fa-home"></i></a></li>
                <li><a class="a-header" href="<?php echo base_url()?>gioi-thieu.php">Giới thiệu</a></li>
                <li>
                    <a class="a-header" href="<?php echo base_url()?>bao-gia.php">Báo giá <i class="fas fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <?php foreach ($ds_loaixe as $item): ?>
                        <li><a class="a-header" href="#"><?php echo $item['tenloaixe']?></a></li>
                        <?php endforeach;?>
                    </ul>
                </li>
                <li>
                    <a class="a-header" href="#">Tư vấn  <i class="fas fa-comments"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="a-header" href="hopdong.html">Hợp Đồng</a></li>
                        <li><a class="a-header" href="kinhnghiem.html">Kinh Nghiệm</a></li>
                    </ul>
                </li>
                <li><a class="a-header" href="lienhe.html">Liên hệ <i class="fas fa-phone-square"></i></a></li>
                <li><a class="a-header" href="#">Hỗ trợ khách hàng <i class="fas fa-ambulance"></i></a></li>
            </ul>
        </div>
    </nav>
    <!-- end menu -->
    <!-- content -->