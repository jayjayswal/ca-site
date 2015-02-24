<?php

require_once 'ConnectionClass.php';
class news_event_class {
    
    public $news_event_id;
    public $news_event_date;
    public $news_event_desc;
    public $news_event_url;
    public $news_event_type;
    
    public function __construct($id,$date,$desc,$url,$type) {
        $this->news_event_id=$id;
        $this->news_event_date=$date;
        $this->news_event_desc=$desc;
        $this->news_event_url=$url;
        $this->news_event_type=$type;
    }
    
    public function setvalues($id,$date,$desc,$url,$type)
    {
        $this->news_event_id=$id;
        $this->news_event_date=$date;
        $this->news_event_desc=$desc;
        $this->news_event_url=$url;
        $this->news_event_type=$type;
    }  
    
     public function mysqlfor()
    {
        $this->news_event_id=mysql_real_escape_string($this->news_event_id);
        $this->news_event_date=mysql_real_escape_string($this->news_event_date);
        $this->news_event_desc=mysql_real_escape_string($this->news_event_desc);
        $this->news_event_url=mysql_real_escape_string($this->news_event_url);
        $this->news_event_type=mysql_real_escape_string($this->news_event_type);
    }
    
     public function insertNewsEvent()
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
            $sql="INSERT INTO  `news_events` (`news_events_id` ,
                    `news_events_date` ,
                    `news_events_desc` ,
                    `news_events_url` ,
                    `news_events_type`
                    )
                    VALUES (NULL,'" . $this->news_event_date . "','".$this->news_event_desc."','" . $this->news_event_url . "','" . $this->news_event_type. "')";
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
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
    }
    
     public function updateNewsEvent()
   {
         
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
            $sql="UPDATE `news_events` SET news_events_date='" .$this->news_event_date."',news_events_desc='".$this->news_event_desc."',news_events_type='" . $this->news_event_type . "',news_events_url='$this->news_event_url' WHERE news_events_id=" . $this->news_event_id . "";
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
 
   public static function deleteNewsEvents($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
         try{
            $sql="DELETE FROM `news_events` WHERE news_events_id=" . mysql_real_escape_string($id);
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
   
   public static function getNewsEventsObject($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
         try{
            $sql="SELECT * FROM `news_events` WHERE news_events_id=" . mysql_real_escape_string($id);
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
                    $c=new news_event_class($row['news_events_id'],$row['news_events_date'],$row['news_events_desc'],$row['news_events_url'], $row['news_events_type']);
                return $c;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
    public static function getAllNewsEvents($ti)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM `news_events` WHERE news_events_type='".mysql_real_escape_string($ti)."' ORDER BY news_events_date DESC";
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
                $course="";
                while($row = mysqli_fetch_array($result))
                {                  
                    $c=new news_event_class($row['news_events_id'],$row['news_events_date'],$row['news_events_desc'],$row['news_events_url'], $row['news_events_type']);
                    $course[$count]= $c;
                    $count++;
                }
                return $course;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
    public static function getAllTopNewsEvents($ti)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM `news_events` WHERE news_events_type='".mysql_real_escape_string($ti)."' ORDER BY news_events_date DESC LIMIT 0,10";
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
                $course="";
                while($row = mysqli_fetch_array($result))
                {                  
                    $c=new news_event_class($row['news_events_id'],$row['news_events_date'],$row['news_events_desc'],$row['news_events_url'], $row['news_events_type']);
                    $course[$count]= $c;
                    $count++;
                }
                return $course;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
    
}
 //$ne=new  news_event_class(6,"2013-5-10","ad","d","CA");
 //$ne->insertCourse();
 //$ne->updateCourse();
 //$ne->deleteCourse();
//$ne=news_event_class::getAllCourse();
//echo $ne[0]->news_event_desc;
?>
