<?php

$dir = require_once"../admin/config/config.php";

require_once $dir."admin/controller/Admin.php";

$email = "test@test.com";

$password = "K@Password";



$reg = new Admin;
echo $reg->adminLogin($email, $password);
?>
