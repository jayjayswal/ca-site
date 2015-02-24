<?php

require_once 'ConnectionClass.php';
require_once 'faculty_designation_class.php';
class faculty_detail_class {
    public $faculty_id;
    public $faculty_prefix;
    public $faculty_name;
    public $faculty_email;
    public $faculty_linkedin_id;
    public $faculty_image_url;
    public $faculty_uname;
    public $faculty_designation_id;
    
     public function __construct($id,$prefix,$name,$email,$linkedin,$url,$uname,$desgidi) {
        $this->faculty_id=$id;
        $this->faculty_name=$name;
        $this->faculty_prefix=$prefix;
        $this->faculty_email=$email;
        $this->faculty_linkedin_id=$linkedin;
        $this->faculty_image_url=$url;
        $this->faculty_uname=$uname;
        $this->faculty_designation_id=$desgidi;
                
    }
    
    public function setvalues($id,$prefix,$name,$email,$linkedin,$url,$uname,$desgidi)
    {
       $this->faculty_id=$id;
        $this->faculty_name=$name;
        $this->faculty_prefix=$prefix;
        $this->faculty_email=$email;
        $this->faculty_linkedin_id=$linkedin;
        $this->faculty_image_url=$url;
        $this->faculty_uname=$uname;
        $this->faculty_designation_id=$desgidi;
    }
     public function mysqlfor()
    {
       $this->faculty_id=mysql_real_escape_string($this->faculty_id);
        $this->faculty_name=mysql_real_escape_string($this->faculty_name);
        $this->faculty_prefix=mysql_real_escape_string( $this->faculty_prefix);
        $this->faculty_email=mysql_real_escape_string( $this->faculty_email);
        $this->faculty_linkedin_id=mysql_real_escape_string($this->faculty_linkedin_id);
        $this->faculty_image_url=mysql_real_escape_string($this->faculty_image_url);
        $this->faculty_uname=mysql_real_escape_string($this->faculty_uname);
        $this->faculty_designation_id=mysql_real_escape_string($this->faculty_designation_id);
    }
    
    public function insertFaculty()
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
            $sql = "INSERT INTO `faculty_detail` (`faculty_id`, `faculty_prefix`, `faculty_name`, `faculty_email`, `faculty_linkedin_id`, `faculty_image_url`, `faculty_uname`, `faculty_designation_id`) VALUES (NULL,'".$this->faculty_prefix."','".$this->faculty_name."', '".$this->faculty_email."','".$this->faculty_linkedin_id."','".$this->faculty_image_url."','".$this->faculty_uname."',".$this->faculty_designation_id.");";
            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Insert Data");
            }
            else {
                return 1;
            }
        }
        catch(Exception $e)
        {
            return 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
    }
    public function updateFaculty()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
           $sql = "UPDATE `faculty_detail` SET `faculty_prefix` = '".$this->faculty_prefix."', `faculty_name` = '$this->faculty_name', `faculty_email` = '".$this->faculty_email."', `faculty_linkedin_id` = '".$this->faculty_linkedin_id."', `faculty_image_url` = '$this->faculty_image_url', `faculty_uname` = '$this->faculty_uname', `faculty_designation_id` = '$this->faculty_designation_id' WHERE `faculty_detail`.`faculty_id` = $this->faculty_id;";
            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Update Data");
            }
            else{
                return 1;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
    public static function getFacultyObject($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
           $sql = "SELECT * FROM `faculty_detail` WHERE `faculty_detail`.`faculty_id` =".mysql_real_escape_string($id).";";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return "No Faculty";
            }
            else {
                $row = mysqli_fetch_array($result);      
                   
                    $c=new faculty_detail_class($row['faculty_id'],$row['faculty_prefix'],$row['faculty_name'],$row['faculty_email'], $row['faculty_linkedin_id'], $row['faculty_image_url'],$row['faculty_uname'], $row['faculty_designation_id']);
                    return $c;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
    public static function deleteFaculty($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
         try{
            $sql="DELETE FROM `faculty_detail` WHERE `faculty_detail`.`faculty_id` = ".mysql_real_escape_string($id)."";
            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Delete Data");
            }
            $a=mysqli_affected_rows($con);
            if($a==0)
            {
                throw new Exception("No Row Deleted");
            }
 else {
     return 1;
 }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
    public static function getAllFacultydescvise($descID)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM `faculty_detail` WHERE faculty_designation_id=".mysql_real_escape_string($descID)."";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return "No Faculty Inserted Yet";
            }
            else {
                $count=0;
                $Faculty="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new faculty_detail_class($row['faculty_id'],$row['faculty_prefix'],$row['faculty_name'],$row['faculty_email'], $row['faculty_linkedin_id'], $row['faculty_image_url'],$row['faculty_uname'], $row['faculty_designation_id']);
                    $Faculty[$count]= $c;
                    $count++;
                }
                return $Faculty;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
   public static function getAllFaculty()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM `faculty_detail` ";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return 0;
            }
            else {
                $count=0;
                $Faculty="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new faculty_detail_class($row['faculty_id'],$row['faculty_prefix'],$row['faculty_name'],$row['faculty_email'], $row['faculty_linkedin_id'], $row['faculty_image_url'],$row['faculty_uname'], $row['faculty_designation_id']);
                    $Faculty[$count]= $c;
                    $count++;
                }
                return $Faculty;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
   public static function getID($uname)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
           $sql = "SELECT faculty_id FROM `faculty_detail` WHERE `faculty_detail`.`faculty_uname` ='".mysql_real_escape_string($uname)."'";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return "false";
            }
            else {
                $row = mysqli_fetch_array($result);      
                   
                 return $row['faculty_id'];
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
}
//$f= new faculty_detail_class(116,"ms","jayswalll","asddd","l22l","asddd","uname223",1);
//echo $f->insertFaculty();
//$f->updateFaculty();
//echo $f->deleteCourse();

//$fa=  faculty_detail_class::getAllFaculty();
//echo $fa[0]->faculty_linkedin_id;



?>
