<?php


$dir = require_once "../admin/config/config.php";

require_once $dir."admin/controller/Category.php";

$cat = new Category;

$result = $cat->AllSubs();
// $id['product_id'] = 5;
// $result = $product->singleProducts($id);

var_dump($result);