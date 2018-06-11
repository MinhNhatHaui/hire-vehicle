<?php
/**
 * Created by PhpStorm.
 * User: minhnhat
 * Date: 20/05/2018
 * Time: 22:05
 */
    session_start();
    unset($_SESSION['name_admin']);
    unset($_SESSION['id_admin']);

    echo "<script>
            location.href='/admin/dang-nhap.php';
        </script>";


?>