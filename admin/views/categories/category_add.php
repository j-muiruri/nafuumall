<?php
/**
 * Add Categories Form
 */

//Include main Directory
$dir= require_once"../../config/config.php";

//assets dir
$asset = require_once"../../config/assets.php";

//check user login
if (isset($_SESSION['active'])) {
    require_once $dir."admin/controller/Admin.php";

    $admin = new Admin;

    $id = $_SESSION['active'];

    $userInfo = $admin->getAdmin($id);



    if ($_POST['cat_add']) {
        require_once $dir."admin/controller/Category.php";

        $cats = new Category;
        $msg = "";

        $add = $cats->createCategory();

        if ($add['add_cat'] === true) {

            // echo "Trueeeeeeeeeeeeeee";
            $error = "Category Created!";
            $msg = '<div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span>
                                </button>
                                <strong>'.$error.'</strong>
                            </div>';
        } else {
            $error = $add['error'];
            $msg = '<div class="alert alert-danger alert-dismissible " role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span>
                                </button>
                                <strong>'.$error.'</strong>
                            </div>';
        }
    }
} else {
    header("Location: ../admin_login.php");
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

    <title>Nafuumall Admin! | Add Category </title>

    <!-- Bootstrap -->
    <link href=<?php echo $asset."vendors/bootstrap/dist/css/bootstrap.min.css"; ?> rel="stylesheet">
    <!-- Font Awesome -->
    <link href=<?php echo $asset."vendors/font-awesome/css/font-awesome.min.css"; ?> rel="stylesheet">
    <!-- NProgress -->
    <link href=<?php echo $asset."vendors/nprogress/nprogress.css"; ?> rel="stylesheet">
    <!-- iCheck -->
    <link href=<?php echo $asset."vendors/iCheck/skins/flat/green.css"; ?> rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href=<?php echo $asset."vendors/google-code-prettify/bin/prettify.min.css"; ?> rel="stylesheet">
    <!-- Select2 -->
    <link href=<?php echo $asset."vendors/select2/dist/css/select2.min.css"; ?> rel="stylesheet">
    <!-- Switchery -->
    <link href=<?php echo $asset."vendors/switchery/dist/switchery.min.css"; ?> rel="stylesheet">
    <!-- starrr -->
    <link href=<?php echo $asset."vendors/starrr/dist/starrr.css"; ?> rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href=<?php echo $asset."vendors/bootstrap-daterangepicker/daterangepicker.css"; ?> rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href=<?php echo $asset."build/css/custom.min.css"; ?> rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="admin.php" class="site_title"><i class="fa fa-paw"></i> <span>Nafumall
                                Admin</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <?php
  include_once 'menu_profile.php';
?>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <?php
  include_once 'sidebar_menu.php';
?>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="../logout.php">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <?php
  include_once 'top_navigation.php';
?>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Create/Add New Category</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Add Category <small>Fill all required fields</small></h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div>
                                        <?php echo $msg; ?>
                                    </div>
                                    <br />
                                    <form id="category" method ="POST" data-parsley-validate class="form-horizontal form-label-left">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="col-md-6 col-sm-6">
                                                <div class=" item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                        for="cat_name">Category Name<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <input type="text" id="cat_name" name="cat_name"
                                                            required="required" class="form-control ">
                                                            <input type="hidden" id="cat_add" name="cat_add" value ="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">

                                                <div class="ln_solid"></div>
                                                <div class="item form-group">
                                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                                        <button class="btn btn-danger" type="reset">Reset</button>
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                    </div>
                                                </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <!-- <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer> -->
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src=<?php echo $asset."vendors/jquery/dist/jquery.min.js"; ?>></script>
    <!-- Bootstrap -->
    <script src=<?php echo $asset."vendors/bootstrap/dist/js/bootstrap.bundle.min.js"; ?>></script>
    <!-- FastClick -->
    <script src=<?php echo $asset."vendors/fastclick/lib/fastclick.js"; ?>></script>
    <!-- NProgress -->
    <script src=<?php echo $asset."vendors/nprogress/nprogress.js"; ?>></script>
    <!-- bootstrap-progressbar -->
    <script src=<?php echo $asset."vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"; ?>></script>
    <!-- iCheck -->
    <script src=<?php echo $asset."vendors/iCheck/icheck.min.js"; ?>></script>
    <!-- bootstrap-daterangepicker -->
    <script src=<?php echo $asset."vendors/moment/min/moment.min.js"; ?>></script>
    <script src=<?php echo $asset."vendors/bootstrap-daterangepicker/daterangepicker.js"; ?>></script>
    <!-- bootstrap-wysiwyg -->
    <script src=<?php echo $asset."vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"; ?>></script>
    <script src=<?php echo $asset."vendors/jquery.hotkeys/jquery.hotkeys.js"; ?>></script>
    <script src=<?php echo $asset."vendors/google-code-prettify/src/prettify.js"; ?>></script>
    <!-- jQuery Tags Input -->
    <script src=<?php echo $asset."vendors/jquery.tagsinput/src/jquery.tagsinput.js"; ?>></script>
    <!-- Switchery -->
    <script src=<?php echo $asset."vendors/switchery/dist/switchery.min.js"; ?>></script>
    <!-- Select2 -->
    <script src=<?php echo $asset."vendors/select2/dist/js/select2.full.min.js"; ?>></script>
    <!-- Parsley -->
    <script src=<?php echo $asset."vendors/parsleyjs/dist/parsley.min.js"; ?>></script>
    <!-- Autosize -->
    <script src=<?php echo $asset."vendors/autosize/dist/autosize.min.js"; ?>></script>
    <!-- jQuery autocomplete -->
    <script src=<?php echo $asset."vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"; ?>></script>
    <!-- starrr -->
    <script src=<?php echo $asset."vendors/starrr/dist/starrr.js"; ?>></script>

    <!-- PNotify -->
    <script src=<?php echo $asset."vendors/pnotify/dist/pnotify.js"; ?>></script>
    <script src=<?php echo $asset."vendors/pnotify/dist/pnotify.buttons.js"; ?>></script>
    <script src=<?php echo $asset."vendors/pnotify/dist/pnotify.nonblock.js"; ?>></script>

    <!-- Custom Theme Scripts -->
    <script src=<?php echo $asset."build/js/custom.min.js"; ?>></script>

</body>

</html>