<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
require_once '../../db/user_class.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';

define('INCLUDE_CHECK', true);

session_start();

$username=$_SESSION['user']->username;

if(isset($_POST['opassword']))
{
    $opassword=$_POST['opassword'];
}
else
{
   die("Enter old Password");
}
if(sha1($opassword)!=$_SESSION['user']->password){
     die("wrong old password");
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


    $id=$_SESSION['user']->role_id;


$u=new user_class($username, $password, $id);
echo $u->updateUser();
$user=user_class::getUserObject($username);
$_SESSION['user']=$user;
$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $username." changed password");
$l->insertlog();
?>