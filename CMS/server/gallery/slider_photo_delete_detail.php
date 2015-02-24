<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}

require_once '../../db/slider_photoClass.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
session_start();
if(!isset($_GET['id']))
{
   die("first go to slider photo management page.");
}
$ti=$_GET['id'];
$ob= Slider_PhotoClass::getImagesObject($ti);
if(file_exists("../../".$ob->url)){
unlink("../../".$ob->url);
}

$a= Slider_PhotoClass::deleteImage($ti);
$_SESSION['answer']=$a;
$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $ti." slider photo deleted");
$l->insertlog();
header('Location: ../../slider_photo_manage.php?catid='.$ob->category_id);

?>
