<?php
require_once ("/var/www/html/hotel/utils/checks.php");
require_once ("/var/www/html/hotel/utils/save.php");
require_once ("/var/www/html/hotel/models/clientDAO.php");

/**Handles adding a new user as a client and creating an account for him */
class RegistrationController {
    
    /**Checks the user's information, and returns a Save object 
     * that contains information about the save attempt
     */
    public function addUser($userInfo) {
        if (!checkStringMinLength($userInfo['firstName'], 2)){
            return new Save(false, "First Name min length sould be 2 characters !");
        }
        if (!checkStringMinLength($userInfo['lastName'], 2)){
            return new Save(false, "Last Name min length sould be 2 characters !");
        }
        if (!isValidNationalIdNumber($userInfo['NIdNumber'])){
            return new Save(false, "Not valid National Id Number !");
        }
        if(!isValidPhoneNumber($userInfo['phone'])){
            return new Save(false, "Not valid Tunisian phone number");
        }
        if (!isEmailValid($userInfo['email'])){
            return new Save(false, "Non valid email !");
        }
        if (!checkStringMinLength($userInfo['password'], 8)){
            return new Save(false, "Password should be at least 8 characters !");
        }
        if (!isPasswordConfirmed($userInfo['password'], $userInfo['confirmPassword'])){
            return new Save(false, "Password does not match");
        }     
        if (!checkStringMinLength($userInfo['username'], 4)){
            return new Save(false, "Username min length sould be 4 characters !");
        }
        
        // If all information all well formed
        $clientAccountId = ClientModel::saveClientAccount($userInfo);
        if ($clientAccountId == -1){
            return new Save(false, "Error Saving the Client Account !");
        }else {
            $clientId = ClientModel::saveClientEntity($userInfo, $clientAccountId);
            if ($clientId == -1){
                return new Save(false, "Error Saving the Client Entity !");
            }else {
                return new Save(true, "User Registered Successfully!");

            }
        }


    }


}




?>