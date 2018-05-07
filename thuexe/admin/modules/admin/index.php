<?php
    $open = 'admin';
    require_once __DIR__. "/../../autoload/autoload.php";
    $getAdmins = $db->fetchAll('quantrivien');
    ?>
<?php require_once __DIR__. "/../../layouts/header.php" ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <h3>Quan ly admins
                <a href="add.php" class="btn btn-success">Them moi</a>
            </h3>
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../../index.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Quan ly admins</li>
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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Hinhanh</th>
                            <th>Phone</th>
                            <th>Gioi tinh</th>
                            <th>Dia chi</th>
                            <th>Ngay sinh</th>
                            <th>So CMND</th>
                            <th>Tao luc</th>
                            <th>Hanh dong</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; foreach($getAdmins as $item) :?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $item['id']; ?></td>
                            <td><?php echo $item['name']; ?></td>
                            <td>
                                <img src="<?php echo uploads()?>admins/<?php echo $item['hinhanh'] ?>" width="80px" height="80px" alt="">
                            </td>
                            <td><?php echo $item['phone']; ?></td>
                            <td><?php echo $item['gioitinh']; ?></td>
                            <td><?php echo $item['diachi']; ?></td>
                            <td><?php echo $item['ngaysinh']; ?></td>
                            <td><?php echo $item['socmnd']; ?></td>
                            <td><?php echo $item['tao_luc']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $item['id'] ?>" class="btn btn-xs mb-1 btn-warning"><i class="fa mr-1 fa-edit"></i>Sua</a>
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