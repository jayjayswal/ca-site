<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}

require_once '../../db/spc_executive_class.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
session_start();
if(!isset($_GET['id']))
{
   die("first go to SPC management page.");
}
$ti=$_GET['id'];
$ob= Spc_Executive::deleteSpcExecutive($ti);

$_SESSION['answer']=$ob;

$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $ti." spc details deleted");
$l->insertlog();
header('Location: ../../spc_manage_detail.php');

?>
