<?php

require_once 'ConnectionClass.php';
class query_detail_class {
    public $query_id;
    public $query_date;
    public $query_name;
    public $query_email;
    public $query_detail;
    public $query_reply;
    public $query_status;
    
     public function __construct($id,$date,$name,$email,$detail,$reply,$status) {
         $this->query_id=$id;
         $this->query_date=$date;
         $this->query_name=$name;
         $this->query_email=$email;
         $this->query_detail=$detail;
         $this->query_reply=$reply;
         $this->query_status=$status;
                
    }
    
    public function setvalues($id,$date,$name,$email,$detail,$reply,$status)
    {
         $this->query_id=$id;
         $this->query_date=$date;
         $this->query_name=mysql_real_escape_string($name);
         $this->query_email=mysql_real_escape_string($email);
         $this->query_detail=mysql_real_escape_string($detail);
         $this->query_reply=mysql_real_escape_string($reply);
         $this->query_status=$status;
    }
    
    public function mysqlfor()
    {
         $this->query_id=mysql_real_escape_string($this->query_id);
         $this->query_date=mysql_real_escape_string($this->query_date);
         $this->query_name=mysql_real_escape_string($this->query_name);
         $this->query_email=mysql_real_escape_string($this->query_email);
         $this->query_detail=mysql_real_escape_string($this->query_detail);
         $this->query_reply=mysql_real_escape_string( $this->query_reply);
         $this->query_status=mysql_real_escape_string($this->query_status);
    }
    
    public function insertQuery()
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
            $sql = "INSERT INTO `online_query` (`query_id`, `query_date`, `query_person_name`, `query_person_email`, `query_detail`, `query_reply`, `query_status`) VALUES (NULL, CURRENT_TIMESTAMP, '$this->query_name', '$this->query_email', '$this->query_detail', NULL, '0');";
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
    public function doReplay()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
           $sql = "UPDATE `online_query` SET `query_reply` = '".$this->query_reply."',`query_status`='1' WHERE `query_id` = $this->query_id;";
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
    public static function getQueryObject($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
           $sql = "SELECT * FROM `online_query` WHERE `query_id` = ".mysql_real_escape_string($id).";";
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
                   
                    $c=new query_detail_class($row['query_id'],$row['query_date'],$row['query_person_name'],$row['query_person_email'], $row['query_detail'], $row['query_reply'],$row['query_status']);
                    return $c;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
    public static function getAllQuerys($status)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM `online_query` WHERE query_status= '".mysql_real_escape_string($status)."'";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database ");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return "No Query Inserted Yet";
            }
            else {
                $count=0;
                $query="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new query_detail_class($row['query_id'],$row['query_date'],$row['query_person_name'],$row['query_person_email'], $row['query_detail'], $row['query_reply'],$row['query_status']);
                    $query[$count]= $c;
                    $count++;
                }
                return $query;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
}

//$a=new query_detail_class("3", NULL, "asd", "sdsds", "dslsjd'lkajsd", "jay", "0");
//$a->doReplay();
//
//$a=  query_detail_class::getAllFaculty();
//echo $a[2]->query_email;

?>
