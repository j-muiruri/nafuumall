<?php

$dir = require_once"admin/config/config.php";

require_once $dir."admin/controller/User.php";

$email = "test@test.com";

$password = "K@Password";



$reg = new User;
var_dump( $reg->tempLogin($email, $password));
?>
