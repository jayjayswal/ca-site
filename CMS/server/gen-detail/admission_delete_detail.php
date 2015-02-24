<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
require_once '../../db/admission_detail_class.php';
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

$a= admission_detail::deleteDetail($ti, $pro);
$_SESSION['answer']=$a;
$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $ti." admission details deleted");
$l->insertlog();
header('Location: ../../admission_manage_detail.php');

?>
