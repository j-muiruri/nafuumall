<?php
/**
 * Sellers Controller Class
 *
 * @author John Muiruri <jontedev@gmail.com>
 */

require_once 'Db.php';
require_once 'admin/Model/UserModel.php';

class Sellers
{
    /**
     * add Seller Info
     */
    public function addSellers($section)
    {
        if ($section === "seller_add") {
            $data['0'] =$_POST['name1'];
            $data['1'] =$_POST['email_address'];
            $data['2'] =$_POST['phone'];
            $data['3'] =$_POST['referral'];
            $data['4'] =$_POST['national_id'];
            $data['5'] =$_POST['gender'];
            $data['6'] =$_POST['dob'];
            $data['7'] =$_POST['display_name'];
            $data['8'] =$_POST['contract']; //Yes or no - true or false
            $data['9'] =$_POST['password'];
            $options = [
            'cost' => 15,
        ];
            $data['9']  = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
            // $userType = $type;

            $db = new Database;
            $model = new UserModel;

            $cols = "name,email_address,phone,referral,national_id,gender,dob,display_name,contract,password";
        
            $fillable = "sellers_info(".$cols.")";
            $reg = implode('\', \'', $data);

            //add opening and closing quotes on reg or data before insert
            $add = $model->addUser($db, $fillable, "'".$reg."'");

            if ($add === true) {
                return true;
            } else {
                return "Unable to register Seller, Error Occurred: ".$add;
            }
        }
    }
    /**
    * edit Seller Info
    */
    public function editSellers($section)
    {
        if ($section === "seller_update") {
            $name =$_POST['name1'];
            $email =$_POST['email_address'];
            $phone =$_POST['phone'];
            $ref =$_POST['referral'];
            $national_id =$_POST['national_id'];
            $gender =$_POST['gender'];
            $dob =$_POST['dob'];
            $display_name =$_POST['display_name'];
            $contract =$_POST['contract']; //Yes or no - true or false
            $password =$_POST['password'];
            $id =$_POST['seller_id'];
            
            $data['9']  = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
            // $userType = $type;

            $db = new Database;
            $model = new UserModel;

            $data = "name='$name',email_address='$email',phone='$phone',referral='$ref',national_id='$national_id',
            gender='$gender',dob='$dob',display_name='$display_name',contract='$contract',password='$password'";
        
            $fillable = "sellers_info";

            $update = $model->editUser($db, $id, $fillable, $reg);

            if ($update === true) {
                return true;
            } else {
                return "Unable to update Seller, Error Occurred: ".$update;
            }
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
            $data['0']= $_POST['registration_no'];
            $data['1']= $_POST['business_type'];
            $data['2']= $_POST['seller_vat'];
            $data['3']= $_POST['category_id'];
            $data['4']= $_POST['name2'];
            $data['5']= $_POST['person_incharge'];
            $data['6']= $_POST['person_gender'];
            $data['7']= $_POST['address'];
            $data['8']= $_POST['postal_code'];
            $data['9']= $_POST['town'];
            $data['10']= $_POST['vat_registered'];


            $db = new Database;
            $model = new UserModel;

            $cols = "registration_no,business_type,seller_vat,category_id,name,person_incharge,person_gender,address,postal_code,town,vat_registered";
        
            $fillable = "sellers_business_info(".$cols.")";
            $reg = implode('\', \'', $data);

            //add opening and closing quotes on reg or data before insert
            $add = $model->addUser($db, $fillable, "'".$reg."'");

            if ($add === true) {
                return true;
            } else {
                return "Unable to register Seller Business Information, Error Occurred: ".$add;
            }
        }
    }
    /**
    * edit BusinessInfo
    */
    public function editBusiness($section)
    {
        if ($section === "business_update") {
            $registration_no = $_POST['registration_no'];
            $business_type = $_POST['business_type'];
            $seller_vat = $_POST['seller_vat'];
            $category_id = $_POST['category_id'];
            $name2 = $_POST['name2'];
            $person_incharge = $_POST['person_incharge'];
            $person_gender = $_POST['person_gender'];
            $address = $_POST['address'];
            $postal_code = $_POST['postal_code'];
            $town = $_POST['town'];
            $vat_registered = $_POST['vat_registered'];

            $db = new Database;
            $model = new UserModel;

            $data = "registration_no=$registration_no,business_type=$business_type,seller_vat=$seller_vat,category_id=$category_id,name=$name2,person_incharge=$person_incharge,
            person_gender=$person_gender,address=$address,postal_code=$postal_code,town=$town,vat_registered=$vat_registered,";
        
            $fillable = "sellers_business_info";
            $update = $model->editUser($db, $id, $fillable, $reg);

            if ($update === true) {
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
            $data['0'] = $_POST['mpesa_name'];
            $data['1'] = $_POST['mpesa_phone'];
            $data['2'] = $_POST['bank_acc_name'];
            $data['3'] = $_POST['bank_acc_no'];
            $data['4'] = $_POST['bank_name'];
            $data['5'] = $_POST['bank_code'];
            $data['6'] = $_POST['bank_branch'];
            $data['7'] = $_POST['iban'];
            $data['8'] = $_POST['swift'];
            $data['9'] = $_POST['payment_mode'];


            $db = new Database;
            $model = new UserModel;

            $cols = "mpesa_name,mpesa_phone,bank_acc_name,bank_acc_no,bank_name,bank_code,bank_branch,iban,swift,payment_mode";
        
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
    public function editPayments($section)
    {
        if ($section === "payments_update") {
            $mpesa_name = $_POST['mpesa_name'];
            $mpesa_phone = $_POST['mpesa_phone'];
            $bank_acc_name = $_POST['bank_acc_name'];
            $bank_acc_no = $_POST['bank_acc_no'];
            $bank_name = $_POST['bank_name'];
            $bank_code = $_POST['bank_code'];
            $bank_branch = $_POST['bank_branch'];
            $iban = $_POST['iban'];
            $swift = $_POST['swift'];
            $payment_mode = $_POST['payment_mode'];

            $db = new Database;
            $model = new UserModel;

            $data = "mpesa_name='$mpesa_name',mpesa_phone='$mpesa_phone',bank_acc_name='$bank_acc_name',bank_acc_no='$bank_acc_no',
            bank_name='$bank_name',bank_code='$bank_code',bank_branch='$bank_branch',iban='$iban',swift='$swift',payment_mode='$payment_mode'";
        
            $fillable = "sellers_payments_info";
            $update = $model->editUser($db, $id, $fillable, $reg);

            if ($update === true) {
                return true;
            } else {
                return "Unable to update Seller Payment Information, Error Occurred: ".$update;
            }
        }
    }
}
