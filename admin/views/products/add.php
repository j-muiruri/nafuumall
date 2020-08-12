<?php
/**
 * Add Products Form
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


    require_once $dir."admin/controller/Category.php";
    require_once $dir."admin/controller/Seller.php";
    require_once $dir."admin/controller/User.php";


    $cat = new Category;
    $seller= new User;
    $category= $cat->AllCategories();
    $subcategory = $cat->allSubs();

    if ($_POST['add']) {
        require_once $dir."admin/controller/Products.php";

        $products = new Products;
        $msg = "";

        $add = $products->createProduct();

        if ($add['add_product'] === true) {

            // echo "Trueeeeeeeeeeeeeee";
            $error = "Product Added!";
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

    <title>Nafuumall Admin! | </title>

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
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Nafumall
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
                            <h3>Create/Add New Products </h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Add Products <small>Fill all required fields</small></h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div>
                                        <?php echo $msg; ?>
                                    </div>
                                    <br />
                                    <form id="demo-form2" method ="POST" data-parsley-validate class="form-horizontal form-label-left">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                        for="seller_id">Seller ID/Name<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <select class="form-control" name="seller_id" required>
                                                            <option value="" selected>Choose Seller - Display Name
                                                            </option>
                                                            <?php

                                                            $sellerList =  $seller->listUsers();
                                                            foreach($sellerList as $row):


                                                            ?>
                                                            <option value="<?php echo $row['seller_id']; ?>" ><?php echo $row['name']; ?> - <?php echo $row['display_name']; ?>
                                                            </option>
                                                            <?php
                                                            endforeach;
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class=" item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                        for="product_name">Product Name<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <input type="text" id="product_name" name="product_name"
                                                            required="required" class="form-control ">
                                                    </div>
                                                </div>
                                                <div class=" item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                        for="short_description">Short Description<span
                                                            class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <input type="text" id="short_description"
                                                            name="short_description" required="required"
                                                            class="form-control ">
                                                    </div>
                                                </div>
                                                <div class=" item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                        for="long_description">Long Description<span
                                                            class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <textarea id="long_description" name="long_description"
                                                            required="required" rows="5" class="form-control "></textarea>
                                                    </div>
                                                </div>
                                                <div class=" item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                        for="current_price">Current Price<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <input type="number" id="current_price" name="current_price"
                                                            required="required" class="form-control ">
                                                    </div>
                                                </div>
                                                <div class=" item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                        for="initial_price">Initial Price<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <input type=="number" id="initial_price" name="initial_price"
                                                            required="required" class="form-control ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">

                                                <div class="item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                        for="discount">Discount<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <input type="number" id="discount" name="discount"
                                                            required="required" class="form-control ">
                                                    </div>
                                                </div>
                                                <div class="item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                        for="cat_name">Category<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <select class="form-control"   name="cat_name" required>
                                                            <option value="" selected>Choose
                                                                Category</option>
                                                                <?php
                                                            $catList = $cat->AllCategories();
                                                            // var_dump($catList);
                                                            foreach($catList as $row):
                                                            ?>
                                                            <option value="<?php echo $row['cat_name']; ?>" ><?php echo $row['cat_name']; ?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                        for="sub_name">Sub Category<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <select class="form-control" name="sub_name" required>
                                                            <option value=""  selected>
                                                                Choose Sub Category</option>
                                                                <?php
                                                            $catList = $cat->allSubs();
                                                            // var_dump($catList);
                                                            foreach($catList as $row):
                                                            ?>
                                                            <option value="<?php echo $row['sub_name']; ?>" ><?php echo $row['sub_name']; ?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                        for="type">Type<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <select class="form-control" name="type" required>
                                                            <option value=""  selected>Choose Type
                                                            </option>
                                                            <option value="Featured" >Featured</option>
                                                            <option value="Normal" >Normal</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                        for="availability">Availability<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <select class="form-control" name="availability" required>
                                                            <option value=""  selected>
                                                                Choose Availability</option>
                                                            <option value="Locally" >Locally
                                                            </option>
                                                            <option value="Overseas" >Overseas
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                        for="warranty">Warranty<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <select class="form-control" name="warranty" required>
                                                            <option value=""  selected>Choose
                                                            Warranty</option>
                                                            <option value="1 Year Warranty" >1 Year
                                                            </option>
                                                            <option value="2 Year Warranty" >2 Years
                                                            </option>
                                                            <option value="3 Year Warranty" >3 Years
                                                            </option>
                                                            <option value="4 Year Warranty" >4 Years
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class=" item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                            for="image_1">Image 1<span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input id="image_1" class="form-control" type="file" style=""
                                                                accept=".jpg, .png" name="image_1">
                                                        </div>
                                                </div>
                                                <div class=" item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                            for="image_2">Image 2
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input id="image_2" class="form-control" type="file" style=""
                                                                accept=".jpg, .png" name="image_2">
                                                        </div>
                                                </div>
                                                <div class=" item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                            for="image_3">Image 3
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input type ="hidden" name ="add" value = "1">
                                                            <input id="image_3" class="form-control" type="file" style=""
                                                                accept=".jpg, .png" name="image_3">
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12">

                                                <div class="ln_solid"></div>
                                                <div class="item form-group">
                                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                                        <button class="btn btn-sm  btn-danger" type="reset">Reset</button>
                                                        <button type="submit" class="btn btn-sm btn-success">Submit</button>
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