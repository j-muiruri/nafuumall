<?php

$dir = require_once"../admin/config/config.php";

require_once $dir."admin/controller/Admin.php";

$admin = new Admin;

/**
 * 1. List Admin 
 * 2. get one admin
 * 3. login/reg
 * 4. disable/enable
 * 5. verify seller
 * 6. disable seller
 */

//1

// $result = $admin->listAdmins();

// var_dump($result);


// print_r(__DIR__);
//2

$id['admin_id'] = 1;
$result = $admin->getAdmin($id);

var_dump($result);