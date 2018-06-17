<?php
/**
 * Created by PhpStorm.
 * User: minhnhat
 * Date: 22/05/2018
 * Time: 08:02
 */
    require_once __DIR__. "/autoload/autoload.php";
    $tMoney = 0;
    $tQuaty = 0;
//    var_dump($_SESSION['cart']);
    //Kiem tra neu khong con xe thi don hang khong ton tai
    if($_SESSION['cart'] == null ){
        echo "<script>
                alert('Khong co xe trong don dat' +
                 ' Moi ban chon lai xe');
                location.href='bao-gia.php';
        
            </script>";
        unset($_SESSION['tongxe']);
        unset($_SESSION['tongtien']);
    }
//$diff = $_SESSION['cart'][''->diff($ngaytra);
//echo $diff->format('%a ngay %h tieng %i phut');
//var_dump($_SESSION['cart'][122]['ngaydat']);
//var_dump($_SESSION['cart'][122]['ngaytra']);
//var_dump((($_SESSION['cart'][122]['ngaydat'])->diff(($_SESSION['cart'][122]['ngaytra'])))->format('%d %h'));

?>
<?php require_once __DIR__ . "/layouts/header.php"; ?>
<div class="row content">
    <div class="col-md-12 trai" style="padding-left: 60px;padding-bottom: 50px;">
            <?php if(isset($_SESSION['success'])) : ?>
        <div class="alert-warning text-center">
            <p class="text-warning" style="font-family: 'Font Awesome 5 Free';font-size: 20px">
                <?php echo $_SESSION['success']; unset($_SESSION['success'])?>
            </p>
        </div>
            <?php endif; ?>
        <table class="table" style="    margin-bottom: -20px;">
            <caption style="font-family: 'Apple Color Emoji'; font-size: 30px" class="text-capitalize text-center text-primary">Chi tiet phieu thue xe</caption>
            <thead style="background-color: #c8e5bc;color: #25765c;font-size:17px ">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ten xe</th>
                <th scope="col">Hinh anh</th>
                <th scope="col">So luong</th>
                <th scope="col">Thoi gian thue</th>
                <th scope="col">Gia
                </th>
                <th scope="col" style="padding-left: 60px;">Tuy chon</th>
                <th scope="col">Tong tien</th>
            </tr>
            </thead>
            <tbody>
            <?php $stt=1; foreach($_SESSION['cart'] as $key => $value): ?>
                <tr>
                    <th scope="row"><?php echo $stt; ?></th>
                    <td><?php echo $value['name'] ?></td>
                    <td>
                        <img src="<?php echo base_url()?>/public/uploads/xe/<?php echo $value['hinhanh']?>"
                                width=100px height=100px alt=""></td>
                    <td class="text-center">
                        <input type="number" min="0" class="qty" value="<?php echo $value['soluong'] ?>" style="width: 50px">
                    </td>
                    <td class="">
                        <?php
                            $date = ($value['ngaydat']->diff($value['ngaytra']))->format('%d ngay %h gio %i phut');
                            preg_match_all('!\d+!', $date, $matches);
                            $days = intval($matches['0']['0']);
                            $hours = intval($matches['0']['1']);
                            $min = intval($matches['0']['2']);
                        ?>
                        <input readonly type="text" min="0" class="qty" value="<?php echo $date ?>" style="">
                    </td>
                    <td><?php echo number_format(intval($value['gia'])); ?></td>
                    <td>
                        <a class="btn btn-danger" style="margin-right: 25px" href="remove.php?id=<?php echo $key?>"><i class="fa fa-trash-alt"></i> Xoa</a>
                        <a href="#" class="btn btn-primary update-cart" data-key=<?php echo $key ?>><i  id="update-icon" class="fa fa-sync"></i> Cap nhat</a>
                    </td>
                    <td><?php echo number_format($value['gia'] * ($days*24 + $hours + ($min/60)) *  $value['soluong']) ?></td>
                </tr>
            <?php $tMoney += $value['gia'] * ($days*24 + $hours + ($min/60)) *  $value['soluong']; $_SESSION['tongtien'] = $tMoney; ?>
            <?php $tQuaty += $value['soluong'];$_SESSION['tongxe'] = $tQuaty;?>
            <?php $stt ++;endforeach;?>
            </tbody>
        </table>
        <div class="col-md-5 col-md-offset-7" style="margin-top: 30px">
            <ul class="list-group list-group-flush" style="font-size: 20px;">
                <li class="list-group-item list-group-item-info text-capitalize text-center"><h3>Thong tin don dat xe</h3></li>
                <li class="list-group-item">So luong xe
                    <span class="badge badge-primary badge-pill"><?php echo $_SESSION['tongxe']?></span>
                </li>
                <li class="list-group-item">Tong tien
                    <span class="badge badge-primary badge-pill"><?php echo number_format($_SESSION['tongtien'])?>  VND </span>
                </li>
                <li class="list-group-item">
                    <a href="bao-gia.php" class="btn btn-success">Tiep tuc chon xe</a>
                    <a href="luu-hoa-don.php" onclick="base_url()" class="btn btn-primary">Luu hoa don</a>
                </li>
            </ul>
        </div>
        <p class="text-light"><span class="text-danger">*</span> Cột "Giá" trên được tính theo giờ</p>
    </div>

</div>
<?php echo require_once __DIR__ . "/layouts/footer.php" ?>