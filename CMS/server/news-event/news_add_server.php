<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
require_once '../../db/news_event_class.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
session_start();
if(isset($_POST['newsEventsId']))
{
    $NE_id=$_POST['newsEventsId'];
}
else
{
    $NE_id=NULL;
}

if(isset($_POST['newsEventsDate']))
{
    $NE_date=$_POST['newsEventsDate'];
}
else
{
    $NE_date=NULL;
}

if(isset($_POST['newsEventsDesc']))
{
    $NE_desc=$_POST['newsEventsDesc'];
}
else
{
    $NE_desc=NULL;
}

if(isset($_POST['newsEventsUrl']))
{
    $NE_Url=$_POST['newsEventsUrl'];
}
else
{
    $NE_Url=NULL;
}

if(isset($_POST['type']))
{
    $NE_type=$_POST['type'];
}
else
{
    $NE_type=NULL;
}

$n=new news_event_class($NE_id,$NE_date,$NE_desc,$NE_Url,$NE_type);
echo $n->insertNewsEvent();
$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $NE_id." news details added");
$l->insertlog();
?>
