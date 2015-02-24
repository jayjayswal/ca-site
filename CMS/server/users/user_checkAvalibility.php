<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
if(isset($_GET['uname']) && $_GET['uname']!="")
{
    require_once '../../db/user_class.php';

    $r=  user_class::checkAvalibility($_GET['uname']);
    echo $r ;
}
 else {
    die("Enter Username First.");
}
?>
