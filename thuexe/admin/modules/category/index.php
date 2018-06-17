<?php
$open = 'category';
require_once __DIR__. "/../../autoload/autoload.php";

$loai = $db->fetchAll("loai");
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>

    <div class=" content-wrapper">
        <div class="mt-3 container-fluid">
            <h3>Danh sach danh muc
                <a href="add.php" class="btn btn-success">Them moi</a>
            </h3>
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../../index.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Danh muc</li>
            </ol>
            <div class="clearfix"></div>
            <?php require_once __DIR__. "/../../../partials/notification.php" ?>
        </div>
            <div class=" container-fluid">
                <div>
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Ma loai</th>
                            <th scope="col">Ten loai xe</th>
                            <th scope="col">Duoc tao luc</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; foreach($loai as $item): ?>
                                <tr>
                                    <td><?php echo $stt ?></td>
                                    <td><?php echo $item['maloai'] ?></td>
                                    <td><?php echo $item['tenloaixe'] ?></td>
                                    <td><?php echo $item['tao_luc'] ?></td>
                                    <td><?php echo $item['slug'] ?></td>
                                    <td>
                                        <a href="edit.php?maloai=<?php echo $item['maloai'] ?>" class="btn btn-xs mb-1 btn-warning"><i class="fa mr-1 fa-edit"></i>Sua</a>
                                        <a href="delete.php?maloai=<?php echo $item['maloai'] ?>" class="btn btn-xs mb-1 btn-danger"><i class="fa mr-1 fa-remove"></i>Xoa</a>
                                    </td>
                                </tr>
                            <?php $stt++;endforeach ?>
                        </tbody>
                    </table>
<!--                    <nav aria-label="Page navigation example" class="pull-right">-->
<!--                        <ul class="pagination">-->
<!--                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>-->
<!--                            <li class="page-item"><a class="page-link" href="#">1</a></li>-->
<!--                            <li class="page-item"><a class="page-link" href="#">2</a></li>-->
<!--                            <li class="page-item"><a class="page-link" href="#">3</a></li>-->
<!--                            <li class="page-item"><a class="page-link" href="#">Next</a></li>-->
<!--                        </ul>-->
<!--                    </nav>-->
                </div>
            </div>
            <div>
            <!-- Area Chart Example-->
        </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>