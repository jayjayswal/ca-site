<?php

require_once 'ConnectionClass.php';

class site_log {
    public $log_id;
    public $log_time;
    public $log_uname;
    public $log_ip;
    public $log_desc;
    
     public function __construct($id,$time,$name,$ip,$desc) {
         $this->log_desc=$desc;
         $this->log_id=$id;
         $this->log_ip=$ip;
         $this->log_time=$time;
         $this->log_uname=$name;                
    }
    
    public function setvalues($id,$time,$name,$ip,$desc)
    {
         $this->log_desc=$desc;
         $this->log_id=$id;
         $this->log_ip=$ip;
         $this->log_time=$time;
         $this->log_uname=$name;     
    }
    
    public function mysqlfor()
    {
         $this->log_desc=mysql_real_escape_string($this->log_desc);
         $this->log_id=mysql_real_escape_string($this->log_id);
         $this->log_ip=mysql_real_escape_string($this->log_ip);
         $this->log_time=mysql_real_escape_string( $this->log_time);
         $this->log_uname=mysql_real_escape_string($this->log_uname);
    }
    
    public function insertlog()
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
            $sql = "INSERT INTO `site_log` (`log_id`, `log_time`, `log_uname`, `log_ip`, `log_desc`) VALUES (NULL, CURRENT_TIMESTAMP, '$this->log_uname', '$this->log_ip', '$this->log_desc');";
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
   

    public static function getAllLog()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM `site_log`";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return "No log Inserted Yet";
            }
            else {
                $count=0;
                $log="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new site_log($row['log_id'],$row['log_time'],$row['log_uname'],$row['log_ip'], $row['log_desc']);
                    $log[$count]= $c;
                    $count++;
                }
                return $log;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   public static function getAllLogofuser($uname)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM `site_log` WHERE log_uname='".mysql_real_escape_string($uname)."'";
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
                $log="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new site_log($row['log_id'],$row['log_time'],$row['log_uname'],$row['log_ip'], $row['log_desc']);
                    $log[$count]= $c;
                    $count++;
                }
                return $log;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   public static function getAllLogdate($date)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM `site_log` WHERE date(substring(`log_time` from 1 for 10))='".mysql_real_escape_string($date)."'";
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
                $log="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new site_log($row['log_id'],$row['log_time'],$row['log_uname'],$row['log_ip'], $row['log_desc']);
                    $log[$count]= $c;
                    $count++;
                }
                return $log;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
}
//$l=new site_log(NULL, NULL, "Jjayswal", "192.168.1.1", "asdsadasdadsad00");
//$l->insertlog();
//$l=  site_log::getAllLog();
//echo $l[1]->log_desc;




?>
