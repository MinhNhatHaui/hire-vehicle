<?php
$open = 'vehicle';
require_once __DIR__ . "/../../autoload/autoload.php";

if (isset($_GET['page'])) {
    $p = $_GET['page'];
} else {
    $p = 1;
}
// cac xe khong co thuoc loai xe nao cung se duoc in ra
$sql = "SELECT xe.*, loai.tenloaixe as namecate FROM xe left join loai on loai.maloai = xe.maloai";
$xe = $db->fetchJone('xe', $sql, $p, 3, true);

if (isset($xe['page'])) {
    $sotrang = $xe['page'];
    unset($xe['page']);
}

//$xe = $db->fetchAll("xe");
?>
<?php require_once __DIR__ . "/../../layouts/header.php"; ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <h3>Quan ly thong tin cac xe
                <a href="add.php" class="btn btn-success">Them moi</a>
            </h3>
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../../index.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Danh sach cac xe</li>
            </ol>
            <div class="clearfix"></div>
            <?php require_once __DIR__ . "/../../../partials/notification.php" ?>
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
                        <th scope="col">Dung tich xang</th>
                        <th scope="col">Dong co</th>
                        <th scope="col">Cong suat</th>
                        <th scope="col">Duoc tao luc</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $stt = 1;
                    foreach ($xe as $item): ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $item['namecate'] ?></td>
                            <td><?php echo $item['maxe'] ?></td>
                            <td><?php echo $item['tenxe'] ?></td>
                            <td>
                                <img src="<?php echo uploads() ?>xe/<?php echo $item['hinhanh'] ?>" width="80px"
                                     height="80px" alt="">
                            </td>
                            <td><?php echo $item['soluong'] ?></td>
                            <td><?php echo $item['gia'] ?></td>
                            <td><?php echo $item['status'] ?></td>
                            <td><?php echo $item['dung_tich_xang'] ?></td>
                            <td><?php echo $item['dong_co'] ?></td>
                            <td><?php echo $item['cong_suat'] ?></td>
                            <td><?php echo $item['tao_luc'] ?></td>
                            <td>
                                <a href="edit.php?maxe=<?php echo $item['maxe'] ?>" class="btn btn-xs mb-1 btn-warning"><i
                                            class="fa mr-1 fa-edit"></i>Sua</a>
                                <a href="delete.php?maxe=<?php echo $item['maxe'] ?>" class="btn btn-xs mb-1 btn-danger"><i
                                            class="fa mr-1 fa-remove"></i>Xoa</a>
                            </td>
                        </tr>
                        <?php $stt++;endforeach ?>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example" class="pull-right">
                    <ul class="pagination">
                        <!--                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>-->
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $p - 1; ?>">Previous</a>
                        </li>
                        <?php for ($i = 1; $i <= $sotrang; $i++) : ?>
                            <?php
                            if (isset($_GET['page'])) {
                                $p = $_GET['page'];
                            } else {
                                $p = 1;
                            }
                            ?>
                            <li class="page-item <?php echo ($i == $p) ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $p + 1; ?>">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    <div>
        <!-- Area Chart Example-->
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>