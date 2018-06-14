<?php require_once __DIR__. "/autoload/autoload.php"; ?>

<?php

if (isset($_GET['p'])){
    $p = $_GET['p'];
}else
{
    $p = 1;
}
$pageginate = $db->fetchJones('xe',$getXeMay,$totalMoto,$p,4,true);
$sotrang = $pageginate['page'];
unset($pageginate['page']);

$path = $_SERVER['SCRIPT_NAME'];
?>

<?php require_once __DIR__. "/layouts/header.php"; ?>

    <div class="row content">
        <div class="col-md-9 trai" style="padding-left: 60px;padding-bottom: 50px;">
            <div class="row">
                <h1 class=" text-warning text-info text-center">------------ Danh sach xe ------------</h1>
                <?php foreach ($pageginate as $item):?>
                <div class="col-md-3">
                <div class="card h-100" style="border-right: 2px solid red;margin-top: 50px;">
                    <a href="chi-tiet-xe.php?maxe=<?php echo $item['maxe']?>"><img class="card-img-top" src="<?php echo base_url()?>public/uploads/xe/<?php echo $item['hinhanh'] ?>"
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
        <div class="row text-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination ">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <?php for($i=1; $i <= $sotrang; $i++): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo $path?>?p=<?php echo $i; ?>"><?php echo $i?></a></li>
                    <?php endfor;?>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        </div>

        <?php echo require_once __DIR__. "/layouts/quick-links.php"?>

    </div>
<?php echo require_once __DIR__. "/layouts/footer.php"?>