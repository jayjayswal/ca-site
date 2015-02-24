<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}

require_once '../../db/CourseClass.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
session_start();
if(!isset($_GET['id']))
{
   die("first go to course management page.");
}
$ti=$_GET['id'];
$ob= course::getcourseobject($ti);
if(file_exists("../../".$ob->course_url)){
unlink("../../".$ob->course_url);
}

$a= course::deleteCourse($ti);
$_SESSION['answer']=$a;

$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $ti." course deleted");
$l->insertlog();
header('Location: ../../course_manage_detail.php');

?>
