 <?php
 if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
require_once '../../db/slider_photoClass.php';
require_once '../../db/ImageManipulator.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
session_start();
$max=  Slider_PhotoClass::getlastid();
$pname=$max+1;
if(isset($_POST['category']))
{
    $sc_name=$_POST['category'];
}
else
{
    die("Enter Category Name");
}

if(isset($_POST['description']))
{
    $sc_caption=$_POST['description'];
}
else
{
    die("Enter photo caption");
}
if($_FILES["file"]["name"]){

    $allowedExts = array( "jpeg", "jpg","JPG");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"]< 2048000)
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

//    if (file_exists("../../slider_images/" . $pname.".".$extension))
//      {
//      die($pname.".".$extension. " already exists. ");
//      }
//    else
//      {
    //  move_uploaded_file($_FILES["file"]["tmp_name"], "../../slider_images/" . $pname.".".$extension);
    //  echo "Stored in: " . "facultyImages/" . $faculty_name.".".$extension;
    //  $imageurl="slider_images/" . $pname.".".$extension;
        list($width, $height) = getimagesize($_FILES['file']['tmp_name']);
        $newwidth=$width*350/$height;
        
        $manipulator = new ImageManipulator($_FILES['file']['tmp_name']);
        // resizing to 200x200
        $newImage = $manipulator->resample($newwidth,350);
        // saving file to uploads folder
        $manipulator->save('../../slider_images/'. $pname.".".$extension);
        $imageurl="slider_images/" . $pname.".".$extension;
//      }
    }
  }
else
  {
  die ( "Sorry, Invalid file extention or file size greater than 2 MB.");
  }
}
 else {
    die ( "Choose file.");
}
$a= new Slider_PhotoClass(NULL, $imageurl, $sc_name, $sc_caption, "0");
echo $a->UploadPhotos($imageurl, $sc_name, $sc_caption);
$l=new site_log(NULL, NULL,"visitor", $_SERVER['REMOTE_ADDR'], $sc_caption." slider photo added");
$l->insertlog();
?>