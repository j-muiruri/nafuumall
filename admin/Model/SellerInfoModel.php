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
     * Payments Info Section
     */

    /**
     * Create Payment Details
     */
    public function addPayment($db, $fillable, $data)
    {
        $pdo = $db->getConn();

        $sql = "INSERT INTO $fillable VALUES (?,?,?,?,?,?,?,?,?)";

        $result =$pdo->prepare($sql)->execute($data);

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

        $result =$pdo->prepare($sql)->execute($data);

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