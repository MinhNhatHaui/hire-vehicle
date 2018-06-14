<?php require_once __DIR__. "/../../autoload/autoload.php"?>
<?php
    $open = 'datxe';
    $id = getInput('id');
    $getCustomer = $db->fetchID("users",'id',$id);
    $getXe = $db->fetchOne("xe","maxe = ".$getCustomer['maxe']);
?>
<?php require_once __DIR__. "/../../layouts/header.php"?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <h3>Quan ly dat xe</h3>
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../../index.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="../users/index.php">Quan ly dat xe</a>
                </li>
                <li class="breadcrumb-item active">
                    Chi tiet
                </li>
            </ol>
            <div class="clearfix"></div>
            <?php require_once __DIR__ ."/../../../partials/notification.php"; ?>
        </div>
        <div class="container-fluid">
            <div>
                <table class="table table-bordered container-fluid">
                    <thead class="thead-dark">
                    <tr>
                        <th>Ten</th>
                        <th>Gioi tinh</th>
                        <th>Ma xe</th>
                        <th>So luong</th>
                        <th>Hinh anh</th>
                        <th>Phone</th>
                        <th>Dia chi</th>
                        <th>Email</th>
                        <th>Ngay sinh</th>
                        <th>So CMND</th>
                        <th>Hanh dong</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $getCustomer['hoten']; ?></td>
                        <td><?php echo $getCustomer['gioitinh']; ?></td>
                        <td><?php echo $getCustomer['maxe']; ?></td>
                        <td><?php echo $getCustomer['soluong']; ?></td>
                        <td>
                            <img src="<?php echo base_url()?>/public/uploads/xe/<?php echo $getXe['hinhanh']?>" alt="" width="100px">
                        </td>
                        <td><?php echo $getCustomer['sdt']; ?></td>
                        <td><?php echo $getCustomer['diachi']?></td>
                        <td><?php echo $getCustomer['email']; ?></td>
                        <td><?php echo $getCustomer['ngaysinh']; ?></td>
                        <td><?php echo $getCustomer['socmnd']; ?></td>
                        <td>
                            <a href="delete.php?id=<?php echo $getCustomer['id'] ?>" class="btn btn-xs mb-1 btn-danger"><i class="fa mr-1 fa-remove"></i>Xoa</a>
                        </td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

<?php require_once __DIR__. "/../../layouts/footer.php"?>