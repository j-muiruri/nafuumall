<?php

require_once $dir.'admin/config/Db.php';

require_once $dir.'admin/Model/UserModel.php';
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

        if ($password === true && $getUser['verified'] === 1 ) {
            // Login
            return true;

        } elseif( $getUser['verified'] === 0 ) {
            // User not verified
            // echo "\n\n\n\n\n\n Mmmmh...you are not verified\n\n\n\n\n\n\n\n\n";
            return false;

        } else {
            //Mysql error
            return "Login failed. Error: ".$getUser;
        }
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
            return "Unable to register User, Error Occurred: ".$add;
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
        
        $password = password_verify($password, $getUser['password']);

        if ($password === true && $getUser['verified'] === 1 ) {
            // Login
            return true;

        } elseif( $getUser['verified'] === 0 ) {
            // User not verified
            // echo "\n\n\n\n\n\n Mmmmh...you are not verified\n\n\n\n\n\n\n\n\n";
            return false;


        } else {
            //Mysql error
            return "Login failed. Error: ".$getUser;
        }
    }
}
