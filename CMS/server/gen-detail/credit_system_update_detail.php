<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
require_once '../../db/credit_system_detaill_class.php';
define('INCLUDE_CHECK', true);
//require_once '../db/connect.php';
//require_once '../db/function.php';
require_once '../../db/CourseClass.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';

session_start();

if(isset($_POST['title']))
{
    $ti=$_POST['title'];
}
else
{
    $ti=NULL;
}
if(isset($_POST['programme']))
{
    $pro=$_POST['programme'];
}
else
{
    $pro=NULL;
}
if(isset($_POST['editor1']))
{
    $edi=$_POST['editor1'];
}
else
{
    $edi=NULL;
}

$a=new credit_system($ti,$edi,$pro);
echo $a->updateDetail();
$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $ti." credit system details updated");
$l->insertlog();
?>
