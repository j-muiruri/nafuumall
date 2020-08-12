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
     $delete = $admin->deleteAdmin($catid);

     if ($delete['delete_admin'] ===true) {
         # code...
// Record Deleted
error_log("User admin Deleted");
         header("Location: admin_list.php");
     }
     else {
         # code...
         
         header("Location: admin_list.php");
     }


 } else {
     header("Location: ../admin_login.php");
 }

?>