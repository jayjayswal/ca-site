 <?php
 if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
require_once '../../db/horizon_issueclass.php';
require_once '../../db/ImageManipulator.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
session_start();
function gen_random_string($length=16)
{
    $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";//length:36
    $final_rand='';
    for($i=0;$i<$length; $i++)
    {
        $final_rand .= $chars[ rand(0,strlen($chars)-1)];
 
    }
    return $final_rand;
}

if(isset($_POST['id']))
{
    $id=$_POST['id'];
    $object= Horizon_IssueClass::getHorizonIssueObject($_POST['id']);
}
else
{
    die("some thing wrong.");
}

if(isset($_POST['version']))
{
    $version=$_POST['version'];
}
else
{
    die("Insert version.");
}

if(isset($_POST['date']))
{
    $date=$_POST['date'];
}
else
{
    die("Insert Date.");
}

if(isset($_POST['url']))
{
    $issueURL=$_POST['url'];
}
else
{
    die("insert url of horizon issue.");
}


if($_FILES["file"]["name"]){

    $allowedExts = array( "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2048000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
   die("Return Code: " . $_FILES["file"]["error"] . "<br>");
    }
  else
    {
  //  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
   // echo "Type: " . $_FILES["file"]["type"] . "<br>";
   // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
   // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
      $ran= gen_random_string(8);
      $filename=$version."_".$ran.".".$extension;

    //  move_uploaded_file($_FILES["file"]["tmp_name"], "../../slider_images/" . $pname.".".$extension);
    //  echo "Stored in: " . "facultyImages/" . $faculty_name.".".$extension;
    //  $imageurl="slider_images/" . $pname.".".$extension;
        
        $manipulator = new ImageManipulator($_FILES['file']['tmp_name']);
        // resizing to 200x200
        $newImage = $manipulator->resample(206,291);
        // saving file to uploads folder
        $manipulator->save('../../horizonImages/'. $filename);
        $imageurl="horizonImages/" . $filename;
        if(file_exists('../../'.$object->horizon_photo_url)){
            unlink('../../'.$object->horizon_photo_url);
        }
        
      
    }
  }
else
  {
  die ( "Invalid file extension or file size grater then 2MB. ");
  }
}
 else {
    $imageurl=$object->horizon_photo_url;
}

$ho=new Horizon_IssueClass($id, $version, $date, $issueURL, $imageurl);
echo $ho->updateHorizonIssue();

$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $id." horizon issue updated");
$l->insertlog();
?>