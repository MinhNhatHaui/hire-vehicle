<?php
    require_once __DIR__ . "/autoload/autoload.php";
    $loai = $db->fetchAll("loai");

?>
<?php require_once __DIR__. "/layouts/header.php"; ?>

    <div class="content-wrapper">
        <div class="container-fluid">
            <h3>Chào mừng đến với trang quản trị Admin</h3>
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">My Dashboard</li>
            </ol>
            <!-- Icon Cards-->
            <div class="row">

            </div>
            <div>

            </div>
            <!-- Area Chart Example-->
        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->

    <?php require_once __DIR__. "/layouts/footer.php"; ?>