<?php

$dir = require_once"../admin/config/config.php";

require_once $dir."admin/controller/Admin.php";

$email = "admin1@test.com";
$password = "K@Passw0rd";



$reg = new Admin;
var_dump( $reg->tempLogin($email, $password));
?>
