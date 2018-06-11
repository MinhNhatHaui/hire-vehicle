<?php
    session_start();
    require_once __DIR__ . "/../../libraries/Database.php";
    require_once __DIR__. "/../../libraries/Funtions.php";
    $db = new Database;

    $checkDaily = "SELECT * FROM users WHERE status <> 1";
    $_SESSION['checkdaily'] = $db->fetchSql($checkDaily);

    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/public/uploads/");
?>