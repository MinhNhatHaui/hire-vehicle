<?php

    session_start();
    require_once __DIR__ . "/../libraries/Database.php";
    require_once __DIR__.  "/../libraries/Funtions.php";
    $db = new Database;


    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/public/uploads/");

    $ds_loaixe = $db->fetchAll("loai");
    $ds_xe = $db->fetchAll("xe");
?>