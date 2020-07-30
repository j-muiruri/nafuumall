<?php
/**
 * Admin Controller Class
 *
 * @author John Muiruri <jontedev@gmail.com>
 */

require_once$dir.'admin/config/Db.php';

require_once $dir.'admin/Model/UserModel.php';

class Admin
{
    /**
    * User data array
    */
    public $data = array();


    /***
     * Register user
     */
    public function adminReg()
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

        $cols = "name,email,phone,password";
        
        $fillable = "client_users(".$cols.")";

        //add opening and closing quotes on reg or data
        $add = $model->addUser($db, $fillable, $data);

        if ($add) {
            return true;
        } else {
            return "Unable to register User, Error Occurred: ".$add;
        }
    }
    /***
     * Login Admin
     */
    public function adminLogin($email, $password)
    {
        $data['email'] = $_POST['email'];
        $password = $_POST['password'];

        $db = new Database;
        $model = new UserModel;

        $key = "email=:email";
        
        $fillable = "client_users";

        $getUser = $model->getUser($db, $fillable, $key, $data);
        
        $password = password_verify($password, $getUser['password']);

        if ($getUser) {
            if ($password === true && $getUser['verified'] === 1) {
                // Login
                echo "login";
                return true;
            } elseif ($password === false) {
                // User not verified
                return "Error: Incorrect Credentials, Login failed";
            } elseif ($getUser['verified'] === 0) {
                return "User-admin not Verified";
            }
        } else {
            echo "error";
            return false;
        }
    }
    /**
     * Verify Admin
     */
    public function adminVerify($id)
    {
        $data['verified'] = 1;
        $db = new Database;
        $model = new UserModel;

        $cols = "verified=:verified'";
        $fillable = "admin_users";
        $tablekey = "id";

        $update = $model->editUser($db, $id, $fillable, $cols, $data, $tablekey);

        if ($update === true) {
            return true;
        } else {
            return "Unable to Verify Admin, Error Occurred: ".$update;
        }
    }
    /**
     *Disable Admin Account
     *
     *adminDisable( int $id)
     * */
    public function adminDisable($id)
    {
        $data['verified'] = 0;
        $db = new Database;
        $model = new UserModel;

        $cols = "verified=:verified'";
        $fillable = "admin_users";
        $tablekey = "id";

        $update = $model->editUser($db, $id, $fillable, $cols, $data, $tablekey);

        if ($update === true) {
            return true;
        } else {
            return "Unable to Disbale Admin, Error Occurred";
        }
    }
}
