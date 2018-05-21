<?php

    session_start();
    require_once __DIR__ . "/../libraries/Database.php";
    require_once __DIR__.  "/../libraries/Funtions.php";
    $db = new Database;


    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/public/uploads/");

    $ds_xe = $db->fetchAll("xe");


    //Loc xe
    //$getXeMay = "SELECT * FROM xe INNER JOIN loai WHERE xe.maloai = loai.maloai AND tenloaixe = 'Xe máy'";
    $getXeMay = "SELECT * FROM xe WHERE maloai = 1";
    $listMoto = $db->fetchSql($getXeMay);
    $totalMoto = count($listMoto);
//var_dump($totalMoto);

//$getXeDapDien = "SELECT * FROM xe INNER JOIN loai WHERE xe.maloai = loai.maloai AND tenloaixe = 'Xe đạp điện'";
$getXeDapDien = "SELECT * FROM xe WHERE maloai = 2";
$listElecBike = $db->fetchSql($getXeDapDien);

//$getXeDap = "SELECT * FROM xe INNER JOIN loai WHERE xe.maloai = loai.maloai AND tenloaixe = 'Xe đạp'";
$getXeDap = "SELECT * FROM xe WHERE maloai = 3";
$listBike = $db->fetchSql($getXeDap);

?>
