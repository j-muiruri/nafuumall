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


    /**
     * Add User
     */
    public function addUser($db, $fillable, $data)
    {
        $pdo = $db->getConn();

        $sql = "INSERT INTO $fillable VALUES (:name, :email, :phone, :password)";

        $result =$pdo->prepare($sql);

        print_r($data);
        $result->execute($data);

        // return true;
        if ($result) {
            echo "added";
            echo $pdo->lastInsertId();
            return true;
        } else {

            echo "not added";
            return false;
        }
    }


    /**
     * Edit User
     * @return true
     */
    public function editUser($db, $id, $table, $cols, $data, $key)
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
    public function getUser($db, $fillable, $key, $data)
    {
        $pdo =  $db->getConn();

        $sql = "SELECT * FROM $fillable WHERE $key";

        $result = $pdo->prepare($sql);
        
        $result->execute($data);
        

        if ($result->rowCount() > 0) {
            $data = $result->fetch();
            return $data;
        } else {
            return false;
        }
    }

    /**
    * List All Users
    */
    public function getUsers($db, $fillable)
    {
        $pdo =  $db->getConn();

        $sql = "SELECT * FROM $fillable";

        $result = $pdo->query($sql);

        if ($result->rowCount() > 0) {
            $data = $result->fetchAll();
            return $data;
        } else {
            return false;
        }
    }
}
