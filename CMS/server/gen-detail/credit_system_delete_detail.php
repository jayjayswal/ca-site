<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
require_once '../../db/credit_system_detaill_class.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
session_start();
if(!isset($_GET['title']) || !isset($_GET['pro']) )
{
    die("go to admission management page");
}
$ti=$_GET['title'];
$pro=$_GET['pro'];

session_start();

$a= credit_system::deleteDetail($ti, $pro);
$_SESSION['answer']=$a;
$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $ti." credit sytem details deleted");
echo $l->insertlog();
header('Location: ../../credit_system_manage_detail.php');

?>
