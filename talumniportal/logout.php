<?php
require_once '../CMS/db/user_class.php';
require_once '../CMS/db/alumni_detail.php';
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['alumniuser'])) {
    header("location:login.php");
}
else{
   session_cache_expire();
session_destroy();
header("location:login.php");
exit(); 
}
?>