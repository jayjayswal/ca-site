<?php
require_once 'ConnectionClass.php';
class faculty_qualification_class {
    public $qualification_id;
    public $faculty_id;
    public $faculty_degree;
    public $faculty_year_of_passing;
    public $faculty_institute_name;
    
     public function __construct($qid,$id,$drg,$year,$insname) {
         $this->qualification_id=$qid;
        $this->faculty_id=$id;
        $this->faculty_degree=$drg;
        $this->faculty_year_of_passing=$year;
        $this->faculty_institute_name=$insname;
                
    }
    public function setvalues($qid,$id,$drg,$year,$insname)
    {
        $this->qualification_id=$qid;
       $this->faculty_id=$id;
        $this->faculty_degree=$drg;
        $this->faculty_year_of_passing=$year;
        $this->faculty_institute_name=$insname;
    }  
    public function mysqlfor()
    {
        $this->qualification_id=mysql_real_escape_string($this->qualification_id);
       $this->faculty_id=mysql_real_escape_string($this->faculty_id);
        $this->faculty_degree=mysql_real_escape_string($this->faculty_degree);
        $this->faculty_year_of_passing=mysql_real_escape_string($this->faculty_year_of_passing);
        $this->faculty_institute_name=mysql_real_escape_string($this->faculty_institute_name);
    }        
    
     public function insertQualification()
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
            $sql = "INSERT INTO `faculty_qualification` (`faculty_id`, `faculty_degree`, `faculty_year_of_passing`, `faculty_institute_name`) VALUES ($this->faculty_id, '$this->faculty_degree', '$this->faculty_year_of_passing', '$this->faculty_institute_name');";
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
    
    public function updateQualification()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
            $sql = "UPDATE `faculty_qualification` SET `faculty_degree` = '$this->faculty_degree', `faculty_year_of_passing` = '$this->faculty_year_of_passing', `faculty_institute_name` = '$this->faculty_institute_name' WHERE `faculty_qualification`.`qualification_id` = $this->qualification_id";

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
    public static function getQualificationObject($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql = "SELECT * FROM `faculty_qualification`  WHERE `faculty_qualification`.`qualification_id` = ".mysql_real_escape_string($id);
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

                    $c=new faculty_qualification_class($row['qualification_id'],$row['faculty_id'],$row['faculty_degree'],$row['faculty_year_of_passing'],$row['faculty_institute_name']);
                   getConnection::closeConnection($con);
                    return $c;
            }

        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
   
   
    public static function deleteQualification($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
         try{
            $sql="DELETE FROM `faculty_qualification` WHERE `faculty_qualification`.`qualification_id` =".mysql_real_escape_string($id);
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
     getConnection::closeConnection($con);
     return 1;
 }
        }
        catch(Exception $e)
        {
            getConnection::closeConnection($con);
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   public static function getAllQualification()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM `faculty_qualification`";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                echo "No qualifications Inserted Yet";
            }
            else {
                $count=0;
                $qualification="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new faculty_qualification_class($row['qualification_id'],$row['faculty_id'],$row['faculty_degree'],$row['faculty_year_of_passing'],$row['faculty_institute_name']);
                    $qualification[$count]= $c;
                    $count++;
                }
                return $qualification;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
    public static function getAllQualificationOfFaculty($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM `faculty_qualification` WHERE faculty_id='".mysql_real_escape_string($id)."' ORDER BY faculty_year_of_passing DESC";
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
                $qualification="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new faculty_qualification_class($row['qualification_id'],$row['faculty_id'],$row['faculty_degree'],$row['faculty_year_of_passing'],$row['faculty_institute_name']);
                    $qualification[$count]= $c;
                    $count++;
                }
                return $qualification;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
}

//$f= new faculty_qualification_class(2,118,"MSC",20133,"mss");
//echo $f->insertQualification();
//$f->updateQualification();
//$f->deleteQualification();
//$fe=  faculty_qualification_class::getAllQualification();
//echo $fe[0]->faculty_institute_name;

?>
