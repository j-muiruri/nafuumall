<?php
/**
 * Sellers Controller Class
 *
 * @author John Muiruri <jontedev@gmail.com>
 */

require_once '../config/Db.php';
require_once 'admin/Model/UserModel.php';

class Sellers
{
    /**
     * add Seller Info
     */
    public function addSellers($section)
    {
        if ($section === "seller_add") {
            $data['name1'] = $_POST['name1'];
            $data['email_address'] = $_POST['email_address'];
            $data['phone'] = $_POST['phone'];
            $data['referral'] = $_POST['referral'];
            $data['national_id'] = $_POST['national_id'];
            $data['gender'] = $_POST['gender'];
            $data['dob'] = $_POST['dob'];
            $data['display_name'] = $_POST['display_name'];
            $data['contract'] = $_POST['contract'];
            $options = [
            'cost' => 11,
        ];
            $data['password']  = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
            // $userType = $type;

            $db = new Database;
            $model = new UserModel;

            $cols = "name,email_address,phone,referral,national_id,gender,dob,display_name,contract,password";
        
            $fillable = "sellers_info(".$cols.")";

            //add opening and closing quotes on reg or data before insert
            $add = $model->addUser($db, $fillable, $data);

            if ($add) {
                return true;
            } else {
                return "Unable to register Seller, Error Occurred: ".$add;
            }
        }
    }
    /**
    * edit Seller Info
    */
    public function editSellers($id, $section)
    {
        if ($section === "seller_update") {
            $data['name']= $_POST['name1'];
            $data['email'] = $_POST['email_address'];
            $data['phone']= $_POST['phone'];
            $data['ref']= $_POST['referral'];
            $data['national_id  ']= $_POST['national_id'];
            $data['gender']= $_POST['gender'];
            $data['dob']= $_POST['dob'];
            $data['display_name']= $_POST['display_name'];
            $data['contract']= $_POST['contract']; //Yes or no - true or false
            $data['password'] = $_POST['password'];
            $id = $_POST['seller_id'];
            
            $data['9']  = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
            // $userType = $type;

            $db = new Database;
            $model = new UserModel;

            $cols = "name=:name,email_address=:email,phone=:phone,referral=:ref,national_id=:national_id,
            gender=:gender,dob=:dob,display_name=:display_name,contract=:contract,password=:password'";
        
            $fillable = "sellers_info";
            $tablekey = "seller_id";
            $update = $model->editUser($db, $id, $fillable, $cols, $data, $tablekey);

            if ($update === true) {
                return true;
            } else {
                return "Unable to update Seller, Error Occurred: ".$update;
            }
        }
    }
    /**
     *Verify Seller
     *
     *sellerVerify( int $id)
     * */
    public function sellerVerify($id)
    {
        $db = new Database;
        $model = new UserModel;

        $cols = "verified=:verified";
        $data['verified'] = "1";
        $fillable = "sellers_info";
        $tablekey = "seller_id";

        $update = $model->editUser($db, $id, $fillable, $cols, $data, $tablekey);

        if ($update) {
            return true;
        } else {
            return "Unable to Verify Seller, Error Occurred: ".$update;
        }
    }
    /**
     *Disable Seller Account
     *
     *sellerDisable( int $id)
     * */
    public function sellerDisable($id)
    {
        $db = new Database;
        $model = new UserModel;

        $cols = "verified=:verified";
        $data['verified'] = "0";
        $fillable = "sellers_info";
        $tablekey = "seller_id";

        $update = $model->editUser($db, $id, $fillable, $cols, $data, $tablekey);

        if ($update) {
            return true;
        } else {
            return "Unable to Disable Seller, Error Occurred: ".$update;
        }
    }
    /**
     * Seller Login
     *
     */
    public function sellerLogin()
    {
        $data['email'] = $_POST['email'];
        $data['password']  = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
        // $userType = $type;

        $db = new Database;
        $model = new UserModel;

        $keycols = "email=:email";
        $fillable = "sellers_info";
        $email = $data['email'];

        $getUser = $model->getUser($db, $fillable, $key, $email);
        
        $password = password_verify($data['password'], $getUser['password']);

        if ($password === true && $getUser['verified'] === 1) {
            // Login
            return true;
        } elseif ($getUser['verified'] === 0) {
            // User not verified
            return false;
        } else {
            //Mysql error
            return "Login failed. Error: ".$getUser;
        }
    }

    /**
     * End of Seller Section
     */


    /**
     * Start of Business Section
     *
     */

