<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}

require_once '../../db/student_class.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
session_start();
if(!isset($_GET['id']))
{
   die("first go to student management page.");
}
$ti=$_GET['id'];
$ob= Student::getstudentObjest($ti);
if(file_exists("../../".$ob->student_resume_url)){
unlink("../../".$ob->student_resume_url);
}

$a= Student::deletestudent($ti);
$_SESSION['answer']=$a;

$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $ti." student details deleted");
$l->insertlog();
header('Location: ../../student_manage_detail.php');

?>
