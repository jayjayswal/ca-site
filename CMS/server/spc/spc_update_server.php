<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
define('INCLUDE_CHECK', true);
require_once '../../db/spc_executive_class.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
session_start();

if(isset($_POST['id'])){
    $id=$_POST['id'];
}
 else{
     die("choose prefix");
 }
 
if(isset($_POST['prefix'])){
    $prefix=$_POST['prefix'];
}
 else{
     die("choose prefix");
 } 
 if(isset($_POST['name'])){
      $name = $_POST['name'];
 }
 else{
     die("Insert Name");
 }
 if(isset($_POST['phno'])){
    $phno=$_POST['phno'];
}
 else{
     die("insert phone number");
 }
 
 if(isset($_POST['year'])){
     $year=$_POST['year'];
}
 else{
     die("insert year");
 }
        $spc=new Spc_Executive($id,$prefix,$name , $phno, $year);
      echo $spc->updateSpcExecutive();
	  
$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $id." spc details updated");
$l->insertlog();
 
?>
