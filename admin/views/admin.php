<?php
/**
 * Admin Index
 */

$dir = require_once"../config/config.php";

 //check if uiser is logged in

 if (isset($_SESSION['active'])) {
     require_once $dir."admin/controller/Admin.php";
     require_once $dir."admin/controller/User.php";
     require_once $dir."admin/controller/Category.php";
     require_once $dir."admin/controller/Products.php";

     $admin = new Admin;
     $user = new User;
     $cat = new Category;
     $product = new Products;

     $id = $_SESSION['active'];

     $userInfo = $admin->getAdmin($id);

     $adminList = $admin->listAdmins();
     $sellers = $user->listUsers();


     $category= $cat->AllCategories();
     $subcategory = $cat->allSubs();
     $products = $product->AllProducts();

 } else {
     header("Location: admin_login.php");
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
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
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
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
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
                            <!-- <h3>Tables <small>Some examples to get you started</small></h3> -->
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row" style="display: block;">
                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Admin Table <small>basic table subtitle</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <table id="admin_users"
                                        class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Full Name</th>
                                                <th>Email Address</th>
                                                <th>Phone No</th>
                                                <th>Active</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id = 1;
foreach ($adminList as $row):
?>
                                            <tr>
                                                <th scope="row"><?php echo $id; ?></th>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['phone']; ?></td>
                                                <td><?php echo $row['verified']; ?></td>
                                            </tr>
                                            <?php
                                            ++$id;
endforeach;
?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Sellers table <small>Stripped table subtitle</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <table id="sellers" class="table table-striped table-bordered dt-responsive nowrap"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Full Name</th>
                                                <th>Email Address</th>
                                                <th>Phone No</th>
                                                <th>Display Name</th>
                                                <th>Active</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
$id = 1;
foreach ($sellers as $row):
?>
                                            <tr>
                                                <th scope="row"><?php echo $id; ?></th>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['email_address']; ?></td>
                                                <td><?php echo $row['phone']; ?></td>
                                                <td><?php echo $row['display_name']; ?></td>
                                                <td><?php echo $row['verified']; ?></td>
                                                </tr>
                                            <?php
                                            ++$id;
endforeach;
?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Categories <small>Try hovering over the rows</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table id="categories"
                                        class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Category Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
$id = 1;
foreach ($category as $row):
?>
                                            <tr>
                                                <th scope="row"><?php echo $id; ?></th>
                                                <td><?php echo $row['cat_name']; ?></td>
                                                </tr>
                                            <?php
                                            ++$id;
endforeach;
?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Sub Categories table <small>Bordered table subtitle</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <table id="sub_categories"
                                        class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Sub Category Name</th>
                                                <th>Category</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
$id = 1;
foreach ($subcategory as $row):
?>
                                            <tr>
                                                <th scope="row"><?php echo $id; ?></th>
                                                <td><?php echo $row['sub_name']; ?></td>

                                                <td><?php echo $row['cat_id']; ?></td>


                                                </tr>
                                            <?php
                                            ++$id;
endforeach;
?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Products Table <small></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                                    <!-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row
                                        select</p> -->

                                    <div class="table-responsive">
                                        <table id="products"
                                            class="table table-striped table-bordered dt-responsive nowrap"
                                            cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product Name</th>
                                                    <th>Category Name</th>
                                                    <th>Sub Category Name</th>
                                                    <th>Current Price</th>
                                                    <th>Initial Price</th>
                                                    <th>Short Description</th>
                                                    <th>Long Description</th>
                                                    <th>Type</th>
                                                    <th>Discount</th>
                                                    <th>Availability</th>
                                                    <th>Warranty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
$id = 1;
foreach ($products as $row):
?>
                                            <tr>
                                                <th scope="row"><?php echo $id; ?></th>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['cat_name']; ?></td>
                                                <td><?php echo $row['sub_name']; ?></td>
                                                <td><?php echo $row['current_price']; ?></td>
                                                <td><?php echo $row['initial_price']; ?></td>
                                                <td><?php echo $row['short_description']; ?></td>
                                                <td><?php echo substr( $row['long_description'], 0, 100) ?>"..."</td>
                                                <td><?php echo $row['type']; ?></td>
                                                <td><?php echo $row['discount']; ?></td>
                                                <td><?php echo $row['availability']; ?></td>
                                                <td><?php echo $row['warranty']; ?></td>
                                            </tr>
<?php
++$id;
endforeach;
?>
                                            </tbody>
                                        </table>
                                    </div>


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
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#admin_users').DataTable();
        $('#sellers').DataTable();
        $('#categories').DataTable();
        $('#sub_categories').DataTable();
        $('#products').DataTable();
    });
    </script>
</body>

</html>