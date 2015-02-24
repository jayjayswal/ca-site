<?php
//define('INCLUDE_CHECK', true);
//require_once '../db/connect.php';
//require_once '../db/function.php';
//if (!isset($_POST['username']) || !isset($_POST['password'])) {
//    echo "false";
//} else {
//    $username = $_POST['username'];
//    $password = $_POST['password'];
//    $password = sha1($password);
//    
//    try {
//        $rows_returned = login($username,$password);
//        if ($rows_returned == 1) {
////			$role=getRole($username);
////			while ($row = mysql_fetch_array($role)) {
////			$roleName = $row['role_name'];
////			}
//			$answer="";
//                        session_start();
//            $_SESSION['username'] =$username;
////			$_SESSION['role'] =$roleName;
//			$_SESSION['answer'] =$answer;
//            echo "true";
//         
//        } else {
//             echo "false";
//        }
//    } catch (Exception $e) {
//        die("There was a problem: " . $e->getMessage());
//
//    }
//}

require_once '../db/user_class.php';
if (!isset($_POST['username']) || !isset($_POST['password'])) 
{
    die("false");
}
 else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = sha1($password);
        
        try {
            $user=user_class::getUserObject($username);
            
            if($user==false)
            {
                die("false");
            }
             else {
                 if($user->getpass()!=$password)
                 {
                     die("false");
                 }
                 else
                 {
                     session_start();
                     $_SESSION['user']=$user;
                    //  $_SESSION['username'] =$user->username;
                     echo $user->role_id;
                 }
             }
        }
        catch (Exception $e) {
        die("There was a problem: " . $e->getMessage());
    }
}
?>


