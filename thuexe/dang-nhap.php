<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thue xe gia re</title>
    <link rel="icon"  href="/public/uploads/admins/manager.png" />
    <link href="/public/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="/public/css/dang-nhap.css">
    <!------ Include the above in your HEAD tag ---------->
</head>
<?php
require_once __DIR__. "/autoload/autoload.php";
$data =
    [
        'name' => postInput('name'),
        'password' =>postInput('password')
    ];
$error = [];
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if($data['name'] == '')
    {
        $error['name'] = "Ten dang nhap khong duoc de trong ";
    }

    if($data['password'] == '')
    {
        $error['password'] = "Mat khau khong duoc de trong";
    }

    if(empty($error))
    {
        $is_check = $db->fetchOne('quantrivien',"name = '".$data['name']."' AND password = '".md5($data['password'])."' ");
//        var_dump($is_check);
        if($is_check == NULL)
        {
            $error['fail'] = "Tên đăng nhập hoặc mật khẩu chưa chính xác";
        }
        else{
            $_SESSION['name_admin'] = $is_check['name'];
            $_SESSION['id_admin'] = $is_check['id'];
            echo "<script>
                        alert('Dang nhap thanh cong');
                        location.href='/admin';
                  </script>";
        }
    }
}


?>
<body>
<section class="login-block">
    <div class="container">
        <div class="row">
            <div class="col-md-4 login-sec">
                <h2 class="text-center">Login Now</h2>
                <?php if (isset($error['fail'])): ?>
                    <br>
                    <p class="danger alert-danger"> <?php echo $error['fail'] ?></p>
                <?php endif;?>
                <form class="login-form" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase">Username</label>
                        <input type="text" class="form-control" placeholder="admin123" name="name">
                        <?php if (isset($error['name'])): ?>
                            <br>
                        <p class="danger alert-danger"> <?php echo $error['name'] ?></p>
                        <?php endif;?>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                        <input type="password" class="form-control" placeholder="*******" name="password">
                    </div>
                    <?php if(isset($error['password'])):?>
                    <br>
                    <p class="danger alert-danger"><?php echo $error['password'] ?></p>
                    <?php endif;?>


                    <div class="form-check">
                        <!--<label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            <small>Remember Me</small>
                        </label>-->
                        <button type="submit" class="btn btn-login float-right">Dang nhap</button>
                    </div>

                </form>
            </div>
            <div class="col-md-8 banner-sec">
                <div id="carousel-id" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-id" data-slide-to="0" class=""></li>
                        <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                        <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
                    </ol>
                    <div id="carousel-id" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators" style="list-style-type: none">
                            <li data-target="#carousel-id" data-slide-to="0" class=""></li>
                            <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                            <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item">
                                <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide" src="<?php echo base_url()?>public/image/simpleslide/image1.jpg" width="100%" style="min-height: 500px;">
                            </div>
                            <div class="item">
                                <img data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" src="<?php echo base_url()?>public/image/simpleslide/image2.jpg"  width="100%" style="min-height: 500px;">
                            </div>
                            <div class="item active">
                                <img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="<?php echo base_url()?>public/image/simpleslide/image2.jpg" width="100%" style="min-height: 500px;">
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
</section>

</body>
</html>