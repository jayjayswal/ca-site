 <?php
 if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
require_once '../../db/faculty_detail_class.php';
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
if(isset($_POST['faculty_prefix']))
{
    $faculty_prefix=$_POST['faculty_prefix'];
}
else
{
    die("prefix needed.");
}

if(isset($_POST['faculty_name']))
{
    $faculty_name=$_POST['faculty_name'];
}
else
{
    die("faculty name needed.");
}

if(isset($_POST['faculty_uname']))
{
    $faculty_username=$_POST['faculty_uname'];
}
else
{
    $faculty_username=NULL;
}


if(isset($_POST['faculty_designation']))
{
    $faculty_designation=$_POST['faculty_designation'];
}
else
{
    die("designation needed");
}

if(isset($_POST['faculty_email']))
{
    $faculty_email=$_POST['faculty_email'];
}
else
{
    die("email needed");
}

if(isset($_POST['facultylinkedin_id']))
{
    $facultylinkedin_id=$_POST['facultylinkedin_id'];
}
else
{
    $facultylinkedin_id=NULL;
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
      $ran=gen_random_string(8);
      $filename= $faculty_name."_".$ran.".".$extension;
    if (file_exists("../../facultyImages/" . $filename))
      {
      die($filename. " already exists. ");
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"], "../../facultyImages/" . $filename);
    //  echo "Stored in: " . "facultyImages/" . $faculty_name.".".$extension;
      $imageurl="facultyImages/" . $filename;
      }
    }
  }
else
  {
  die ( "Invalid file extension or file size grater then 2MB. ");
  }
}
 else {
    $imageurl=NULL;
}

$fa=new faculty_detail_class(NULL,$faculty_prefix,$faculty_name,$faculty_email,$facultylinkedin_id,$imageurl, $faculty_username, $faculty_designation);
$re= $fa->insertFaculty();
if($re!=1){
    if($_FILES["file"]["name"]){
        if(file_exists("../../facultyImages/" . $filename)){
            unlink("../../facultyImages/" . $filename);
        }
    }
}
echo $re;
$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $faculty_name." faculty added");
$l->insertlog();



?>