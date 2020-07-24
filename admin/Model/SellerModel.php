<?php
/**
 * Seller Model Class
 *
 * @author John Muiruri <jontedev@gmail.com>
 */
require_once '../Controller/Db.php';

use Database;

class SellerModel
{

    /**
     * Instantiate database
     */


    /**
     * Add Seller
     */
    public function addSeller($data)
    {
        $conn = new Database;

        $conn =  $conn->getConn();

        $sql = "INSERT INTO `registration_details`(`name`, `email`, `password`, `phone`, 
        values($data)";

        $result = $conn->query($sql);

        if ($result === true) {
            
            return $conn->insert_id;
        } else {
            return $conn->error;
        }
    }
    /**
     * Edit Seller
     */
    public function editSeller($id, $data)
    {
        $conn = new Database;

        $conn =  $conn->getConn();

        $sql = "UPDATE `registration_details` SET $data WHERE id = $id";

        $result = $conn->query($sql);

        if ($result === true) {
            
            return true;

        } else {
            return $conn->error;
        }
    }
     /**
     * Delete Seller
     */
    public function deleteSeller($id)
    {
        $conn = new Database;

        $conn =  $conn->getConn();

        $sql = "DELETE FROM `registration_details` WHERE id = $id";

        $result = $conn->query($sql);

        if ($result === true) {
            
            return true;

        } else {

            return $conn->error;
        }
    }
     /**
     * Get Seller
     */
    public function getSeller($data)
    {
        $conn = new Database;
        
        $conn =  $conn->getConn();

        $sql = "SELECT email, password FROM `registration_details` WHERE $data";

        $result = $conn->query($sql);

        if ($result === true) {
            
            return true;

        } else {

            return $conn->error;
        }
    }
    
}
