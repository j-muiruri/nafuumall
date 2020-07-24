<?php
// use User;
require_once "admin/controller/User.php";

$email = "test@test.com";
$phone = "0712355355";
$name = "John test";
$password = "K@Password";



$reg = new User;
$reg->tempReg($name, $email, $phone, $password);
?>