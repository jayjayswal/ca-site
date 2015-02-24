<?php
require_once 'ConnectionClass.php';
class faculty_designation_class {
    //put your code here
    public $faculty_designation_id;
    public $faculty_designation_name;
     public $faculty_designation_level;
    
      public function __construct($id,$name,$level) {
        $this->faculty_designation_id=$id;
        $this->faculty_designation_name=$name;
        $this->faculty_designation_level=$level;
    }
    
    public function setvalues($id,$name,$level)
    {
        $this->faculty_designation_id=$id;
        $this->faculty_designation_name=$name;
         $this->faculty_designation_level=$level;
    }
    
     public function insertDesig()
    {
        
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="INSERT INTO faculty_designation VALUES(NULL,'".mysql_real_escape_string($this->faculty_designation_name)."',".mysql_real_escape_string($this->faculty_designation_level).")";
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
    public function updateDesig()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="UPDATE faculty_designation SET faculty_designation_name='" . mysql_real_escape_string($this->faculty_designation_name) . "',faculty_designation_level=".mysql_real_escape_string($this->faculty_designation_level)." WHERE faculty_designation_id='" . mysql_real_escape_string($this->faculty_designation_id). "'";
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
   
       public static function getDesigObject($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM faculty_designation WHERE faculty_designation_id='" .mysql_real_escape_string( $id). "'";
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

                    $c=new faculty_designation_class($row['faculty_designation_id'],$row['faculty_designation_name'],$row['faculty_designation_level']);
                   return $c;

            }
        
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
   public static function deleteDesig($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
         try{
            $sql="DELETE FROM faculty_designation WHERE faculty_designation_id='" . mysql_real_escape_string($id). "'";
            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Delete Data");
            }
            $a=mysqli_affected_rows($con);
            if($a==0)
            {
                throw new Exception("No Row Deleted");
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
    public static function getAlldesig()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM faculty_designation ORDER BY faculty_designation_level";
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
                $desi="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new faculty_designation_class($row['faculty_designation_id'],$row['faculty_designation_name'],$row['faculty_designation_level']);
                    $desi[$count]= $c;
                    $count++;
                }
                return $desi;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
    public static function getname($id)
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM faculty_designation WHERE faculty_designation_id='".mysql_real_escape_string($id)."'";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return "false";
            }
            else {
                $faculty="";
                while($row = mysqli_fetch_array($result))
                {                  
                    $faculty=$row['faculty_designation_name'];
                    return $faculty;
                }
                
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
    }
     public static function getID($name)
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM faculty_designation WHERE faculty_designation_name='".mysql_real_escape_string($name)."'";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return "false";
            }
            else {
                $faculty="";
                while($row = mysqli_fetch_array($result))
                {                  
                    $faculty=$row['faculty_designation_id'];
                    return $faculty;
                }
                
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
    }
    
   }
//    $d=new faculty_designation_class(2,"Adin",3);
//   // $d->insertCourse();
//   // $d->updateCourse();
//    $a=  faculty_designation_class::getAlldesig();
//    echo $a[0]->faculty_designation_name;
//    $d->deleteCourse();
   


?>
