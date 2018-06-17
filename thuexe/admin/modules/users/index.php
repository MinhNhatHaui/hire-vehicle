<?php
/**
 * Created by PhpStorm.
 * User: minhnhat
 * Date: 26/05/2018
 * Time: 23:01
 */


?>
<?php
$open = 'datxe';
    require_once __DIR__. "/../../autoload/autoload.php";
    $getUsers = $db->fetchAll('users');



?>
<?php require_once __DIR__. "/../../layouts/header.php" ?>
<div class="content-wrapper">
    <div class="mt-3 container-fluid">
        <h3>Quan ly dat xe</h3>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="../../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Quan ly dat xe</li>
        </ol>
        <div class="clearfix"></div>
        <?php require_once __DIR__ ."/../../../partials/notification.php"; ?>
    </div>
    <div class="container-fluid">
        <div>
            <table class="table table-bordered container-fluid">
                <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Tinh trang xu ly</th>
                    <th>Chi tiet</th>
                    <th>Dia chi</th>
                    <th>So CMND</th>
                    <th>Hanh dong</th>
                </tr>
                </thead>
                <tbody>
                <?php $stt = 1; foreach($getUsers as $item) :?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $item['hoten']; ?></td>
                    <td><?php echo $item['sdt']; ?></td>
                    <td>
                        <a href="status.php?id=<?php echo $item['id']?>"] class="btn btn-xs <?php echo $item['status'] == 1 ? 'btn-success' : 'btn-warning'?>">
                            <?php echo $item['status'] == 1 ? 'Duoc xu ly' : 'Chua duoc xu ly' ?>
                        </a>
                    </td>
                    <td><a href="detail.php?id=<?php echo $item['id']?>">Chi tiet</a></td>
                    <td><?php echo $item['diachi']; ?></td>
                    <td><?php echo $item['socmnd']; ?></td>
                    <td>
                        <a href="delete.php?id=<?php echo $item['id'] ?>" class="btn btn-xs mb-1 btn-danger"><i class="fa mr-1 fa-remove"></i>Xoa</a>
                    </td>
                    <?php $stt++; endforeach; ?>
                </tr>
                </tbody>

            </table>
        </div>
    </div>
</div>

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
