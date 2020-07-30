<?php
/**
 * Products Model Class
 *
 * @author John Muiruri <jontedev@gmail.com>
 */

class ProductModel
{
    /**
     * Instantiate database
     */
    public $db;

    /****************************************
     * Products Section
     */


    /**
     * Get Products
     *
     */
    public function getProducts($db)
    {
        $conn =  $db->getConn();
        
        $sql = "SELECT * FROM `product_details`";
        
        $data = $conn->query($sql);

        if ($data->num_rows >0) {
            $result = $data->fetch_all();
            return $result;
        } else {
            return $conn->error;
        }
    }
    /**
     * Get Product
     *
     */
    public function getProduct($db, $id)
    {
        $conn =  $db->getConn();
        
        $sql = "SELECT * FROM `product_details` WHERE cat_id = '$id'";
        
        $data = $conn->query($sql);

        if ($data->num_rows >0) {
            $result = $data->fetch_assoc();
            return $result;
        } else {
            return $conn->error;
        }
    }
    /**
     * Add Product
     *
     */
    public function addProduct($db, $data)
    {
        $conn =  $db->getConn();
        
        $sql = "INSERT INTO `product_details`(`name`, `cat_name`, `sub_name`, `current_price`, `initial_price`, `short_description`, `long_description`, `image_1`, `image_2`, `image_3`, `date_posted`, `time_posted`, `type`, `discount`, `availability`, `warranty`) VALUES (".$data.")";
        
        $data = $conn->query($sql);
        if ($data === true) {
            return true;
        } else {
            return $conn->error;
        }
    }
    /**
     * Update Product
     *
     */
    public function updateProduct($db, $data)
    {
        $conn =  $db->getConn();
        
        $sql = "UPDATE`product_details` SET cat_name= '$data'";
        
        $data = $conn->query($sql);
        
        if ($data === true) {
            return true;
        } else {
            return $conn->error;
        }
    }
    /**
     * Delete Product
     *
     */
    public function deleteProduct($db, $data)
    {
        $conn =  $db->getConn();
        
        $sql = "DELETE FROM `product_details` WHERE id ='$data'";
        
        $data = $conn->query($sql);
        if ($data === true) {
            return true;
        } else {
            return $conn->error;
        }
    }
    /*************
     * End of Products
     */
}