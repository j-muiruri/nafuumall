<?php
/**
 * Seller Info Class
 *
 * Payment and Business db  operations
 *
 * @author John Muiruri <jontedev@gmail.com>
 *
 */

class SellerInfoModel
{

    /**
     * Instantiate database
     */
    private $db;


    /**
     * Fillable column values
     */
    private $fillable;

    /**
     * fillable data
     */
    private $data;
    
    /**
     * user id
     */
    private $id;



    /***********************************
     * Sellers Info Section
     */



 /**
     * Get Sellers
     *
     */
    public function getSellers($db)
    {
        $pdo =  $db->getConn();
        
        $sql = "SELECT * FROM `sellers_info`";
        
        $result = $pdo->query($sql);

        if ($result->rowCount() > 0) {
             $data = $result->fetchAll();
       return $data;
        } else {
            return false;
        }
   
    }

    /**
     * Get Seller
     *
     */
    public function getSeller($db, $data)
    {
        $pdo =  $db->getConn();
        
        $sql = "SELECT * FROM `sellers_info` WHERE seller_id =:seller_id";
        
        $result = $pdo->prepare($sql);
        // print_r($id);
        $result->execute($data);

        if ($result->rowCount() > 0) {
            $data = $result->fetch();
            return $data;
        } else {
            return false;
        }
    }




    /***********************************
     * Payments Info Section
     */



    /**
     * Create Payment Details
     */
    public function addPayment($db, $fillable, $data)
    {
        $pdo = $db->getConn();

        $sql = "INSERT INTO $fillable VALUES (?,?,?,?,?,?,?,?,?)";

        $result =$pdo->prepare($sql);
        
        $result->execute($data);

        // return true;
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Update Payment Details
     * @return true
     */
    public function editPayment($db, $id, $table, $cols, $data, $key)
    {
        $conn =  $db->getConn();

        $sql = "UPDATE $table SET $cols WHERE $key=:$id";

        $result =$pdo->prepare($sql)->execute($data);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /***********************************
     * Business Info Section
     */

    /**
     * Create Business Details
     */
    public function addBusiness($db, $fillable, $data)
    {
        $pdo = $db->getConn();

        $sql = "INSERT INTO $fillable VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

        $result =$pdo->prepare($sql);
        
        $result->execute($data);

        // return true;
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Update Business Details
     * @return true
     */
    public function editBusiness($db, $id, $table, $cols, $data, $key)
    {
        $conn =  $db->getConn();

        $sql = "UPDATE $table SET $cols WHERE $key=:$id";

        $result =$pdo->prepare($sql)->execute($data);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}