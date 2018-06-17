<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>thuexegiare</title>
    <link rel="icon"  href="<?php echo base_url()?>public/icon.png" />
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="<?php echo base_url()?>public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>public/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css" />
    <script src="/public/js/jquery-3.3.1.js"></script>
    <script src="<?php echo base_url()?>public/js/bootstrap.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $("i#update-icon").hover( function (e) {
                $(this).toggleClass('fa-pulse', e.type === 'mouseenter');
            });
        });

        $(function(){
            $updateCart = $(".update-cart");
            $updateCart.click(function(e){
                e.preventDefault();
                $qty = $(this).parents("#tbody").find("#qty").val();

                $key = $(this).attr("data-key");
                $key.val();


            })
        })
    </script>
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
                <li><a class="a-header" href="<?php echo base_url()?>gioi-thieu.html">Giới thiệu <i class="fas fa-info"></i></a></li>
                <li>
                    <a class="a-header" href="<?php echo base_url()?>bao-gia.html">Báo giá <i class="fas fa-hand-holding-usd"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="a-header" href="<?php echo base_url()?>xe-may.html">Xe máy</a></li>
                        <li><a class="a-header" href="<?php echo base_url()?>xe-dap-dien.html">Xe đạp điện</a></li>
                        <li><a class="a-header" href="<?php echo base_url()?>xe-dap.html">Xe đạp</a></li>
                    </ul>
                </li>
                <li>
                    <a class="a-header" href="/hop-dong.html">Tư vấn  <i class="fas fa-comments"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="a-header" href="/hop-dong.html">Hợp Đồng</a></li>
                        <li><a class="a-header" href="/kinh-nghiem.html">Kinh Nghiệm</a></li>
                    </ul>
                </li>
                <li><a class="a-header" href="/lien-he.html">Liên hệ <i class="fas fa-phone-square"></i></a></li>
                <li><a class="a-header" href="/ho-tro.html">Hỗ trợ <i class="fas fa-ambulance"></i></a></li>
            </ul>
        </div>
    </nav>
    <!-- end menu -->
    <!-- content -->