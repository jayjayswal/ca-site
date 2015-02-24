<?php

require_once 'ConnectionClass.php';
class course
{
    public $course_id;
    public $course_name;
    public $course_credit; 
    public $course_programme;
    public $course_semester;
    public $course_url;
      
    public function __construct($id,$name,$credit,$pro,$sem,$url) {
        $this->course_id=$id;
        $this->course_name=$name;
        $this->course_credit=$credit;
        $this->course_programme=$pro;
        $this->course_semester=$sem;
        $this->course_url=$url;
    }
    
    public function setvalues($id,$name,$credit,$pro,$sem,$url)
    {
         $this->course_id=$id;
        $this->course_name=$name;
        $this->course_credit=$credit;
        $this->course_programme=$pro;
        $this->course_semester=$sem;
        $this->course_url=$url;
    }

    public static function checkAvalibility($id)
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM course_detail WHERE course_id='".mysql_real_escape_string($id)."'";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database");
            }
            $n=mysqli_num_rows($result);
            if($n===1)
            {
                return 0;
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
     
      public function checkObjectAvalibility()
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM course_detail WHERE course_id='".mysql_real_escape_string($this->course_id)."'";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database");
            }
            $n=mysqli_num_rows($result);
            if($n===1)
            {
                return 0;
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
     
      public function insertCourse()
    {
          $a=  $this->checkObjectAvalibility();
          if($a==0)
          {
              return "Course alredy exsist";
          }
          else{
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="INSERT INTO course_detail VALUES('" . mysql_real_escape_string($this->course_id) . "','" . mysql_real_escape_string($this->course_name) . "','".mysql_real_escape_string($this->course_credit)."','" . mysql_real_escape_string($this->course_programme) . "','" . mysql_real_escape_string($this->course_semester). "','" . mysql_real_escape_string($this->course_url ). "')";
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
    } 
    
   public function updateCourse()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="UPDATE course_detail SET course_name='" .mysql_real_escape_string( $this->course_name) . "',course_credit='".mysql_real_escape_string($this->course_credit)."',course_programme='" . mysql_real_escape_string($this->course_programme) . "',course_semester=" . mysql_real_escape_string($this->course_semester). ",course_url='" . mysql_real_escape_string($this->course_url) . "' WHERE course_id='" . mysql_real_escape_string($this->course_id) . "'";
            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Update Data");
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
   public static function getcourseobject($id)
   {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM course_detail WHERE course_id='".mysql_real_escape_string($id)."' ";
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
                $row = mysqli_fetch_array($result);
                
                   
                    $c=new course($row['course_id'],$row['course_name'],$row['course_credit'],$row['course_programme'], $row['course_semester'], $row['course_url']);
                return $c;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
   public static function deleteCourse($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
         try{
            $sql="DELETE FROM course_detail WHERE course_id='" . mysql_real_escape_string($id ). "'";
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
   
   public static function getAllCourse($cat,$sem)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM course_detail WHERE course_programme='".mysql_real_escape_string($cat)."' AND course_semester=".mysql_real_escape_string($sem);
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
                $course="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new course($row['course_id'],$row['course_name'],$row['course_credit'],$row['course_programme'], $row['course_semester'], $row['course_url']);
                    $course[$count]= $c;
                    $count++;
                }
                return $course;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   public static function getAllCoursecat($cat)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM course_detail WHERE course_programme='".mysql_real_escape_string($cat)."' ";
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
                $course="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new course($row['course_id'],$row['course_name'],$row['course_credit'],$row['course_programme'], $row['course_semester'], $row['course_url']);
                    $course[$count]= $c;
                    $count++;
                }
                return $course;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
}

//$c1=new course("CA504","jay", 5, "BCA", 6,"asd");
//$a=course::checkAvalibility("CA504");
//echo $a;
//$c1->insertCourse();
//$c1->updateCourse();
//$c1->deleteCourse();

//$courses=course::getAllCourse();
//echo $courses[0]->course_id;
        

?>
