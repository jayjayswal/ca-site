<?php

function myException($exception)
{
echo "<b>Exception:</b> " , $exception->getMessage();
}
set_exception_handler('myException');
error_reporting(0); // don't show any warnings


class getConnection
{
    private static $host="localhost";
    private static $username="iewoin_msubca";
     private static $pass="jayswal@1";
     private static $db_database = 'iewoin_bcasite';
    public static function connectToDatabase()
    {       
        try 
        {
            $con=mysqli_connect(self::$host,self::$username,self::$pass);
            if(!$con)
             {
                throw new Exception("Cannot connect to the database");
             }  
        }
        catch(Exception $e) 
        {
            echo 'Message: ' .$e->getMessage();
        }
               return $con;        
    }
    
    public static function selectDatabase($con)
    { 
        try 
        {
            mysqli_select_db($con,self::$db_database); 
            if(mysqli_error($con))
             {
                throw new Exception("Cannot Select the database.");
             }  
        }
        catch(Exception $e) 
        {
            echo 'Message: ' .$e->getMessage();
        }
    }
    
    public static function closeConnection($connection)
    {
        try 
        {
            mysqli_close($connection); 
        }
        catch(Exception $e) 
        {
            echo 'Message: ' .$e->getMessage();
        }
    }
    
}


$cone=getConnection::connectToDatabase();
getConnection::selectDatabase($cone);
getConnection::closeConnection($cone);
?>
