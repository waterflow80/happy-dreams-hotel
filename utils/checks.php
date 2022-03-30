<?php

/** Checks if an email is valid or not*/ 
function isEmailValid($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // invalid emailaddress
        return false;
    }else{
        return true;
    }
}

/**Check if the confirmed password matched the inital one */
function isPasswordConfirmed($password, $confirmedPassword){
    return strcmp($password, $confirmedPassword) == 0;
}

/**Checks the min length of a string */
function checkStringMinLength($string, $minLength){
    return strlen($string) >= $minLength;
}

/**Check if the input passed in the parameters is a valid 
 * national id number (Following the Tunisian format)
 */
function isValidNationalIdNumber($input){
    if (!is_numeric($input)){
        return false;
    }
    $regex = '/^(0|1)([0-9]){7}$/' ;
    if (!preg_match($regex, $input)){
        return false;
    }
    return true;
}

/**Check if the phone number is valid (Tunisian)
 * phone number.
 */
function isValidPhoneNumber($number){
    if (!is_numeric($number)){
        return false;
    }
    $regex = "/^(2|9|5)([0-9]{7})$/";
    if (!preg_match($regex, $number)){
        return false;
    }
    return true;
}

/**Check all user information
 * Return a Save object in case of a problem
 */
/* function isValidUserInfo($userInfo){
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
} */
?>