<?php


$dir = require_once"../admin/config/config.php";

require_once $dir."admin/controller/Admin.php";

$product = new Admin;

$result = $product->listAdmins();

// var_dump($result);

foreach ($result as $row) {
    # code...
    echo $row['email']."\n";
}

?>