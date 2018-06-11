<?php

    session_start();
    require_once __DIR__ . "/../libraries/Database.php";
    require_once __DIR__.  "/../libraries/Funtions.php";

    $db = new Database;

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $today = date("Y-m-d");
    $time = date("H:i");


    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/public/uploads/");

    $ds_xe = $db->fetchAll("xe");


    //Loc xe
    //$getXeMay = "SELECT * FROM xe INNER JOIN loai WHERE xe.maloai = loai.maloai AND tenloaixe = 'Xe máy'";
    $getXeMay = "SELECT * FROM xe WHERE maloai = 1 and soluong <> 0";
    $listMoto = $db->fetchSql($getXeMay);
    $totalMoto = count($listMoto);
    //var_dump($totalMoto);

    //$getXeDapDien = "SELECT * FROM xe INNER JOIN loai WHERE xe.maloai = loai.maloai AND tenloaixe = 'Xe đạp điện'";
    $getXeDapDien = "SELECT * FROM xe WHERE maloai = 2 and soluong <> 0";
    $listElecBike = $db->fetchSql($getXeDapDien);

    //$getXeDap = "SELECT * FROM xe INNER JOIN loai WHERE xe.maloai = loai.maloai AND tenloaixe = 'Xe đạp'";
    $getXeDap = "SELECT * FROM xe WHERE maloai = 3 and soluong <> 0";
    $listBike = $db->fetchSql($getXeDap);

?>
