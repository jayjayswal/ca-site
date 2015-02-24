<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}

require_once '../../db/horizon_issueclass.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
session_start();
if(!isset($_GET['id']))
{
   die("first go to horizon management page.");
}
$ti=$_GET['id'];
$ob=  Horizon_IssueClass::getHorizonIssueObject($ti);
if(file_exists("../../".$ob->horizon_photo_url)){
unlink("../../".$ob->horizon_photo_url);
}

$a= Horizon_IssueClass::deleteHorizonIssue($ti);
$_SESSION['answer']=$a;
$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $ti." horizon issue deleted");
$l->insertlog();
header('Location: ../../horizon_manage_detail.php');

?>
