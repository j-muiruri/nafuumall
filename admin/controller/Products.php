<?php

require_once $dir.'admin/config/Db.php';

require_once $dir.'admin/Model/ProductsModel.php';
/**
 * Products Controller Class
 *
 * @author John Muiruri <jontedev@gmail.com>
 */
class Products extends Database
{
    /**
     * Products data array
     */
    public $data = array();

    // /**
    //  * ID data array
    //  */
    // public $id= array();

    /**
     * List All Products
     */
     public function AllProducts()
    {
       $db = new Database;
       $model = new ProductsModel;

       return $model->getProducts($db);
       
    }
    /**
     * List Single Product Details
     */
    public function singleProducts($id)
    {
       $db = new Database;
       $model = new ProductsModel;
       $data['product_id'] = $id;
    //    print_r($id);
       return $model->getProduct($db, $data);
       
    }

    /**
     * Create a Product
     */
    public function createProduct()
    {
        $data['seller_id'] = $_POST['seller_id'];
        $data['name'] = $_POST['product_name'];
        $data['cat_name'] = $_POST['cat_name'];
        $data['sub_name'] = $_POST['sub_name'];
        $data['current_price'] = $_POST['current_price'];
        $data['initial_price'] = $_POST['initial_price'];
        $data['short_description'] = $_POST['short_description'];
        $data['long_description'] = $_POST['long_description'];
        $data['image_1'] = $_POST['image_1'];
        $data['image_2'] = $_POST['image_2'];
        $data['image_3'] = $_POST['image_3'];
        $data['type'] = $_POST['type'];
        $data['discount'] = $_POST['discount'];
        $data['availability'] = $_POST['availability'];
        $data['warranty'] = $_POST['warranty'];

      

        $db = new Database;
        $model = new ProductsModel;

        $add = $model->addProduct($db,$data);

            if ($add) {

                $result['add_product'] = true;
                return $result;
            } else {


                $result['add_product'] = false;
                $result['error'] = "Error: Unable to add New Product";

                return $result;
            }
       
    }

     /**
     * Update Product Details
     */
    public function updateProduct()
    {
        $data['seller_id'] = $_POST['seller_id'];
        $data['name'] = $_POST['name'];
        $data['cat_name'] = $_POST['cat_name'];
        $data['sub_name'] = $_POST['sub_name'];
        $data['current_price'] = $_POST['current_price'];
        $data['initial_price'] = $_POST['initial_price'];
        $data['short_description'] = $_POST['short_description'];
        $data['long_description'] = $_POST['long_description'];
        $data['image_1'] = $_POST['image_1'];
        $data['image_2'] = $_POST['image_2'];
        $data['image_3'] = $_POST['image_3'];
        $data['type'] = $_POST['type'];
        $data['discount'] = $_POST['discount'];
        $data['availability'] = $_POST['availability'];
        $data['warranty'] = $_POST['warranty'];


        $db = new Database;
        $model = new ProductsModel;

        $edit = $model->editProduct($db,$data);

            if ($edit) {

                $result['edit_product'] = true;
                
                return $result;
            } else {
                $result['edit_product'] = false;
                $result['error'] = "Error: Unable to update product details";
            }
       
    }
     /**
     * Delete Product
     */
    public function deleteProduct($id)
    {
        $data['product_id'] = $id;


        $db = new Database;
        $model = new ProductsModel;

        $delete= $model->deleteProduct($db,$data);

            if ($delete) {
                $result['delete_product'] = true;
                
                return $result;
            } else {
                $result['delete_product'] = false;
                $result['error'] = "Error: Unable to delete product";
            }
       
    }
}