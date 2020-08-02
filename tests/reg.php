<?php

$dir = require_once"../admin/config/config.php";

require_once $dir."admin/controller/Admin.php";

$email = "admin1@test.com";
$phone = "0711000000";
$name = "John DevTest";
$password = "K@Passw0rd";

//admin
$reg = new Admin;
//user
// $reg = new User;
$reg->tempReg($name, $email, $phone, $password);
?>