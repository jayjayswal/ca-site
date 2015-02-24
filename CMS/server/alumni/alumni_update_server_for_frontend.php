 <?php
 require_once '../../db/user_class.php';
require_once '../../db/alumni_detail.php';
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['alumniuser'])) {
    header("location:../../../talumniportal/login.php");
}
require_once '../../db/alumni_detail.php';
require_once '../../db/ImageManipulator.php';

require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
$lu=  Alumni_Detail::getAlumniObject($_SESSION['alumniuser']->alumni_uname);

define('INCLUDE_CHECK', true);

$username=$lu->alumni_uname;

if(isset($_POST['email']))
{
    $email=$_POST['email'];
}
else
{
    die("email needed");
}

if(isset($_POST['linkedin_id']))
{
    $linkedin_id=$_POST['linkedin_id'];
}
else
{
    $linkedin_id=NULL;
}


if(isset($_POST['batch']))
{
    $batch=$_POST['batch'];
}
else
{
   die("insert batch year");
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
    //  move_uploaded_file($_FILES["file"]["tmp_name"], "../../slider_images/" . $pname.".".$extension);
    //  echo "Stored in: " . "facultyImages/" . $faculty_name.".".$extension;
    //  $imageurl="slider_images/" . $pname.".".$extension;
        
        $manipulator = new ImageManipulator($_FILES['file']['tmp_name']);
        // resizing to 200x200
        $newImage = $manipulator->resample(125,125);
        
        
        $manipulator->save('../../alumni_photos/'. $username.".".$extension);
        $imageurl="alumni_photos/" . $username.".".$extension;
      
    }
  }
else
  {
  die ( "Invalid file extension or file size grater then 2MB.");
  }
}
 else {
    $imageurl=$lu->alumni_photo_url;
}

//uploading pdf
                if($_FILES["rfile"]["name"]){
                    if ($_FILES["rfile"]["type"] == "application/pdf" && ($_FILES["rfile"]["size"] < 2048000)) {
                        $tempr = explode(".", $_FILES["rfile"]["name"]);
                        $rextension = end($tempr);
                              //  echo "Upload: " . $_FILES["cfile"]["name"] . "<br />";
                               // echo "Type: " . $_FILES["cfile"]["type"] . "<br />";
                               // echo "Size: " . ($_FILES["cfile"]["size"] / 1024) . " Kb<br />";
                              //  echo "Temp file: " . $_FILES["cfile"]["tmp_name"] . "<br />";
                                move_uploaded_file($_FILES["rfile"]["tmp_name"], "../../alumni_resume/" . $username.".".$rextension);
                              //  echo "Stored in: " . "../resumes/" . $_FILES["cfile"]["name"];
                                
                                $rurl="alumni_resume/".$username.".".$rextension;
                        }
                         else {
                           die( "Invalid file extension or file size grater then 2MB.") ;
                        }
                }
                else
                {
                    
                    $rurl=$lu->alumni_resume_url;
                }

$alu=new Alumni_Detail($lu->alumni_uname,$lu->alumni_first_name, $lu->alumni_last_name, $email, $linkedin_id, $rurl, $batch, $imageurl, NULL,"1");
echo $alu->updateAlumni();
//
$l=new site_log(NULL, NULL,$lu->alumni_uname, $_SERVER['REMOTE_ADDR'], $lu->alumni_first_name." ".$lu->alumni_last_name." alumni profile update");
$l->insertlog();
?>