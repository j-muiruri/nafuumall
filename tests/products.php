<?php


$dir = require_once"../admin/config/config.php";

require_once $dir."admin/controller/Products.php";

$product = new Products;

$result = $product->AllProducts();
// $id = 5;
// $result = $product->singleProducts($id);

var_dump($result);