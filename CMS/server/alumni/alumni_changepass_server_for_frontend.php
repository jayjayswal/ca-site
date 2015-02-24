 <?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}

require_once '../../db/alumni_detail.php';
require_once '../../db/ImageManipulator.php';
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['alumniuser'])) {
    header("location:../../../talumniportal/login.php");
}

require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
$lu=  Alumni_Detail::getAlumniObject($_SESSION['alumniuser']->alumni_uname);

define('INCLUDE_CHECK', true);

if(isset($_POST['opassword']))
{
    $oldpassword=$_POST['opassword'];
}
else
{
   die("Enter old Password");
}
if(sha1($oldpassword)!=$lu->alumni_password){
    die("wrong current password");
}



if(isset($_POST['password']))
{
    $password=$_POST['password'];
}
else
{
   die("Enter new Password");
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



echo Alumni_Detail::changepass($password, $lu->alumni_uname);
//
$l=new site_log(NULL, NULL,$lu->alumni_uname, $_SERVER['REMOTE_ADDR'], $lu->alumni_first_name." ".$lu->alumni_last_name." alumni password changed");
$l->insertlog();
?>