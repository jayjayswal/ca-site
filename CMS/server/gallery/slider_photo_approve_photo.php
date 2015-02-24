<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
session_start();
require_once '../../db/slider_photoClass.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';

if(!isset($_GET['id']))
{
   die("first go to slider photo management page.");
}
$ti=$_GET['id'];
$ob= Slider_PhotoClass::getImagesObject($ti);
if($ob===0){
    die("invalid photo");
}
$a=Slider_PhotoClass::approveImage($ti);
$_SESSION['answer']=$a;
$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $ti." slider photo approved");
$l->insertlog();
header('Location: ../../slider_photo_manage.php?catid='.$ob->category_id);

?>
