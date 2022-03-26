<?php
    /**Here we'll be handling the database connection.
     * Using Mysql server.
     */

    
/**Returns a database connection instance
 */
class DBConnect {
    
    private static $SERVER_NAME = "localhost"; //your local server
    private static $DB_NAME = 'databse_name';
    private static $USER = 'root'; //user name
    private static $PASWORD = 'you_passsword';
    
    public static function getInstance(){
        $connection = new mysqli(DBConnect::$SERVER_NAME,DBConnect::$USER,DBConnect::$PASWORD,DBConnect::$DB_NAME);
        
        // Check connection
        if ($connection -> connect_errno) {
            echo "Failed to connect to MySQL: " . $connection -> connect_error;
            return null;
            //exit();
        }
        else{
            return $connection;
        }
    
    }
    


}

?>
