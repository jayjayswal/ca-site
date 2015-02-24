<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}
define('INCLUDE_CHECK', true);
require_once '../../db/CourseClass.php';
require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
session_start();

if(isset($_POST['courseId'])){
    $id=$_POST['courseId'];
}
 else{
     die("Insert Course ID.");
 } 
 if(isset($_POST['programme'])){
      $pro = $_POST['programme'];
 }
 else{
     die("choose Programme ");
 }
 if(isset($_POST['semester'])){
    $semester=$_POST['semester'];
}
 else{
     die("insert semester");
 }
 
 if(isset($_POST['credit'])){
     $credit=$_POST['credit'];
}
 else{
     die("insert credit");
 }
 
 if(isset($_POST['name'])){
     $name=$_POST['name'];
}
 else{
     die("insert name of course");
 }

        
       
       
        
if($_FILES["cfile"]["name"]) {      
if ($_FILES["cfile"]["type"] == "application/pdf") {
    if( $_FILES["cfile"]["size"] < 2048000){
        $tempr = explode(".", $_FILES["cfile"]["name"]);
         $extension = end($tempr);
      //  echo "Upload: " . $_FILES["cfile"]["name"] . "<br />";
       // echo "Type: " . $_FILES["cfile"]["type"] . "<br />";
       // echo "Size: " . ($_FILES["cfile"]["size"] / 1024) . " Kb<br />";
      //  echo "Temp file: " . $_FILES["cfile"]["tmp_name"] . "<br />";
       
      //  echo "Stored in: " . "../resumes/" . $_FILES["cfile"]["name"];       

        $url="CoursePDF/".$_POST['programme']."/" . $id.".".$extension;

    }
    else{
        die("Invalid file extension or file size grater then 2MB. ");
    }
}
 else {
   die("Invalid file") ;
}
}
else{
    $url=NULL;
}

        $course=new course($id, $name, $credit, $pro, $semester, $url);
       $status= $course->insertCourse();
       if($_FILES["cfile"]["name"]) {
            if($status===1)
            {
                 move_uploaded_file($_FILES["cfile"]["tmp_name"], "../../CoursePDF/".$_POST['programme']."/" . $id.".".$extension);
            }
       }
       
       echo $status;
	   
$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $id." Course added");
$l->insertlog();
?>
