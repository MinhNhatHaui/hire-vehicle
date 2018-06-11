<?php require_once __DIR__. "/autoload/autoload.php"; ?>

<?php require_once __DIR__. "/layouts/header.php"; ?>
<div class="row " id="slide">
    <div class="col-md-12 ">
        <div id="carousel-id" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators" style="list-style-type: none">
                <li data-target="#carousel-id" data-slide-to="0" class=""></li>
                <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item">
                    <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide" src="<?php echo base_url()?>public/image/simpleslide/image1.jpg" width="100%">
                </div>
                <div class="item">
                    <img data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" src="<?php echo base_url()?>public/image/simpleslide/image2.jpg"  width="100%">
                </div>
                <div class="item active">
                    <img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="<?php echo base_url()?>public/image/simpleslide/image2.jpg" width="100%">
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>
</div>
<div class="row content "  >
    <div class="col-md-9 trai" >
        <div class="info">
            <h3>Chuc nang dang trong giai doan nang cap, moi quy khach ghe tham luc khac.</h3>
            <h3>Xin cam on!</h3>
            <img src="/public/image/under-maintenance.jpg" width="100%" height="550px" alt="">
        </div>
    </div>
    <?php echo require_once __DIR__. "/layouts/quick-links.php"?>
</div>
<!-- end content -->
<?php echo require_once __DIR__. "/layouts/footer.php"?>
