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
     $product= new Products;

     $id = $_SESSION['active'];

     $userInfo = $admin->getAdmin($id);


     //Delete resource
     $resource =$_GET['id'];
     $delete = $product->deleteUser($resource);

     if ($delete['delete_prod'] ===true) {
         # code...
// Record Deleted
error_log("Product Deleted");
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