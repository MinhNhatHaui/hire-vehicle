<?php
/**
 * Created by PhpStorm.
 * User: minhnhat
 * Date: 12/06/2018
 * Time: 10:49
 */
$open = 'e-bike';
require_once __DIR__. "/../../../autoload/autoload.php";

$sql = "SELECT * FROM xe where maloai = 2";
$getListMoto = $db->fetchSql($sql);
//var_dump($getListMoto);
?>
<?php require_once __DIR__. "/../../../layouts/header.php";?>
<div class="content-wrapper">
    <div class="container-fluid">
        <h3>Quan ly thong tin cac xe
            <a href="add.php" class="btn btn-success">Them moi</a>
        </h3>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="../../../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Danh sach cac xe</li>
            <li class="breadcrumb-item active">Xe dap dien</li>
        </ol>
        <div class="clearfix"></div>
        <?php require_once __DIR__ . "/../../../../partials/notification.php" ?>
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
                    <th scope="col">Gia</th>
                    <th scope="col">Status</th>
                    <th scope="col">Duoc tao luc</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $stt = 1;
                foreach ($getListMoto as $item): ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $item['tenxe'] ?></td>
                        <td><?php echo $item['maxe'] ?></td>
                        <td><?php echo $item['tenxe'] ?></td>
                        <td>
                            <img src="<?php echo uploads() ?>xe/<?php echo $item['hinhanh'] ?>" width="80px"
                                 height="80px" alt="">
                        </td>
                        <td><?php echo $item['soluong'] ?></td>
                        <td><?php echo $item['gia'] ?></td>
                        <td>
                            <a href="home.php?id=<?php echo $item['id']?>" class="btn btn-xs <?php echo $item['status'] == 1 ? 'btn-success' : 'btn-secondary'?>">
                                <?php echo $item['status'] == 1 ? 'Hiển thị' : 'Không' ?>
                            </a>
                        </td>
                        <td><?php echo $item['tao_luc'] ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $item['id'] ?>" class="btn btn-xs mb-1 btn-warning"><i
                                    class="fa mr-1 fa-edit"></i>Sua</a>
                            <a href="delete.php?id=<?php echo $item['id'] ?>" class="btn btn-xs mb-1 btn-danger"><i
                                    class="fa mr-1 fa-remove"></i>Xoa</a>
                        </td>
                    </tr>
                    <?php $stt++;endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
    <div>
        <!-- Area Chart Example-->
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

    <?php require_once __DIR__ . "/../../../layouts/footer.php"; ?>
