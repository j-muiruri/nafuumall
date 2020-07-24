<?php
/**
 * User Model Class
 *
 * User databse  operations
 *
 * @author John Muiruri <jontedev@gmail.com>
 *
 */

class UserModel
{

    /**
     * Instantiate database
     */
    public $db;


    /**
     * Fillable column values
     */
    public $fillable;

    /**
     * fillable data
     */
    public $data;
    
    /**
     * user id
     */
    public $id;

    /**
     * Add User
     */
    public function addUser($db, $fillable, $data)
    {

        $conn =  $db->getConn();

        $sql = "INSERT INTO $fillable 
        values($data)";

        $result = $conn->query($sql);

        if ($result) {
            return $conn->insert_id;
        } else {
            return $conn->error;
        }
    }
    /**
     * Edit User
     */
    public function editUser($db, $id, $fillable, $data)
    {

        $conn =  $db->getConn();

        $sql = "UPDATE $fillable SET $data WHERE id = $id";

        $result = $conn->query($sql);

        if ($result === true) {
            return true;
        } else {
            return $conn->error;
        }
    }
    /**
    * Delete User
    */
    public function deleteUser($db, $fillable, $id)
    {

        $conn =  $db->getConn();

        $sql = "DELETE FROM $fillable WHERE id = $id";

        $result = $conn->query($sql);

        if ($result === true) {
            return true;
        } else {
            return $conn->error;
        }
    }
    /**
    * Get a User
    */
    public function getUser($db, $fillable, $data)
    {
        
        $conn =  $db->getConn();

        $sql = "SELECT $fillable  WHERE $data";

        $result = $conn->query($sql);

        if ($get->num_rows > 0) {

            $result = $data->fetch_assoc();

            return $result;

        } else {

            return $conn->error;
        }
    }
}
