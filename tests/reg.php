<?php

$dir = require_once"../admin/config/config.php";

require_once $dir."admin/controller/User.php";

$email = "test@test.com";
$phone = "0712355355";
$name = "John test";
$password = "K@Password";



$reg = new User;
$reg->tempReg($name, $email, $phone, $password);
?>