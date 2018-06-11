<?php
    if(! isset($_SESSION['name_admin'])){
    echo "
            <script>
                alert('Bạn không được truy cập vào hệ thống nếu không có sự cho phép của admin. \\n' +
                 'Hoặc là dùng tài khoản admin cấp để đăng nhập lại.\\nXin cảm ơn!');
                location.href = '/admin/dang-nhap.php';
            </script>";
    }

    require_once __DIR__ . "/../autoload/autoload.php";
//    if()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Nhom 11 - CHO THUE PHUONG TIEN DI CHUYEN</title>
    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url() ?>public/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>public/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url() ?>public/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>public/admin/css/sb-admin.css" rel="stylesheet">
<!--    <link href="/public/admin/css/fontawesome-all.min.css" rel="stylesheet">-->
    <!--    Custom Icon for all templates-->
    <link href="<?php echo base_url() ?>admin/manager.png" rel="icon" sizes="16x16">
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="">TRANG QUAN LY WEBSITE</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item <?php echo isset($open) && $open == 'category' ? 'active' : '' ?>">
                <a class="nav-link" href=" <?php echo modules("category")?>" >
                    <i class="fa fa-fw fa-list-ul"></i>
                    <span class="nav-link-text">Danh sach cac loai xe</span>
                </a>
            </li>
            <li class="nav-item <?php echo isset($open) && $open == 'vehicle' ? 'active' : '' ?>">
                <a class="nav-link" href=" <?php echo modules("vehicle")?>" >
                    <i class="fa fa-fw fa-motorcycle"></i>
                    <span class="nav-link-text">Danh sach cac xe</span>
                </a>
            </li>
            <li class="nav-item <?php echo isset($open) && $open == 'admin' ? 'active' : '' ?>">
                <a class="nav-link" href=" <?php echo modules("admin")?>" >
                    <i class="fa faw fa-address-card"></i>
                    <span class="nav-link-text">Quan ly admins</span>
                </a>
            </li>
            <li class="nav-item <?php echo isset($open) && $open == 'datxe' ? 'active' : '' ?>">
                <a class="nav-link" href=" <?php echo modules("users")?>" >
                    <i class="fa fa-address-book-o" aria-hidden="true"></i>
                    <span class="nav-link-text">Quan ly dat xe</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <a class="nav-link  mr-lg-2" >
                    <p>Xin chao: <span class="text-capitalize text-success"><?php echo $_SESSION['name_admin']?></span></p>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-bell"></i>
                    <span class="d-lg-none">Alerts
                        <span class="badge badge-pill badge-warning">asdsdds</span>
                    </span>
                    <span class="indicator text-warning d-none d-lg-block">
                        <i class="fa fa-fw fa-circle"></i>
                    </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="alertsDropdown">

                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" href="/exit.php" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>