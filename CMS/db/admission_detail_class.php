<?php

require_once 'ConnectionClass.php';
class admission_detail
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

    public static function checkAvalibility($ti,$pro)
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM admission_detail WHERE admission_title='".mysql_real_escape_string($ti)."' and admission_programme='".mysql_real_escape_string($pro)."' ";
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
            $sql="SELECT * FROM admission_detail WHERE admission_title='".mysql_real_escape_string($this->detail_title)."' and admission_programme='".mysql_real_escape_string($this->course_programme)."'";
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
            $sql="INSERT INTO `admission_detail` (`admission_title`, `admission_desc`, `admission_programme`) VALUES ('".mysql_real_escape_string($this->detail_title)."', '".mysql_real_escape_string($this->detail_desc)."', '".mysql_real_escape_string($this->course_programme)."')";
            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Insert Data");
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
    } 
    
   public function updateDetail()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="UPDATE `admission_detail` SET `admission_desc` = '".mysql_real_escape_string($this->detail_desc)."' WHERE `admission_detail`.`admission_title` = '".mysql_real_escape_string($this->detail_title)."' and `admission_programme` = '".mysql_real_escape_string($this->course_programme)."';";
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
            $sql="SELECT * FROM `admission_detail` WHERE `admission_detail`.`admission_title` = '".mysql_real_escape_string($ti)."' and `admission_programme` = '".mysql_real_escape_string($de)."'";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database");
            }
             else {
                 $n=mysqli_num_rows($result);
            if($n===1)
            {
              $row = mysqli_fetch_array($result);
              $c=new admission_detail($row['admission_title'],$row['admission_desc'],$row['admission_programme']);
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
            $sql="DELETE FROM admission_detail WHERE admission_title='".mysql_real_escape_string($ti)."' and `admission_programme` = '".mysql_real_escape_string($aa)."'";
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
   
   public static function getAllDetail($cat)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM admission_detail WHERE admission_programme='".mysql_real_escape_string($cat)."'";
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
                   
                    $c=new admission_detail($row['admission_title'],$row['admission_desc'],$row['admission_programme']);
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
