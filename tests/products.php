<?php


$dir = require_once"admin/config/config.php";

require_once $dir."admin/controller/Products.php";

$product = new Products;

var_dump($product->AllProducts());