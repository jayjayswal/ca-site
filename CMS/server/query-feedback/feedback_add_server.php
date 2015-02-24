 <?php
 if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
require_once '../../db/feedback_detail.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
session_start();
define('INCLUDE_CHECK', true);


if(isset($_POST['name']))
{
    $name=$_POST['name'];
}
else
{
    die('Name is required');
}
if(isset($_POST['email']))
{
    $email=$_POST['email'];
}
else
{
    die('email is required');
}
if(isset($_POST['feed']))
{
    $feed=$_POST['feed'];
}
else
{
   die('feddback is required');
}

$a=new Feedback_Detail(NULL, NULL, $name, $email, $feed);
echo $a->insertFeedback();
$l=new site_log(NULL, NULL,"Visitor", $_SERVER['REMOTE_ADDR'], $name." added");
$l->insertlog();
?>