<?php require_once __DIR__ . "/autoload/autoload.php"; ?>
<?php
$sql = "SELECT maloai, tenloaixe FROM loai";
$resSql = $db->fetchSql($sql);

foreach ($resSql as $item) {
    $maloai = intval($item['maloai']);
    $id_maloai = "SELECT * FROM xe WHERE maloai = $maloai AND status <> 0";
    $res_idmaloai = $db->fetchSql($id_maloai);
//    var_dump($id_maloai);
    $data[$item['tenloaixe']] = $res_idmaloai;
}
//    var_dump($data);
?>


<?php require_once __DIR__ . "/layouts/header.php"; ?>


    <div class="row content">
        <div class="col-md-9 trai" style="padding-left: 60px;padding-bottom: 50px;">
            <div class="row">
                <?php foreach ($data as $key => $value): ?>
<!--                o day co the phan trang rieng cho tung muc-->
                    <?php foreach ($value as $item): ?>
                            <div class="card col-md-3" style="margin-bottom: 20px; border-top: 1px solid grey">
                                <a href="chi-tiet-xe.php?maxe=<?php echo $item['maxe']?>">
                                    <img class="card-img-top" style="margin-top: 5px"
                                         src="<?php echo base_url() ?>public/uploads/xe/<?php echo $item['hinhanh'] ?>"
                                         alt="" width="200px" height="200px">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#"><?php echo $item['tenxe'] ?></a>
                                    </h4>
                                    <h5><strong>Gia:</strong> <?php echo number_format($item['gia']) ?></h5>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9734; &#9734;</small>
                                </div>
                            </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>

            </div>
        </div>
        <?php echo require_once __DIR__ . "/layouts/quick-links.php" ?>

    </div>
<?php echo require_once __DIR__ . "/layouts/footer.php" ?>