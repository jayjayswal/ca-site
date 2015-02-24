<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
require_once '../../db/faculty_detail_class.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
 session_start();

if(!isset($_GET['id']))
{
   die("first go to faculty management page.");
}
$ti=$_GET['id'];

$ob=  faculty_detail_class::getFacultyObject($ti);

      if(file_exists('../../'.$ob->faculty_image_url)){
          unlink('../../'.$ob->faculty_image_url);
      }
$a= faculty_detail_class::deleteFaculty($ti);
$_SESSION['answer']=$a;

$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $ti." faculty detail deleted");
$l->insertlog();

header('Location: ../../faculty_bmanage_detail.php');

?>
