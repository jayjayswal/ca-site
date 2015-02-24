 <?php
 if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
require_once '../../db/faculty_experience_class.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
 session_start();

define('INCLUDE_CHECK', true);

if(isset($_POST['expID']))
{
    $e_id=$_POST['expID'];
}
else
{
    die('Experience id is required');
}

if(isset($_POST['facultyID']))
{
    $faculty_id=$_POST['facultyID'];
}
else
{
    die('faculty id is required');
}
if(isset($_POST['insName']))
{
    $ins_name=$_POST['insName'];
}
else
{
   die('Institute name is required');
}

if(isset($_POST['desig']))
{
    $desig=$_POST['desig'];
}
else
{
   die('designation name is required');
}
if(isset($_POST['year']))
{
    $year=$_POST['year'];
}
else
{
   die('Year is required');
}

$desi=new faculty_experience_class($e_id,$faculty_id,$ins_name, $year, $desig);
echo $desi->updateExperience();

$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $e_id." experience added");
$l->insertlog();

?>