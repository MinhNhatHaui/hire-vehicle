<?php
$open = 'vehicle';
require_once __DIR__. "/../../autoload/autoload.php";

$xe = $db->fetchAll("xe");
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>

    <div class="content-wrapper">
    <div class="container-fluid">
        <h3>Quan ly thong tin cac xe
            <a href="add.php" class="btn btn-success">Them moi</a>
        </h3>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Danh sach cac xe</li>
        </ol>
        <div class="clearfix"></div>
        <?php require_once __DIR__. "/../../../partials/notification.php" ?>
    </div>
    <div class=" container-fluid">
        <div>
            <table class="table table-bordered container-fluid">
                <thead class="thead-light">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Ma loai</th>
                    <th scope="col">Ma xe</th>
                    <th scope="col">Ten xe</th>
                    <th scope="col">Hinh anh</th>
                    <th scope="col">So luong</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Status</th>
                    <th scope="col">Dong co</th>
                    <th scope="col">Cong suat</th>
                    <th scope="col">Ty so nen</th>
                    <th scope="col">He thong khoi dong</th>
                    <th scope="col">Duoc tao luc</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $stt = 1; foreach($xe as $item): ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $item['maloai'] ?></td>
                        <td><?php echo $item['maxe'] ?></td>
                        <td><?php echo $item['tenxe'] ?></td>
                        <td>
                            <img src="<?php echo uploads()?>xe/<?php echo $item['hinhanh'] ?>" width="80px" height="80px" alt="">
                        </td>
                        <td><?php echo $item['soluong'] ?></td>
                        <td><?php echo $item['slug'] ?></td>
                        <td><?php echo $item['status'] ?></td>
                        <td><?php echo $item['dong_co'] ?></td>
                        <td><?php echo $item['cong_suat'] ?></td>
                        <td><?php echo $item['ty_so_nen'] ?></td>
                        <td><?php echo $item['he_thong_kd'] ?></td>
                        <td><?php echo $item['tao_luc'] ?></td>
                        <td>
                            <a href="edit.php?maloai=<?php echo $item['maloai'] ?>" class="btn btn-xs mb-1 btn-warning"><i class="fa mr-1 fa-edit"></i>Sua</a>
                            <a href="delete.php?maloai=<?php echo $item['maloai'] ?>" class="btn btn-xs mb-1 btn-danger"><i class="fa mr-1 fa-remove"></i>Xoa</a>
                        </td>
                    </tr>
                    <?php $stt++;endforeach ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example" class="pull-right">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div>
        <!-- Area Chart Example-->
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>