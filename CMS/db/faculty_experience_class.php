<?php
require_once 'ConnectionClass.php';
class faculty_experience_class {
    public $experience_id;
    public $faculty_id;
    public $faculty_institute;
    public $faculty_no_of_year;
    public $faculty_designation;
    
    public function __construct($eid,$id,$insname,$year,$desi) {
        $this->experience_id=$eid;
        $this->faculty_id=$id;
        $this->faculty_institute=$insname;
        $this->faculty_no_of_year=$year;
        $this->faculty_designation=$desi;              
    }
    public function setvalues($eid,$id,$insname,$year,$desi)
    {
        $this->experience_id=$eid;
        $this->faculty_id=$id;
        $this->faculty_institute=$insname;
        $this->faculty_no_of_year=$year;
        $this->faculty_designation=$desi;      
    } 
            
    public function mysqlfor()
    {
        $this->experience_id=mysql_real_escape_string($this->experience_id);
        $this->faculty_id=mysql_real_escape_string($this->faculty_id);
        $this->faculty_institute=mysql_real_escape_string($this->faculty_institute);
        $this->faculty_no_of_year=mysql_real_escape_string($this->faculty_no_of_year);
        $this->faculty_designation=mysql_real_escape_string($this->faculty_designation);    
    }
    
     public function insertExperience()
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
            $sql = "INSERT INTO `faculty_experience` (`faculty_id`, `faculty_institute`, `faculty_no_of_year`, `faculty_designation`) VALUES ($this->faculty_id, '$this->faculty_institute',$this->faculty_no_of_year, '$this->faculty_designation');";
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
    public function updateExperience()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
            $sql = "UPDATE `faculty_experience` SET `faculty_institute` = '$this->faculty_institute', `faculty_no_of_year` = '$this->faculty_no_of_year', `faculty_designation` = '$this->faculty_designation' WHERE `faculty_experience`.`experience_id` =  $this->experience_id ";
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
    public static function getExprienceObject($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql = "SELECT * FROM `faculty_experience` WHERE `faculty_experience`.`experience_id` = ".mysql_real_escape_string($id);
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

                    $c=new faculty_experience_class($row['experience_id'],$row['faculty_id'],$row['faculty_institute'],$row['faculty_no_of_year'],$row['faculty_designation']);
                    return $c;
                }

            }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   public static function deleteExperience($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
         try{
            $sql="DELETE FROM `faculty_experience`  WHERE `faculty_experience`.`experience_id` =".mysql_real_escape_string($id);
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
   public static function getAllExperience()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM `faculty_experience`";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                echo "No faculty_experience Inserted Yet";
            }
            else {
                $count=0;
                $experience="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new faculty_experience_class($row['experience_id'],$row['faculty_id'],$row['faculty_institute'],$row['faculty_no_of_year'],$row['faculty_designation']);
                    $experience[$count]= $c;
                    $count++;
                }
                return $experience;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
    public static function getAllExperienceOfFaculty($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM `faculty_experience` WHERE faculty_id='".mysql_real_escape_string($id)."' ";
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
                $experience="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new faculty_experience_class($row['experience_id'],$row['faculty_id'],$row['faculty_institute'],$row['faculty_no_of_year'],$row['faculty_designation']);
                    $experience[$count]= $c;
                    $count++;
                }
                return $experience;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
}

//$e=new faculty_experience_class(2,118,"sss",32,"ddd");
//$e->insertExperience();
//$e->updateExperience();
//$e->deleteExperience();
//$a=  faculty_experience_class::getAllExperience();
//echo $a[0]->faculty_designation;
?>
