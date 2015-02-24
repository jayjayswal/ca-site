<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once '../../db/site_log_class.php';
switch ($_GET['req'])
{
    case "userDetails":
        $a= site_log::getAllLogofuser($_GET['value']);
        if($a===0)
        {
            die("No logs ");
        }
        else
        {
        echo "<table><tr><th>ID</th><th>Time</th><th>User name</th><th>IP</th><th>Description</th></tr>";

        foreach ($a as $arr) {
            echo "<tr><td>$arr->log_id</td><td>$arr->log_time</td><td>$arr->log_uname</td><td>$arr->log_ip</td><td>$arr->log_desc</td></tr>";
        } 
        echo "</table>";
        }
            break;
            
    case "all":
        $a= site_log::getAllLog();
        if($a===1)
        {
            die("No logs ");
        }
        else
        {
        echo "<table><tr><th>ID</th><th>Time</th><th>User name</th><th>IP</th><th>Description</th></tr>";

        foreach ($a as $arr) {
            echo "<tr><td>$arr->log_id</td><td>$arr->log_time</td><td>$arr->log_uname</td><td>$arr->log_ip</td><td>$arr->log_desc</td></tr>";
        } 
        echo "</table>";
        }
            break;
            
       case "date":
           $a= site_log::getAllLogdate($_GET['value']);
        if($a==0)
        {
            die("No logs ");
        }
        else
        {
        echo "<table><tr><th>ID</th><th>Time</th><th>User name</th><th>IP</th><th>Description</th></tr>";

        foreach ($a as $arr) {
            echo "<tr><td>$arr->log_id</td><td>$arr->log_time</td><td>$arr->log_uname</td><td>$arr->log_ip</td><td>$arr->log_desc</td></tr>";
        } 
        echo "</table>";
        }
            break;
    
}


?>