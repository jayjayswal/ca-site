 <?php
 if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
require_once '../../db/query_detail_class.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
session_start();
define('INCLUDE_CHECK', true);


if(isset($_POST['queryID']))
{
    $id=$_POST['queryID'];
}
else
{
    die('ID is required');
}
if(isset($_POST['reply']))
{
    $reply=$_POST['reply'];
}
else
{
    die('ID is required');
}

$de= query_detail_class::getQueryObject($id);
if($de===0){
    die("invalid query");
}
$de->query_reply=$reply;
$to = $de->query_email;
$subject = "M.S.University, Replay of query ";
$message = $reply;
$from = "ca@msu.com";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo $de->doReplay();

$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $id." query deleted");
$l->insertlog();
?>