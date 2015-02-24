 <?php
 if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
require_once '../../db/query_detail_class.php';
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
if(isset($_POST['query']))
{
    $query=$_POST['query'];
}
else
{
   die('query is required');
}

$a=new query_detail_class(NULL, NULL, $name, $email, $query, NULL, "0");
echo $a->insertQuery();
$l=new site_log(NULL, NULL,"visitor", $_SERVER['REMOTE_ADDR'], $name." query added");
$l->insertlog();
?>