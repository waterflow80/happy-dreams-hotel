<?php
//This model will interact with the database to manupilate the data flow,
//to save or retrieve this data
require "./utils/dbConnect.php";

/**This class will be charged of saving the new client's info in 
 * the data base.
 */
class ClientModel{
    //private $connection = DBConnect::getInstance();
    /**Saves the client in the database client table
     * The $client should be $_POST array that contains user's information
    */
    public static function saveClientAccount($client){
        $connection = DBConnect::getInstance();
        $sql = "INSERT INTO Account(email,password,userName,role) VALUES('".$client['email']."', '".$client['password']."','".$client['username']."','client')";
        if (!$connection->query($sql)){
            echo("Error saving client Account! " . $connection->error);
            return -1;
        }else{
            echo("Client Account saved successfully !");
            return $connection->insert_id;
        }
    }

    public static function saveClientEntity($client, $accountId){
        $connection = DBConnect::getInstance();
        $sql = "INSERT INTO client(accountId, firstName, lastName, nationalIdNumber, phoneNumber) VALUES('".$accountId."','".$client['firstName']."','".$client['lastName']."','".$client['NIdNumber']."','".$client['phone']."')";
        if (!$connection->query($sql)){
            echo("Error saving client entity! ". $connection->error);
            return -1;
        }else {
            echo("Client Entity saved successfully !");
            return $connection->insert_id;
        }
    }
}

?>