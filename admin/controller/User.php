<?php
/**
 * User Controller Class
 *
 * @author John Muiruri <jontedev@gmail.com>
 */

require_once 'Db.php';

require_once 'admin/Model/UserModel.php';

class User
{
    /**
     * User data array
     */
    public $data = array();


    /***
     * Register user
     */
    public function userReg()
    {
        $data['0'] = $_POST['name'];
        $data['1'] = $_POST['email'];
        $data['2'] = $_POST['phone'];
        $options = [
            'cost' => 12,
        ];
        $data['3']  = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
        $userType = $type;

        $db = new Database;
        $model = new UserModel;

        $cols = "name,email,phone,password";
        
        $fillable = "registration_details(".$cols.")";
        $reg = implode('\', \'', $data);

        //add opening and closing quotes on reg or data
        $add = $model->addUser($db,$fillable, "'".$reg."'");

        if ($add === true) {
            return true;
        } else {
            return "Unable to register User, Error Occurred: ".$add;
        }
    }
    /***
     * Login user
     */
    public function userLogin($type)
    {
        $data['1'] = $_POST['email'];
        $data['2']  = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
        $userType = $type;

        $db = new Database;
        $model = new UserModel;

        $cols = "email,password";
        
        $fillable = $cols. "FROM registration_details";
        $email = $data['2'];

        $getUser = $model->addUser($db, $fillable, $email);
        
        $password = password_verify($data['2'], $getUser['password']);

        if ($getUser['email'] == $email && $password === true) {
            return true;
        } else {
            return "Login failed. Error: ".$getUser;
        }
    }
        /***
     * Register user
     */
    public function tempReg($name,$email,$phone,$pass)
    {
        $data['0'] = $name;
        $data['1'] = $email;
        $data['2'] = $phone;
        $options = [
            'cost' => 12,
        ];
        $data['3']  = password_hash($pass, PASSWORD_BCRYPT, $options);
        // $userType = $type;

        $db = new Database;
        $model = new UserModel;

        $cols = "name,email,phone,password";
        
        $fillable = "registration_details(".$cols.")";
        $reg = implode('\', \'', $data);

        echo $reg."\n";

//add opening and closing quotes on reg or data
        $add = $model->addUser($db,$fillable, "'".$reg."'");

        if ($add) {
            echo $add;
        } else {
            return "Unable to register User, Error Occurred: ".$add;
        }
    }
}
