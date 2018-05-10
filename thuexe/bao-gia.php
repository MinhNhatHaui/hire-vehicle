<?php require_once __DIR__. "/autoload/autoload.php"; ?>

<?php require_once __DIR__. "/layouts/header.php"; ?>

<div class="row content">
    <div class="col-md-9 trai" style="padding-left: 61px; padding-top: 28px">
        <h1 class=" text-warning text-info text-center">------------ Danh sach xe ------------</h1>
        <?php foreach ($ds_xe as $item):?>
        <div class="col-md-3" style="margin-top: 50px">
            <div class="card h-100" style="border-right: 2px solid red;margin-top: 50px;">
                <a href="#"><img class="card-img-top" src="<?php echo base_url()?>public/uploads/xe/<?php echo $item['hinhanh'] ?>"
                                  alt="" width="150px" height="100px"></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#"><?php echo $item['tenxe']?></a>
                    </h4>
                    <h5><strong>Gia:</strong> <?php echo $item['gia']?></h5>
                </div>
                <div class="card-footer">
                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>

    <?php echo require_once __DIR__. "/layouts/quick-links.php"?>

</div>
<?php echo require_once __DIR__. "/layouts/footer.php"?>