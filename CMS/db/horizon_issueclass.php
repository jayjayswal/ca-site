<?php
require_once 'ConnectionClass.php';
class Horizon_IssueClass {
    //put your code here
    public $horizon_id;
    public $horizon_version;
    public $horizon_date;
    public $horizon_pdf_url;
    public $horizon_photo_url;
    
    public function __construct($hid,$hver,$hdate,$hpdf,$hphoto) {
        $this->horizon_id=$hid;
        $this->horizon_version=$hver;
        $this->horizon_date=$hdate;
        $this->horizon_pdf_url=$hpdf;
        $this->horizon_photo_url=$hphoto;
    }
    public function setIssues($hid,$hver,$hdate,$hpdf,$hphoto) {
        $this->horizon_id=$hid;
        $this->horizon_version=$hver;
        $this->horizon_date=$hdate;
        $this->horizon_pdf_url=$hpdf;
        $this->horizon_photo_url=$hphoto;
    }  
    public function mysqlfor() {
        $this->horizon_id= mysql_real_escape_string($this->horizon_id);
        $this->horizon_version= mysql_real_escape_string($this->horizon_version);
        $this->horizon_date= mysql_real_escape_string($this->horizon_date);
        $this->horizon_pdf_url= mysql_real_escape_string($this->horizon_pdf_url);
        $this->horizon_photo_url= mysql_real_escape_string($this->horizon_photo_url);
    } 
    
    
    
    
    
    
    
    
    public static function checkAvalibility($hver)
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM horizon_issue WHERE horizon_version='". mysql_real_escape_string($hver)."'";
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
            else 
            {
                return 1;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
     }
     public function addHorizonIssue()
    {
          $a=  self::checkAvalibility($this->horizon_version);
          if($a==0)
          {
              return "This Issue already exsists";
          }
          else{
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
            $sql="INSERT INTO horizon_issue VALUES(NULL,'" . $this->horizon_version . "','" . $this->horizon_date . "','" . $this->horizon_pdf_url ."','". $this->horizon_photo_url ."')";
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
    
   public function updateHorizonIssue()
   {
    $con=getConnection::connectToDatabase();
     getConnection::selectDatabase($con);
     try{
         $this->mysqlfor();
         $sql="UPDATE horizon_issue SET horizon_version='$this->horizon_version',horizon_date='" . $this->horizon_date . "',horizon_pdf_url='".$this->horizon_pdf_url."',horizon_photo_url='".$this->horizon_photo_url."' WHERE horizon_id=" . $this->horizon_id;
         if(!mysqli_query($con,$sql))
         {
             throw new Exception("Cannot Update Data");
         }
         else
         {
             return 1;
         }
     }
     catch(Exception $e)
     {
         echo 'Message: ' .$e->getMessage();
     }

     getConnection::closeConnection($con);

   }
    public static function getHorizonIssueObject($id)
   {
        $con=getConnection::connectToDatabase();
         getConnection::selectDatabase($con);
         try{
             $sql="SELECT * FROM horizon_issue WHERE horizon_id=" . mysql_real_escape_string($id);
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
                    $c=new Horizon_IssueClass($row['horizon_id'],$row['horizon_version'],$row['horizon_date'],$row['horizon_pdf_url'],$row['horizon_photo_url']);
                return $c;
            }
         }
         catch(Exception $e)
         {
             echo 'Message: ' .$e->getMessage();
         }

         getConnection::closeConnection($con);
          
   }
   
   
   public static function deleteHorizonIssue($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
         try{
            $sql="DELETE FROM horizon_issue WHERE horizon_id='". mysql_real_escape_string($id)."'";
            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Delete Data");
            }
            $a=mysqli_affected_rows($con);
            if($a==0)
            {
                throw new Exception("No Row(s) Deleted");
            }
 else {
     return 1 ;
 }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
   public static function getAllHorizonIssue()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM horizon_issue";
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
                $issue="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new Horizon_IssueClass($row['horizon_id'],$row['horizon_version'],$row['horizon_date'],$row['horizon_pdf_url'],$row['horizon_photo_url']);
                    $issue[$count]= $c;
                    $count++;
                }
                return $issue;
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
