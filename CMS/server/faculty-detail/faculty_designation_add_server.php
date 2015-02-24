 <?php
 if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
require_once '../../db/faculty_designation_class.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
 session_start();

define('INCLUDE_CHECK', true);


if(isset($_POST['designation_name']))
{
    $designation_name=$_POST['designation_name'];
}
else
{
    die('designation name is required');
}
if(isset($_POST['level']))
{
    $designation_level=$_POST['level'];
}
else
{
   die('designation level is required');
}

$desi=new faculty_designation_class("NULL",$designation_name,$designation_level);
echo $desi->insertDesig();

$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $designation_name." designation added");
$l->insertlog();

?>