<?php

$dir = require_once"../admin/config/config.php";

// require_once $dir."admin/controller/Admin.php";

require_once $dir."admin/controller/Seller.php";

$email = "admin2@test.com";
$phone = "0711000000";
$name = "John DevTest";
$password = "K@Passw0rd";

//admin
// $reg = new Admin;
$seller = new Sellers;
//user
// $reg = new User;
// $result = $reg->tempReg($name, $email, $phone, $password);
$referral = "N/A" ;
$national_id = "123456789";
$gender = "female" ;
$dob = date("y-m-d", time());
$display = "Xpat2 Phones";
$contract = 1;
$result = $seller->tempReg($name, $email, $phone, $referral, $national_id, $gender, $dob, $display, $contract, $password);

var_dump($result);
