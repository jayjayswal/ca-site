<?php
require_once 'ConnectionClass.php';
class Feedback_Detail {
    //put your code here
    public $feedback_id;
    public $feedback_date;
    public $feedback_person_name;
    public $feedback_person_email;
    public $feedback_detail;
    
    
     public function __construct($fid,$fdate,$fname,$fmail,$fdetail) {
        $this->feedback_id=$fid;
        $this->feedback_date=$fdate;
        $this->feedback_person_name=$fname;
        $this->feedback_person_email=$fmail;
        $this->feedback_detail=$fdetail;
    }
       public function setFeedback($fid,$fdate,$fname,$fmail,$fdetail) {
        $this->feedback_id=$fid;
        $this->feedback_date=$fdate;
        $this->feedback_person_name=$fname;
        $this->feedback_person_email=$fmail;
        $this->feedback_detail=$fdetail;
       } 
       public function mysqlfor() {
        $this->feedback_id=mysql_real_escape_string($this->feedback_id);
        $this->feedback_date=mysql_real_escape_string($this->feedback_date);
        $this->feedback_person_name=mysql_real_escape_string($this->feedback_person_name);
        $this->feedback_person_email=mysql_real_escape_string($this->feedback_person_email);
        $this->feedback_detail=mysql_real_escape_string($this->feedback_detail);
       }
    public static function checkAvalibility($fid)
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM feedback_detail WHERE feedback_id=".mysql_real_escape_string($fid);
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
     
     
     
    public function insertFeedback()
    {
 
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
            
            $sql="INSERT INTO feedback_detail VALUES(NULL, NULL ,'" . $this->feedback_person_name."','". $this->feedback_person_email."','". $this->feedback_detail ."')";
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
       public function editFeedback()
   {
           $this->mysqlfor();
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="UPDATE feedback_detail SET feedback_person_name='" . $this->feedback_person_name . "',feedback_person_email='".$this->feedback_person_email."',feedback_detail='".$this->feedback_detail."'";
            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Update Data");
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
    public static function getFeedbackObject($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM feedback_detail WHERE feedback_id=".mysql_real_escape_string($id);
             $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                echo "No Feedbacks are added Yet";
            }
            else {
                  $row = mysqli_fetch_array($result);
                    $c=new Feedback_Detail($row['feedback_id'],$row['feedback_date'],$row['feedback_person_name'],$row['feedback_person_email'],$row['feedback_detail']);
                return $c;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
    
   public function deleteFeedback()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
         try{
            $sql="DELETE FROM feedback_detail WHERE feedback_id=".mysql_real_escape_string($this->feedback_id);
            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Delete Data");
            }
            $a=mysqli_affected_rows($con);
            if($a==0)
            {
                throw new Exception("No Row(s) Deleted");
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
   public static function getAllFeedbacks()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM feedback_detail ORDER BY feedback_id DESC";
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
                $feed="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new Feedback_Detail($row['feedback_id'],$row['feedback_date'],$row['feedback_person_name'],$row['feedback_person_email'],$row['feedback_detail']);
                    $feed[$count]= $c;
                    $count++;
                }
                return $feed;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
    
}



?>
