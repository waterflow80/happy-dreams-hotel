<?php

require "./models/accountModel.php";
require "./utils/save.php"; // The Save object is used to specify the state and the error message of some operations.

/**Hnadles the client's or the admin's login */
class LoginController{

    /**Attempt to login the user after checking his credentials like email and password */
    public static function loginUser($user){
        $account = AccountModel::getAccount($user);
        if ($account == null){
            return new Save(false, "Email not found !");
        }else {
            if (strcmp($account->getPassword(), $user['password']) == 0){ // Check if the password matches the email address of the account.
                echo "role: ".$account->getRole();
                if ($account->getRole() == 'client'){
                    header("Location:./clientHome.php");
                    exit();
                }else {
                    header("Location:./adminHome.php");
                    exit();
                }
                
            }else {
                return new Save(false, "Wrong Password !");
            }
            
            
        }
    }
}

?>