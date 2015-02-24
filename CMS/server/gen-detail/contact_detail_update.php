<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
require_once '../../db/contact_detail_class.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
session_start();

$de=new contact_detail($_POST['editor1']);
 $answer = $de->handlerequest();
 echo $answer;
 $l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], " contact details updated");
$l->insertlog();
?>
