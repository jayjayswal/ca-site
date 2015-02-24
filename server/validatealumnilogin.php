<?php
define('INCLUDE_CHECK', true);
require_once '../CMS/db/ConnectionClass.php';
require_once '../CMS/db/alumni_detail.php';
function login($username, $password) 
{
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{

                    $num = Alumni_Detail::getNoOfAlumni($username, $password);
                    if($num==1){
                         $alu=  Alumni_Detail::getAlumniObject($username);  
                            if($alu->alumni_status==1)
                             {
                                
                                    session_start();
                                    $_SESSION['alumniuser']=$alu;
                                    return 1;
                             }
                             else{
                                 return 2;
                             }
                    }             
                 else
                    {
                        return 0;
                        getConnection::closeConnection($con);
                    }
               
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();            
            getConnection::closeConnection($con);
        }
}

if (!isset($_POST['Username']) || !isset($_POST['Passwd'])) {
    echo "1false";
} else {
    $username = $_POST['Username'];
    $password = $_POST['Passwd'];
    $pass = sha1($password);
    try {
        $rows_returned = login($username,$pass);
        echo $rows_returned;
    } 
    catch (Exception $e) {
        die("There was a problem: " . $e->getMessage());

   }
}
?>


