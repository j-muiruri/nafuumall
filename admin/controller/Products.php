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

    /**
     * ID data array
     */
    public $id= array();

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

    //    print_r($id);
       return $model->getProduct($db, $id);
       
    }

    /**
     * Create a Product
     */
    public function createProduct()
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
        $data['date_posted'] = $_POST['date_posted'];
        $data['time_posted'] = $_POST['time_posted'];
        $data['type'] = $_POST['type'];
        $data['discount'] = $_POST['discount'];
        $data['availability'] = $_POST['availability'];
        $data['warranty'] = $_POST['warranty'];


        $db = new Database;
        $model = new ProductsModel;

        $add = $model->addProduct($db,$data);

            if ($add) {
                return true;
            } else {
                return "Error: Unable to add New Product";
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
        $data['date_posted'] = $_POST['date_posted'];
        $data['time_posted'] = $_POST['time_posted'];
        $data['type'] = $_POST['type'];
        $data['discount'] = $_POST['discount'];
        $data['availability'] = $_POST['availability'];
        $data['warranty'] = $_POST['warranty'];


        $db = new Database;
        $model = new ProductsModel;

        $edit = $model->editProduct($db,$data);

            if ($add) {
                return true;
            } else {
                return "Error: Unable to Update Product Details";
            }
       
    }
     /**
     * Delete Product
     */
    public function deleteProduct()
    {
        $data['product_id'] = $_POST['product_id'];


        $db = new Database;
        $model = new ProductsModel;

        $delete= $model->deleteProduct($db,$data);

            if ($add) {
                return true;
            } else {
                return "Error: Unable to delete product";
            }
       
    }
}