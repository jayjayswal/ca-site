<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
require_once '../../db/user_class.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';

define('INCLUDE_CHECK', true);

session_start();

if(isset($_POST['userName']))
{
    $username=$_POST['userName'];
}
else
{
    die("Enter User Name");
}


if(isset($_POST['password']))
{
    $password=$_POST['password'];
}
else
{
   die("Enter Password");
}

if(isset($_POST['confirmPassword']))
{
    $cpassword=$_POST['confirmPassword'];
}
else
{
    die("Enter Confirm Password");
}

if($password!=$cpassword)
{
    die("Password mis-match");
}

if(isset($_POST['roles']))
{
    $id=$_POST['roles'];
}
else
{
    die("Select Role");
}

$u=new user_class($username, $password, $id);
echo $u->updateUser();

$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $username." user details updated");
$l->insertlog();
?>