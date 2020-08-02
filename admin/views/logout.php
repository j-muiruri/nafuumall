<?php
$dir = require_once"../config/config.php";

session_destroy();

header("Location: admin_login.php");