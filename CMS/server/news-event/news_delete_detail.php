<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
require_once '../../db/news_event_class.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';

if(!isset($_GET['id']))
{
    die("go to news event management page");
}
$ti=$_GET['id'];


require_once '../../db/user_class.php';
if (!isset($_SESSION)) {
    session_start();
}
$user = $_SESSION['user'];
if($user->role_id==5){
    $ob=  news_event_class::getNewsEventsObject($ti);
    if($ob!=0){
        if($ob->news_event_type!="CASA"){
            header("location: ../../access_denied.php?data=You don't have access to delete this news.");
        }
    }
}
$a= news_event_class::deleteNewsEvents($ti);
$_SESSION['answer']=$a;
$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $ti."news details deleted");
$l->insertlog();
header('Location: ../../news-event_manage_detail.php?ADS='.$a);

?>
