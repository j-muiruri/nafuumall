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
     * Add Sellers
     */
    public function addSeller($db, $data)
    {
        $pdo =  $db->getConn();
        
        $sql = "INSERT INTO `sellers_info` (name,email_address,phone,referral,national_id,gender,dob,display_name,contract,password) VALUES (:name,:email_address,:phone,:referral,:national_id,:gender,:dob,:display_name,:contract,:password)";
        
        $result =$pdo->prepare($sql);

        $result->execute($data);

        if ($result) {
            $user['create']= true;
            $user['id']=$pdo->lastInsertId();
            return $user;
        } else {
            return false;
        }
    }


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

    /**
         * Check Seller data
         *
         */
    public function checkSeller($db, $column, $data)
    {
        $pdo =  $db->getConn();
        
        $sql = "SELECT * FROM `sellers_info` WHERE $column =:$column";
        
        $result = $pdo->prepare($sql);
        // print_r($data);
        $result->execute($data);

        if ($result->rowCount() > 0) {
            $data = $result->fetch();
            return $data;
        } else {
            return false;
        }
    }


     /**
     * Delete User
     *
     */
    public function deleteUser($db, $table, $id)
    {
        $pdo =  $db->getConn();
        
        $sql = "DELETE FROM sellers_info WHERE seller_id =:seller_id";
        
        $result =$pdo->prepare($sql)->execute($id);

        if ($result) {
            return true;
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
    public function addPayment($db, $data)
    {
        $pdo = $db->getConn();

        $sql = "INSERT INTO `sellers_payments_info`(mpesa_name,seller_id,mpesa_phone,
        bank_acc_name,bank_acc_no,bank_name,bank_code,bank_branch,iban,swift,payment_mode) 
        VALUES(:mpesa_name,:seller_id,:mpesa_phone,:bank_acc_name,:bank_acc_no,:bank_name,:bank_code,
        :bank_branch,:iban,:swift,:payment_mode)";

        $result =$pdo->prepare($sql);
        
        $result->execute($data);

        // return true;
        if ($result) {
            $payment['create']= true;
            $payment['id']=$pdo->lastInsertId();
            return $payment;
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
     * @return id
     */
    public function addBusiness($db, $data)
    {
        $pdo = $db->getConn();

        $sql = "INSERT INTO `sellers_business_info`(seller_id,registration_no,business_type,seller_vat,category_id,name,person_incharge,person_gender,address,
        postal_code,town,vat_registered) VALUES (:seller_id,:registration_no,:business_type,:seller_vat,:category_id,:name,:person_incharge,:person_gender,:address,
        :postal_code,:town,:vat_registered)";

        $result =$pdo->prepare($sql);
        print_r($data);
        
        $result->execute($data);

        // return true;
        if ($result) {
            $business['create']= true;
            $business['id']=$pdo->lastInsertId();
            return $business;
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
