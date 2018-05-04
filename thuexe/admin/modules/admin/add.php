<?php
$open = 'admin';
require_once __DIR__. "/../../autoload/autoload.php";

    $admin = $db->fetchAll('quantrivien');

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $data = [];
    }


?>