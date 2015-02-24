<?php
require_once 'ConnectionClass.php';
class Spc_Executive {
    //put your code here
  public $spc_executive_id;
  public $spc_executive_prefix;
  public $spc_executive_name;
  public $spc_executive_number;
  public $spc_executive_year;

   public function __construct($spcid,$spc_prefix,$spc_name,$spc_no,$spc_year)
   {
       $this->spc_executive_id=$spcid;
       $this->spc_executive_prefix=$spc_prefix;
       $this->spc_executive_name=$spc_name;
       $this->spc_executive_number=$spc_no;       
       $this->spc_executive_year= $spc_year;

   }
    public function SetSpcExecutive($spcid,$spc_prefix,$spc_name,$spc_no,$spc_year)
   {
       $this->spc_executive_id=$spcid;
       $this->spc_executive_prefix=$spc_prefix;
       $this->spc_executive_name=$spc_name;
       $this->spc_executive_number=$spc_no;
       $this->spc_executive_year=$spc_year;
       
   }
   
   public function mysqlfor()
   {
       $this->spc_executive_id=mysql_real_escape_string($this->spc_executive_id);
       $this->spc_executive_prefix=mysql_real_escape_string( $this->spc_executive_prefix);
       $this->spc_executive_name=mysql_real_escape_string($this->spc_executive_name);
       $this->spc_executive_number=mysql_real_escape_string($this->spc_executive_number);
       $this->spc_executive_year=mysql_real_escape_string($this->spc_executive_year);
       
   }
   
   public static function checkSpcExecutiveAvalibility($spcid)
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM spc_executive WHERE spc_executive_id=".mysql_real_escape_string($spcid);
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

     
     
public function InsertSpcExecutive()
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
            $sqll="INSERT INTO  `spc_executive` (`spc_executive_id` ,`spc_executive_prefix` ,`spc_executive_name` ,`spc_executive_number` ,`spc_executive_year`) VALUES (NULL,'$this->spc_executive_prefix','$this->spc_executive_name','$this->spc_executive_number','". $this->spc_executive_year."');";
            if(!mysqli_query($con,$sqll))
            {
                throw new Exception("Cannot Add SpcExecutive");
            }
            else
            {
                return 1;
            }
        }
        catch(Exception $e)
        {
            return 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
    
    }
    
     public function updateSpcExecutive()
   {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
            $sql="UPDATE `spc_executive` SET spc_executive_prefix='" . $this->spc_executive_prefix. "',spc_executive_name='".$this->spc_executive_name."',spc_executive_number='".$this->spc_executive_number."',spc_executive_year='". $this->spc_executive_year."' WHERE spc_executive_id=".$this->spc_executive_id;
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
 public static function deleteSpcExecutive($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
         try{
            $sql="DELETE FROM `spc_executive` WHERE spc_executive_id=" . mysql_real_escape_string($id);
            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Delete Data");
            }
            $a=mysqli_affected_rows($con);
            if($a==0)
            {
                throw new Exception("Not Deleted");
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
   
   public static function getAllSpcExecutive()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM spc_executive";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive Spc's from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return 0;
            }
            else {
                $count=0;
                $spc="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new Spc_Executive($row['spc_executive_id'],$row['spc_executive_prefix'],$row['spc_executive_name'],$row['spc_executive_number'],$row['spc_executive_year']);
                    $spc[$count]= $c;
                    $count++;
                }
                return $spc;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
    public static function getAllSpcExecutiveobject($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM spc_executive WHERE spc_executive_id=".mysql_real_escape_string($id);
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive Spc's from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return 0;
            }
                $row = mysqli_fetch_array($result);
                   
                    $c=new Spc_Executive($row['spc_executive_id'],$row['spc_executive_prefix'],$row['spc_executive_name'],$row['spc_executive_number'],$row['spc_executive_year']);
                return $c;
            
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
}

?>
