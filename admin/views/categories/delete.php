<?php
/**
 * Category and Subcategory Management
 */

$dir = require_once"../../config/config.php";

 //check if uiser is logged in

 if (isset($_SESSION['active'])) {
     require_once $dir."admin/controller/Admin.php";
     require_once $dir."admin/controller/User.php";
     require_once $dir."admin/controller/Category.php";

     $admin = new Admin;
     $user = new User;
     $cat = new Category;

     $id = $_SESSION['active'];

     $userInfo = $admin->getAdmin($id);


     //Delete resource
     $catid =$_GET['id'];
     $delete = $cat->deleteCategory($catid);

     if ($delete['delete_cat'] ===true) {
         # code...
// Record Deleted
error_log("Category Deleted");
         header("Location: categories_list.php");
     }
     else {
         # code...
         
         header("Location: categories_list.php");
     }


 } else {
     header("Location: ../admin_login.php");
 }

?>