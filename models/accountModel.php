<?php
require_once ("/var/www/html/hotel/utils/dbConnect.php");
require_once ("/var/www/html/hotel/entities/account.php");


class AccountModel{

    /**Check if the account passed in already exists in the database or not
     * The account should be a $_POST array.
     * If exists return the account object
     * Else return null
     */
    public static function getAccount($account){
        $connection = DBConnect::getInstance();
        $email = $account['email'];
        $sql = "SELECT * FROM Account WHERE email = '".$email."'";
        $result = $connection->query($sql);
        if (!$result){
            echo "SQl ERROR: ".$connection->error;
        }else {
            if ($result->num_rows == 0){
                return null; // User account does not exist in the database;
            }else {
                while($row = $result->fetch_assoc()){
                    return new Account($row['accountId'],$row['email'],$row['password'], $row['userName'], $row['role']);
                    break; // returning the first record (which should be the only one)
                }
                
            }
        }
        
    }

    /**Delete the account of the client and all the related data */
    public static function deleteAccountById($accountId){
        $connection = DBConnect::getInstance();
        $sql = "DELETE FROM Account WHERE accountId=" . $accountId;
        $result = $connection->query($sql);
        if ($result){
            return true; // Account and Client deleted successfully !
        }else {
            echo "Cannot delete account with id " . $accountId . ". ERROR: " . $connection->error;
            return false;
        }
    }
}

?>