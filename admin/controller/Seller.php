<?php

require_once $dir.'admin/config/Db.php';
require_once $dir.'admin/Model/UserModel.php';
require_once $dir.'admin/Model/SellerInfoModel.php';
/**
 * Sellers Controller Class
 *
 * @author John Muiruri <jontedev@gmail.com>
 */
class Sellers
{
    /**
     * add Seller Info
     */
    public function addSellers()
    {
        $data['name'] = $_POST['name'];
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
        $model = new SellerInfoModel;
        // return print_r($data);
        //check if email exists
        $column1 = "email_address";
        $emailData['email_address'] = $data['email_address'];
        $checkEmail = $model->checkSeller($db, $column1, $emailData);

        //check if Display Name exists
        $column2 = "display_name";
        $dispData['display_name'] = $data['display_name'];
        $checkDisplay = $model->checkSeller($db, $column2, $dispData);

        if (!$checkEmail && !$checkDisplay) {
            $add = $model->addSeller($db, $data);
            if ($add['create'] === true) {
                $result['reg_seller'] =  true;
                $result['id'] = $add['id'];
    
                return  $result;
            } else {
                $result['reg_seller'] =  false;

                $result['error'] = "Unable to register User, Error Occurred: ";
    
                return  $result;
            }
        } elseif ($checkEmail) {
            $result['reg_seller'] =  false;
            $result['error'] = "Error Occurred: Email address already registered";
    
            return  $result;
        } elseif ($checkDisplay) {
            $result['reg_seller'] =  false;
            $result['error'] = "Occurred: Business Name already registered";
    
            return  $result;
        }
    }
    /**
    * edit Seller Info
    */
    public function editSellers($id)
    {
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

        if ($update) {
            return true;
        } else {
            return "Error Occurred:, Unable to update Seller ";
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
            return "Unable to Verify Seller, Error Occurred";
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
            return "Unable to Disable Seller, Error Occurred";
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
            return "Login failed. Error";
        }
    }

    /**
     * Temp Register Seller
     * @return newuserid
     */
    public function tempReg($name, $email, $phone, $referral, $national_id, $gender, $dob, $display, $contract, $pass)
    {
        $data['name'] =  $name;
        $data['email_address'] =  $email;
        $data['phone'] =  $phone;
        $data['referral'] =  $referral;
        $data['national_id'] =  $national_id;
        $data['gender'] =  $gender;
        $data['dob'] =  $dob;
        $data['display_name'] =  $display;
        $data['contract'] =  $contract;
        $options = [
            'cost' => 11,
        ];
        $data['password']  = password_hash($pass, PASSWORD_BCRYPT, $options);

        $db = new Database;
        $model = new SellerInfoModel;
        // return print_r($data);
        //check if email exists
        $column1 = "email_address";
        $emailData['email_address'] = $data['email_address'];
        $checkEmail = $model->checkSeller($db, $column1, $emailData);

        //check if Display Name exists
        $column2 = "display_name";
        $dispData['display_name'] = $data['display_name'];
        $checkDisplay = $model->checkSeller($db, $column2, $dispData);

        if (!$checkEmail && !$checkDisplay) {
            $add = $model->addSeller($db, $data);
            if ($add['create'] === true) {
                $result['reg'] =  true;
                $result['id'] = $add['id'];
    
                return  $result;
            } else {
                $result['reg'] =  false;

                $result['error'] = "Unable to register User, Error Occurred: ";
    
                return  $result;
            }
        } elseif ($checkEmail) {
            $result['reg'] =  false;
            $result['error'] = "Error Occurred: Email address already registered";
    
            return  $result;
        } elseif ($checkDisplay) {
            $result['reg'] =  false;
            $result['error'] = "Occurred: Business Name already registered";
    
            return  $result;
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
        $data['seller_id']= $_POST['seller_id'];
        $data['registration_no']= $_POST['registration_no'];
        $data['business_type']= $_POST['business_type'];
        $data['seller_vat']= $_POST['seller_vat'];
        $data['category_id']= $_POST['category_id'];
        $data['name']= $_POST['name'];
        $data['person_incharge']= $_POST['person_incharge'];
        $data['person_gender']= $_POST['person_gender'];
        $data['address']= $_POST['address'];
        $data['postal_code']= $_POST['postal_code'];
        $data['town']= $_POST['town'];
        $data['vat_registered']= $_POST['vat_registered'];


        $db = new Database;
        $model = new SellerInfoModel;

        $add = $model->addBusiness($db, $data);

        if ($add['create'] === true) {
            $result['reg_business'] =  true;
            $result['id'] = $add['id'];

            return  $result;
        } else {
            $result['reg_business'] =  false;

            $result['error'] = "Unable to register Business, Error Occurred: ";

            return  $result;
        }
    }
    /**
    * edit BusinessInfo
    */
    public function editBusiness($id)
    {
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
        $model = new SellerInfoModel;

        $cols = "registration_no=:registration_no,business_type=:business_type,seller_vat=:seller_vat,
            category_id=:category_id,name=:name2,person_incharge=:person_incharge,
            person_gender=:person_gender,address=:address,
            postal_code=:postal_code,town=:town,vat_registered=:vat_registered,";
        
        $fillable = "sellers_business_info";
        $key = "business_id";
        $update = $model->editBusiness($db, $id, $fillable, $data, $key);

        if ($update) {
            return true;
        } else {
            return "Unable to update Seller Business Information, Error Occurred";
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
    public function addPayments()
    {
        $data['mpesa_name'] = $_POST['mpesa_name'];
        $data['seller_id'] = $_POST['seller_id'];
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
        $model = new SellerInfoModel;

        $add = $model->addPayment($db,$data);

        if ($add['create'] === true) {
            $result['reg_payments'] =  true;
            $result['id'] = $add['id'];

            return  $result;
        } else {
            $result['reg_payments'] =  false;

            $result['error'] = "Unable to add Payments, Error Occurred: ";

            return  $result;
        }
    }
    /**
    * edit Payments Info
    */
    public function editPayments($id)
    {
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
        $model = new SellerInfoModel;

        $cols= "mpesa_name=:mpesa_name,mpesa_phone=:mpesa_phone,bank_acc_name=:bank_acc_name,bank_acc_no=:bank_acc_no,
            bank_name=:bank_name,bank_code=:bank_code,bank_branch=:bank_branch,
            iban=:iban,swift=:swift,payment_mode=:payment_mode'";
        
        $fillable = "sellers_payments_info";
        $key = "payments_id";
        $update = $model->editPayment($db, $id, $fillable, $cols, $data, $key);

        if ($update) {
            return true;
        } else {
            return "Unable to update Seller Payment Information, Error Occurred";
        }
    }

    /**
    * List All Sellers
    */
    public function allUsers()
    {
        $db = new Database;
        $model = new UserModel;

        return $model->getSellers($db, $fillable);
    }
    /**
        * Get Single Seller Details
        */
    public function getUser($id)
    {
        $db = new Database;
        $model = new UserModel;
        ;
        return $model->getSeller($db, $fillable, $tablekey, $id);
    }
}
