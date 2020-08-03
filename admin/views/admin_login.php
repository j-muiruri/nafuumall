<?php
/**
 * Admin Login
 */

$dir = require_once"../config/config.php";

if (isset($_SESSION['active'])) {

    header("Location: admin.php");
}
else {

    require_once $dir."admin/controller/Admin.php";

    $admin = new Admin;
    $msg = "";

    if ($_POST['login']) {
        $login = $admin ->adminLogin();
        if ($login['login'] === true) {
            # code...
            $_SESSION['active'] = $login['id'];

            header("Location: admin.php");
        } else {
            $error = $login['error'];
            $msg = '<div class="alert alert-danger alert-dismissible " role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span>
                                </button>
                                <strong>'.$error.'</strong>
                            </div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nafuumall Admin Login| </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="POST">
                        <h1>Admin Login Form</h1>
                        <div>
                            <?php echo $msg; ?>
                            <input type="email" class="form-control" name="email" placeholder="Email address"
                                required/>
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="password"
                                required/>
                            <input type="hidden" name="login"  value ="1" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Log in</button></a>
                            <a class="reset_pass" href="#">Lost your password?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i>Nafuumall Seller Portal</h1>
                                <p>©2020 All Rights Reserved.</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>

</body>

</html>