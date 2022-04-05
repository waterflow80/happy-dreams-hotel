<?php
require_once ("/var/www/html/hotel/models/accountModel.php");
require_once ("/var/www/html/hotel/utils/save.php"); // The Save object is used to specify the state and the error message of some operations.
require_once "/var/www/html/hotel/models/visitModel.php"; 

/**Hnadles the client's or the admin's login */
class LoginController{

    /**Attempt to login the user after checking his credentials like email and password */
    public static function loginUser($user){
        $account = AccountModel::getAccount($user);
        if ($account == null){
            // Email Was not found !
            return new Save(false, "Email not found !");
        }else {
            // Logging in the user
            if (strcmp($account->getPassword(), $user['password']) == 0){ // Check if the password matches the email address of the account.
                if ($account->getRole() == 'client'){ // The user is a 'Client'
                    $visitAdded = VisitModel::addAccountVisit($account->getAccountId());
                    header("Location:/hotel/views/post-login/client/clientHome.php");
                    exit();
                }else { // The user is an 'Admin'
                    header("Location:/hotel/views/post-login/admin/home.php");
                    exit();
                }
                
            }else {
                // Wrong Passwor Entered
                return new Save(false, "Wrong Password !");
            }
            
            
        }
    }
}

?>
