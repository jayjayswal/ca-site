<?php

require_once 'ConnectionClass.php';
class credit_system
{
    public $detail_title;
    public $detail_desc;
    public $course_programme;

    public function __construct($title,$desc,$pro) {
        $this->course_programme=$pro;
        $this->detail_desc=$desc;
        $this->detail_title=$title;
    }
    
    public function setvalues($title,$desc,$pro)
    {
        $this->course_programme=$pro;
        $this->detail_desc=$desc;
        $this->detail_title=$title;
    }
    
        public function mysqlfor()
    {
        $this->course_programme=mysql_real_escape_string( $this->course_programme);
        $this->detail_desc=mysql_real_escape_string($this->detail_desc);
        $this->detail_title=mysql_real_escape_string($this->detail_title);
    }

    public static function checkAvalibility($ti,$pro)
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM credit_system WHERE credit_system_title='".mysql_real_escape_string($ti)."' and credit_system_programme='".mysql_real_escape_string($pro)."' ";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database");
            }
            $n=mysqli_num_rows($result);
            if($n===1)
            {
                getConnection::closeConnection($con);
                return 0;
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
     
      public function checkObjectAvalibility()
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM credit_system WHERE credit_system_title='".mysql_real_escape_string($this->detail_title)."' and credit_system_programme='".mysql_real_escape_string($this->course_programme)."'";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database");
            }
            $n=mysqli_num_rows($result);
            if($n===1)
            {
                getConnection::closeConnection($con);
                return 0;
            }
            else {
                getConnection::closeConnection($con);
                    return 1;
            }
        }
        catch(Exception $e)
        {
            getConnection::closeConnection($con);
            return 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
     }
     
      public function insertDetail()
    {
          $a=$this->checkObjectAvalibility();
          if($a==0)
          {
              return "Detail Title alredy exsist";
          }
          else{
              
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
            $sql="INSERT INTO `bcasite`.`credit_system` (`credit_system_title`, `credit_system_desc`, `credit_system_programme`) VALUES ('$this->detail_title', '$this->detail_desc', '$this->course_programme')";
            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Insert Data");
            }
            else {
                getConnection::closeConnection($con);
               return 1;
                return;
            }
        }
        catch(Exception $e)
        {
            getConnection::closeConnection($con);
            return 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
    }
    } 
    
   public function updateDetail()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
            $sql="UPDATE `credit_system` SET `credit_system_desc` = '$this->detail_desc' WHERE `credit_system_title` = '$this->detail_title' AND `credit_system_programme` = '$this->course_programme';";
            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Update Data");
            }
             else {
                 getConnection::closeConnection($con);
                  return 1;
             }
        }
        catch(Exception $e)
        {
       
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
    public static function getDetailObject($ti,$de)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM `credit_system` WHERE `credit_system_title` = '".mysql_real_escape_string($ti)."' AND `credit_system_programme` = '".mysql_real_escape_string($de)."';";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database");
            }
             else {
                 $n=mysqli_num_rows($result);
                 if($n==0){
                     return 0;
                 }
            if($n===1)
            {
              $row = mysqli_fetch_array($result);
              $c=new credit_system($row['credit_system_title'],$row['credit_system_desc'],$row['credit_system_programme']);
              getConnection::closeConnection($con);
              return $c;
            }
              
                  
             }
        }
        catch(Exception $e)
        {
       
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
   
   public static  function deleteDetail($ti,$aa)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
         try{
            $sql="DELETE FROM `credit_system` WHERE credit_system_title='".mysql_real_escape_string($ti)."' and `credit_system_programme` = '".mysql_real_escape_string($aa)."'";
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
            return 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
   public static function  getAllDetail($cat)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM `credit_system` WHERE `credit_system_programme`='".mysql_real_escape_string($cat)."'";
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
                $details="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new credit_system($row['credit_system_title'],$row['credit_system_desc'],$row['credit_system_programme']);
                    $details[$count]= $c;
                    $count++;
                }
                return $details;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
}

//$d=new admission_detail("jjjayswal", "jayswaldsdds", "msc");
//echo $d->deleteDetail();
      
//$a=admission_detail::getAllDetail("BCA");
//echo $a[1]->detail_title;
?>
