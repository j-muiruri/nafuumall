<?php
/**
 * Products Model Class
 *
 * @author John Muiruri <jontedev@gmail.com>
 */

class ProductsModel
{
    /**
     * Instantiate database
     */
    public $db;

    /****************************************
     * Products Section
     */

      /**
     * ID data array
     */
    public $id= array();

    /**
     * Get Products
     *
     */
    public function getProducts($db)
    {
        $pdo =  $db->getConn();
        
        $sql = "SELECT * FROM `product_details`";
        
        $result = $pdo->query($sql);

        if ($result->rowCount() > 0) {
             $data = $result->fetchAll();
       return $data;
        } else {
            return false;
        }
   
    }
    /**
     * Get Product
     *
     */
    public function getProduct($db, $id)
    {
        $pdo =  $db->getConn();
        
        $sql = "SELECT * FROM `product_details` WHERE product_id =:product_id";
        
        $result = $pdo->prepare($sql);
        // print_r($id);
        $result->execute($id);

        if ($result->rowCount() > 0) {
            $data = $result->fetch();
            return $data;
        } else {
            return false;
        }
    }
    /**
     * Add Product
     *
     */
    public function addProduct($db, $data)
    {
        $pdo =  $db->getConn();
        
        $sql = "INSERT INTO `product_details`(`seller_id`,`name`, `cat_name`, `sub_name`, `current_price`, `initial_price`, `short_description`, `long_description`, `image_1`, `image_2`, `image_3`, `date_posted`, `time_posted`, `type`, `discount`, `availability`, `warranty`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        
        $result =$pdo->prepare($sql)->execute($data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Update Product
     *
     */
    public function editProduct($db, $data)
    {
        $pdo =  $db->getConn();
        
        $sql = "UPDATE`product_details` SET seller_id =:seller_id,name =:name,cat_name =:cat_name,sub_name =:sub_name,current_price =:current_price,initial_price =:initial_price,short_description =:short_description,long_description =:long_description,image_1 =:image_1,image_2 =:image_2,image_3 =:image_3,date_posted =:date_posted,time_posted =:time_posted,type =:type,discount =:discount,availability =:availability,warranty =:warranty WHERE product_id=:product_id";        
        
        $result =$pdo->prepare($sql)->execute($data);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Delete Product
     *
     */
    public function deleteProduct($db, $data)
    {
        $pdo =  $db->getConn();
        
        $sql = "DELETE FROM `product_details` WHERE id =:product_id";
        
        $result =$pdo->prepare($sql)->execute($id);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    /*************
     * End of Products
     */
}