 <?php
 if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
require_once '../../db/slider_photoClass.php';
require_once '../../db/ImageManipulator.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
session_start();

if(isset($_POST['photoId']))
{
    $p_id=$_POST['photoId'];
    $ob=  Slider_PhotoClass::getImagesObject($p_id);
}
else
{
    die("photo id is missing.");
}
if(isset($_POST['Category']))
{
    $sc_name=$_POST['Category'];
}
else
{
    die("Enter Category Name");
}

if(isset($_POST['caption']))
{
    $sc_caption=$_POST['caption'];
}
else
{
    die("Enter photo caption");
}
  $imageurl=$ob->url;

$a= new Slider_PhotoClass($p_id, $imageurl, $sc_name, $sc_caption, "1");
echo $a->updateImage();
$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $sc_caption." slider photo updated");
$l->insertlog();
?>