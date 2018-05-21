<?php require_once __DIR__ . "/autoload/autoload.php"; ?>
<?php
    $maxe = getInput('maxe');
    $getXe = $db->fetchOne('xe'," maxe = $maxe ");

    //Lay ra danh sach xe khac dua tren loai xe
    $sql = "SELECT maloai FROM xe WHERE maxe = $maxe";
    $resSql = $db->fetchSql($sql);
    foreach ($resSql as $key) :
        $maloai = intval($key['maloai']);
    endforeach;
    $xeKhac = "SELECT * FROM xe WHERE maloai = $maloai";
    $resXeKhac = $db->fetchSql($xeKhac);
?>
<?php require_once __DIR__ . "/layouts/header.php"; ?>
    <div class="row content">
        <div class="col-md-9 trai" style="padding-left: 60px;padding-bottom: 50px;">
            <div class=" row content">
                <div class="col-md-4 ml-5 content">
                    <img src="<?php base_url() ?>public/uploads/xe/<?php echo $getXe['hinhanh']?>"
                         width="300px" height="250px" alt="">
                </div>
                <div class="col-md-6 content">
                    <h3 style="margin-top: -4px;">Cho thue xe <?php echo $getXe['tenxe']?></h3>
                    <h4 style="margin-top: -4px;" class="text-muted">Gia thue: <span class="text-warning text-capitalize"><?php echo number_format($getXe['gia'])?>  VND</span> </h4>
                    <h4>So luong:
                        <input type="number" style="width: 50px" placeholder="0" min="0" max="30">
                    </h4>
                    <br>
                    <div class="right">
                        <a href="customer-form.php?ma-xe=<?php echo $maxe?>" id="accept" class="btn btn-info">THUE XE
                            <span>  </span>
                        </a>
                        <br />
                    </div>
                </div>
            </div>
            <div class="row content ml-5">
                <p>
                    <button class="btn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Mo ta
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td>Dong co</td>
                                <td><?php echo $getXe['dong_co']?></td>
                            </tr>
                            <tr>
                                <td>Cong suat</td>
                                <td><?php echo $getXe['cong_suat']?></td>
                            </tr>
                            <tr>
                                <td>Dung tich xang</td>
                                <td><?php echo $getXe['dung_tich_xang']?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <p class="p1">Giá cho thuê xe máy chi tiết như sau:</p>
                <p class="p1">Thuê theo tháng giá: 150,000đ/ngày</p>
                <p class="p1">Thời gian thuê từ 1 đến 2 ngày giá: 300,000đ/ngày</p>
                <p class="p1">thời gian thuê từ 3 đến dưới 30 ngày giá: 350,000đ/ngày</p>
                <p class="p2"> </p>
                <p class="p1">Thủ tục cần 1 trong những giấy tờ sau: Chứng minh nhân dân, Hộ chiếu, Passport, Hộ khẩu, bằng lái xe hoặc giấy tờ tuỳ thân có hình khác.</p>
                <p class="p1">Tiền thế chân từ:  40,000,000đ(tuỳ từng trường hợp cụ thể cty sẽ có chính sách cho từng người)</p>
                <p class="p1">Khách phải thanh toán tiền thuê xe và tiền thế chân trước, khi nào trả xe sẽ trả lại tiền thế chân.</p>
                <p class="p2"> </p>
                <p class="p1">Có giao xe tận nơi sân bay, bến xe, bến tàu và các quận huyện nội thành thành phố Hồ Chí Minh (chi phí sẽ tính tuỳ theo quãng đường), thuê theo tháng được miễn phí giao nhận xe trong nội thành Hồ Chí Minh.</p>
                <p class="p1">Thời gian thuê được tính 1 ngày là 24 tiếng, quá thời gian 24 tiếng sẽ tính thêm 1 ngày.</p>
                <p class="p1">Khi thuê xe sẽ làm hợp đồng có 2 bản , mỗi bên giữ 1 bản có ký tên đóng dấu công ty.</p>
                <p class="p2"> </p>
                <p class="p1">Thời gian giao nhận xe: từ 6-23g hàng ngày, tất cả các ngày lễ tết vv…</p>
                <p class="p2"> </p>
                <p class="p1">Địa chỉ giao nhận xe như sau:</p>
                <ul class="ul1">
                    <li class="li1">Địa chỉ : Trường Đại Học Công Nghiệp Hà Nội - Bắc Từ Liêm - Nhổn .</li>
                </ul>
                <p class="p3"><span class="s1">Website: <a href="http://thuexe.haui.vn/gioi-thieu.php"><span class="s2">http://www.chothuexemaygiare.com</span></a> </span></p>

                <p class="p2"> </p>
                <p class="p1">Khách hàng có xe máy nhàn rỗi hoặc xe Ô tô nhàn rỗi có thể ký gửi cho chúng tôi cho thuê lợi nhuận sẽ được thoản thuận chi tiết sau khi xem xét xe, mọi chi tiết vui lòng liên hệ: 0913 122 111 Mr Tú. Ngoài ra chúng tôi có nhận cầm cố các loại xe máy, xe ga, xe ô tô vv.. với lãi suất hợp lý với thời gian linh hoạt.</p>
<!--                <ul>-->

            </div>
            <div class="row">
                <h2 class="text-capitalize" style="background: #cddc39">
                    <i class="fas fa-angle-double-down"></i> Hoặc bạn có thể chọn
                </h2>
                <?php foreach ($resXeKhac as $key): ?>
                <div class="col-md-4">
                            <div style="margin-bottom: 20px; border-top: 1px solid grey">
                                <a href="chi-tiet-xe.php?maxe=<?php echo $key['maxe']?>">
                                    <img class="card-img-top" style="margin-top: 5px"
                                         src="<?php echo base_url() ?>public/uploads/xe/<?php echo $key['hinhanh'] ?>"
                                         alt="" width="200px" height="200px">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#"><?php echo $key['tenxe'] ?></a>
                                    </h4>
                                    <h5><strong>Gia:</strong> <?php echo number_format($key['gia']) ?></h5>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>

                </div>
                <?php endforeach; ?>
            </div>



        </div>
        <?php echo require_once __DIR__ . "/layouts/quick-links.php" ?>

    </div>
<?php echo require_once __DIR__ . "/layouts/footer.php" ?>