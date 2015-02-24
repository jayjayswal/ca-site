<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
if(!isset($_GET['id']))
{
    die("go to faculty management page");
}
$id=$_GET['id'];
require_once '../../db/faculty_experience_class.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
 session_start();

$a= faculty_experience_class::deleteExperience($id);
$_SESSION['answer']=$a;

$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $id." experience deleted");
$l->insertlog();

header('Location: ../../faculty_experience_manage_detail.php?id='.$_GET['faculty']);

?>
