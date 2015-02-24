<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}

require_once '../../db/student_class.php';
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

if(isset($_POST['firstname']))
{
    $s_fname=$_POST['firstname'];
}
else
{
    die("insert first name");
}

if(isset($_POST['lastname']))
{
    $s_lname=$_POST['lastname'];
}
else
{
   die("insert last name");
}

if(isset($_POST['email']))
{
    $s_email=$_POST['email'];
}
else
{
    die("insert email");
}

if(isset($_POST['linkedinId']))
{
    $s_linkedinId=$_POST['linkedinId'];
}
else
{
    $s_linkedinId=NULL;
}


if(isset($_POST['batch']))
{
    $s_batch=$_POST['batch'];
}
else
{
    die("insert batch year");
}

if(isset($_POST['cgpa']))
{
    $s_cgpa=$_POST['cgpa'];
}
else
{
    die("insert CGPA");
}

if(isset($_POST['specialization']))
{
    $s_specialization=$_POST['specialization'];
}
else
{
    $s_specialization=NULL;
}

if(isset($_POST['programme']))
{
    $s_programme=$_POST['programme'];
}
else
{
    die("choose programme");
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
        $ran=gen_random_string(8);
      $filename= $s_fname."_".$s_lname."_".$ran.".".$extension;
        $url="studentResume/".$_POST['programme']."/" . $filename;

    }
    else{
        die("Invalid file extension or file size grater then 2MB.");
    }
}
 else {
   die("Invalid file extension or file size grater then 2MB.") ;
}
}
else{
    die("insert file");
}

        $stu= new Student(NULL, $s_fname, $s_lname, $s_email, $s_linkedinId, $url, $s_batch, $s_cgpa, $s_specialization, $s_programme);
      $status=$stu->InsertStudent();
        if($_FILES["cfile"]["name"]) { //if query successfully run then uplod file
            if($status==1)
            {
                 move_uploaded_file($_FILES["cfile"]["tmp_name"], "../../studentResume/".$_POST['programme']."/" . $filename);
            }
       }
       
       echo $status;

$l=new site_log(NULL, NULL,$_SESSION['user']->username, $_SERVER['REMOTE_ADDR'], $s_fname." student details added");
$l->insertlog();
?>
