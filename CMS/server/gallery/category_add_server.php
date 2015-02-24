 <?php
 if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
require_once '../../db/slider_categor_class.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
session_start();

if(isset($_POST['categoryName']))
{
    $sc_name=$_POST['categoryName'];
}
else
{
    die("Enter Category Name");
}

if(isset($_POST['categoryColor']))
{
    $sc_color=$_POST['categoryColor'];
}
else
{
    die("Enter Category color");
}

$a= new Slider_CategoryClass(NULL, $sc_name, $sc_color);
echo $a->insertCategory();

$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $sc_name." category added");
$l->insertlog();
?>