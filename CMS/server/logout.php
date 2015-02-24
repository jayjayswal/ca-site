<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header("location:../index.php");
}
session_cache_expire();
session_destroy();
header("location:../index.php");
exit();
?>
