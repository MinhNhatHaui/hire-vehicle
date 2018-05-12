<?php

    session_start();
    require_once __DIR__ . "/../libraries/Database.php";
    require_once __DIR__.  "/../libraries/Funtions.php";
    $db = new Database;


    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/public/uploads/");

    $ds_xe = $db->fetchAll("xe");


    //Loc xe
    $getXeMay = "SELECT * FROM xe INNER JOIN loai WHERE xe.maloai = loai.maloai AND tenloaixe = 'Xe máy'";
    $listMoto = $db->fetchSql($getXeMay);

    $getXeDapDien = "SELECT * FROM xe INNER JOIN loai WHERE xe.maloai = loai.maloai AND tenloaixe = 'Xe đạp điện'";
    $listElecBike = $db->fetchSql($getXeDapDien);

    $getXeDap = "SELECT * FROM xe INNER JOIN loai WHERE xe.maloai = loai.maloai AND tenloaixe = 'Xe đạp'";
    $listBike = $db->fetchSql($getXeDap);

?>
