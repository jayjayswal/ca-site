<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
require_once '../../db/alumni_detail.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
 session_start();


if(!isset($_GET['id']))
{
    die("go first to alumni management page.");
}
$id=$_GET['id'];


//session_start();

$a=  Alumni_Detail::ApproveAlumni($id) ;
echo $a;
$_SESSION['answer']=$a;

$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $id." alumni approved");
$l->insertlog();
header('Location: ../../alumni_user_manage_detail.php');
?>