    /**
    * Add Business Info
    */
    public function addBusiness()
    {
        if ($section === "business_add") {
            $data['registration_no']= $_POST['registration_no'];
            $data['business_type']= $_POST['business_type'];
            $data['seller_vat']= $_POST['seller_vat'];
            $data['category_id']= $_POST['category_id'];
            $data['name2']= $_POST['name2'];
            $data['person_incharge']= $_POST['person_incharge'];
            $data['person_gender']= $_POST['person_gender'];
            $data['address']= $_POST['address'];
            $data['postal_code']= $_POST['postal_code'];
            $data['town']= $_POST['town'];
            $data['vat_registered']= $_POST['vat_registered'];


            $db = new Database;
            $model = new UserModel;

            $cols = "registration_no,business_type,seller_vat,category_id,name,person_incharge,person_gender,
            address,postal_code,town,vat_registered";
        
            $fillable = "sellers_business_info(".$cols.")";

            $add = $model->addUser($db, $fillable, $data);

            if ($add) {
                return true;
            } else {
                return "Unable to register Seller Business Information, Error Occurred: ".$add;
            }
        }
    }
    /**
    * edit BusinessInfo
    */
    public function editBusiness($id,$section)
    {
        if ($section === "business_update") {
            $data['registration_no']= $_POST['registration_no'];
            $data['business_type']= $_POST['business_type'];
            $data['seller_vat']= $_POST['seller_vat'];
            $data['category_id']= $_POST['category_id'];
            $data['name2']= $_POST['name2'];
            $data['person_incharge']= $_POST['person_incharge'];
            $data['person_gender']= $_POST['person_gender'];
            $data['address']= $_POST['address'];
            $data['postal_code']= $_POST['postal_code'];
            $data['town']= $_POST['town'];
            $data['vat_registered']= $_POST['vat_registered'];
            $id = $_POST['business_id'];

            $db = new Database;
            $model = new UserModel;

            $cols = "registration_no=:registration_no,business_type=:business_type,seller_vat=:seller_vat,
            category_id=:category_id,name=:name2,person_incharge=:person_incharge,
            person_gender=:person_gender,address=:address,
            postal_code=:postal_code,town=:town,vat_registered=:vat_registered,";
        
            $fillable = "sellers_business_info";
            $key = "business_id";
            $update = $model->editUser($db, $id, $fillable, $data, $key);

            if ($update) {
                return true;
            } else {
                return "Unable to update Seller Business Information, Error Occurred: ".$update;
            }
        }
    }
    /**
     * End of Business Section
     *
     */


    /**
    * Start of Payments Section
    *
    */

    /**
     * Add Payments Info
     */
    public function addPayments($section)
    {
        if ($section === "payment_add") {
            $data['mpesa_name'] = $_POST['mpesa_name'];
            $data['mpesa_phone'] = $_POST['mpesa_phone'];
            $data['bank_acc_name'] = $_POST['bank_acc_name'];
            $data['bank_acc_no'] = $_POST['bank_acc_no'];
            $data['bank_name'] = $_POST['bank_name'];
            $data['bank_code'] = $_POST['bank_code'];
            $data['bank_branch'] = $_POST['bank_branch'];
            $data['iban'] = $_POST['iban'];
            $data['swift'] = $_POST['swift'];
            $data['payment_mode'] = $_POST['payment_mode'];


            $db = new Database;
            $model = new UserModel;

            $cols = "mpesa_name,mpesa_phone,bank_acc_name,bank_acc_no,bank_name,
            bank_code,bank_branch,iban,swift,payment_mode";
        
            $fillable = "sellers_payments_info(".$cols.")";
            $reg = implode('\', \'', $data);

            //add opening and closing quotes on reg or data before insert
            $add = $model->addUser($db, $fillable, "'".$reg."'");

            if ($add === true) {
                return true;
            } else {
                return "Unable to register Seller Payment Information, Error Occurred: ".$add;
            }
        }
    }
    /**
    * edit Payments Info
    */
    public function editPayments($id, $section)
    {
        if ($section === "payments_update") {
            $data['mpesa_name'] = $_POST['mpesa_name'];
            $data['mpesa_phone ']= $_POST['mpesa_phone'];
            $data['bank_acc_name']= $_POST['bank_acc_name'];
            $data['bank_acc_no'] = $_POST['bank_acc_no'];
            $data['bank_name'] = $_POST['bank_name'];
            $data['bank_code ']= $_POST['bank_code'];
            $data['bank_branch ']= $_POST['bank_branch'];
            $data['iban'] = $_POST['iban'];
            $data['swift ']= $_POST['swift'];
            $data['payment_mode'] = $_POST['payment_mode'];

            $db = new Database;
            $model = new UserModel;

            $cols= "mpesa_name=:mpesa_name,mpesa_phone=:mpesa_phone,bank_acc_name=:bank_acc_name,bank_acc_no=:bank_acc_no,
            bank_name=:bank_name,bank_code=:bank_code,bank_branch=:bank_branch,
            iban=:iban,swift=:swift,payment_mode=:payment_mode'";
        
            $fillable = "sellers_payments_info";
            $key = "payments_id";
            $update = $model->editUs;er($db, $id, $fillable, $cols, $key, $data);

            if ($update) {
                return true;
            } else {
                return "Unable to update Seller Payment Information, Error Occurred: ".$update;
            }
        }
    }
}
