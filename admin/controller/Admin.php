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


    /**
     * Register Admin
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
        
        $fillable = "admin_users(".$cols.")";

        //add opening and closing quotes on reg or data
        $add = $model->addUser($db, $fillable, $data);

        if ($add['create'] === true) {
            $result['admin_reg'] =  true;
            $result['id'] = $add['id'];
            return  $result;
        } else {

            $result['admin_reg'] =  false;
            $result['error'] = "Unable to register User, Error Occurred ";

            return  $result;
        }
    }

    /**
     * Login admin
     * @return userid
     */
    public function adminLogin()
    {
        $data['email'] = $_POST['email'];
        $password = $_POST['password'];

        $db = new Database;
        $model = new UserModel;

        $key = "email=:email";
        
        $fillable = "admin_users";

        $getUser = $model->getUser($db, $fillable, $key, $data);
        
        if ($getUser) {
            $password = password_verify($password, $getUser['password']);
            
            if ($password === true && $getUser['verified'] === 1) {

                $result['login'] = true;
                $result['id'] = $getUser['id'];

                return $result;
            } elseif ($password === false) {
                // User not verified
                $result['error'] = "Error: Incorrect Credentials, Login failed";
                $result['login'] = false;

                return $result;
            } elseif ($getUser['verified'] === 0) {

                $result['login'] = false;
                $result['error'] = "User-Admin not Verified";

                return $result;
            }
        } else {
            $result['login'] = false;
            $result['error'] = "Error: User not found, Please try again or contact the Admin\n\n";
            return $result;
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
    /**
     * List All Admin
     */
    public function listAdmins()
    {
        $db = new Database;
        $model = new UserModel;

        $fillable = "admin_users";

        return $model->getUsers($db, $fillable);
    }
    /**
     * Get Single Admin Details
     */
    public function getAdmin($id)
    {
        $db = new Database;
        $model = new UserModel;
        $data['id'] = $id;

        $fillable = "admin_users";
        $tablekey = "id=:id";
        return $model->getUser($db, $fillable, $tablekey, $data);
    }

/**
     * Delete Admin
     */
    public function deleteAdmin($id)
    {
        $data['id'] = $id;

        $db    = new Database;
        $model = new UserModel;
        $fillable = "admin_users";
        $delete = $model->deleteUser($db, $fillable, $data);

        if ($delete) {
            $result['delete_admin'] = true;
            return $result;
        } else {
            $result['error']  = "Error: Unable to Delete Category";
            $result['delete_admin'] = false;
            return $result;
        }

    }



    /***
     * Temporaray Register admin
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
        
        $fillable = "admin_users(".$cols.")";

        $add = $model->addUser($db, $fillable, $data);

        if ($add['create'] === true) {

            $result['reg'] =  true;
            $result['id'] = $add['id'];

            return  $result;
        } else {
           
            $result['error'] = "Unable to register User, Error Occurred: ";

            return  $result;
        }
    }

    /**
    * Temp Login user
    */
    public function tempLogin($email, $password)
    {
        $email= $email;
        // $userType = $type;

        $db = new Database;
        $model = new UserModel;

        $key = "email=:email";
        
        $fillable ="admin_users";
        $data['email'] = $email;

        $getUser = $model->getUser($db, $fillable, $key, $data);
        
        
        if ($getUser) {
            $password = password_verify($password, $getUser['password']);

            if ($password === true && $getUser['verified'] === 1) {

                $result['login'] = true;
                $result['id'] = $getUser['id'];

                return $result;
            } elseif ($password === false) {
                // User not verified
                $result['error'] = "Error: Incorrect Credentials, Login failed";
                $result['login'] = false;

                return $result;
            } elseif ($getUser['verified'] === 0) {

                $result['error'] = false;
                $result['login'] = "User-Admin not Verified";

                return $result;
            }
        } else {
            $result['login'] = false;
            $result['error'] = "Error: User not found, Please try again or contact the Admin\n\n";
            return $result;
        }
    }
}
