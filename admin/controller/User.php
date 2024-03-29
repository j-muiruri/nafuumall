<?php

require_once $dir.'admin/config/Db.php';

require_once $dir.'admin/Model/UserModel.php';

require_once $dir.'admin/Model/SellerInfoModel.php';
/**
 * User Controller Class
 *
 * @author John Muiruri <jontedev@gmail.com>
 */
class User extends Database
{
    /**
     * User data array
     */
    public $data = array();

    /**
     * Register user
     */
    public function userReg()
    {
        $data['name'] = $_POST['name'];
        $data['email'] = $_POST['email'];
        $data['phone'] = $_POST['phone'];
        $options = [
            'cost' => 12,
        ];
        $data['password']  = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
        
        $db = new Database;
        $model = new UserModel;

        $cols= "name,email,phone,password";
        
        $fillable = "client_users(".$cols.")";

        $add = $model->addUser($db, $fillable, $data);

        if ($add) {
            return true;
        } else {
            return "Unable to register User, Error Occurred: ".$add;
        }
    }
    /**
     * Login user
     */
    public function userLogin()
    {
        $email= $email;
        // $userType = $type;

        $db = new Database;
        $model = new UserModel;

        $key = "email=:email";
        
        $fillable ="client_users";
        $data['email'] = $email;

        $getUser = $model->getUser($db, $fillable, $key, $data);
        
        $password = password_verify($password, $getUser['password']);

        if ($password === true && $getUser['verified'] === 1) {
            // Login
            // return true;
            return $getUser['id'];
        } elseif ($getUser['verified'] === 0) {
            // User not verified
            // echo "\n\n\n\n\n\n Mmmmh...you are not verified\n\n\n\n\n\n\n\n\n";
            return false;
        } else {
            //Mysql error
            return "Login failed. Error: ".$getUser;
        }
    }
    /**
    * List All Sellers - Users
    */
    public function listUsers()
    {
        $db = new Database;
        $model = new SellerInfoModel;

        return $model->getSellers($db);
    }
    /**
        * Get Single Seller Details
        */
    public function getUser($id)
    {
        $db = new Database;
        $model = new SellerInfoModel;
        $data['id'] = $id;

        return $model->getSeller($db, $data);
    }


    /***
     * Register user
     */
    public function tempReg($name, $email, $phone, $pass)
    {
        $data['name'] = $name;
        $data['email'] = $email;
        $data['phone'] = $phone;
        $options = [
            'cost' => 12,
        ];
        $data['password']  = password_hash($pass, PASSWORD_BCRYPT, $options);
        // $userType = $type;

        $db = new Database;
        $model = new UserModel;

        $cols= "name,email,phone,password";
        
        $fillable = "client_users(".$cols.")";

        $add = $model->addUser($db, $fillable, $data);

        if ($add) {
            return true;
        } else {
            return "Unable to register User, Error Occurred ";
        }
    }
    /**
     * Login user
     */
    public function tempLogin($email, $password)
    {
        $email= $email;
        // $userType = $type;

        $db = new Database;
        $model = new UserModel;

        $key = "email=:email";
        
        $fillable ="client_users";
        $data['email'] = $email;

        $getUser = $model->getUser($db, $fillable, $key, $data);
        
        
        if ($getUser) {
            $password = password_verify($password, $getUser['password']);

            if ($password === true && $getUser['verified'] === 1) {
                // Login
                echo "login";
                return $getUser['id'];
            } elseif ($password === false) {
                // User not verified

                return "Error: Incorrect Credentials, Login failed";
            } elseif ($getUser['verified'] === 0) {
                return "User-Customer not Verified";
            }
        } else {
            echo "Error: Please try again or contact the Admin\n\n";
            return false;
        }
    }
}
