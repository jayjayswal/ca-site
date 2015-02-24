<?php
require_once 'ConnectionClass.php';

class Slider_PhotoClass {
    //put your code here
   public $photo_id;
   public $url;
   public $category_id;
   public $caption;
   public $status=0;
   
   public function __construct($pid,$url,$cid,$cap,$sts) {
       $this->photo_id=$pid;
       $this->url=$url;
       $this->category_id=$cid;
       $this->caption=$cap;
       $this->status=$sts;
   }
   public function SetPhoto($pid,$url,$cid,$cap,$sts) {
       $this->photo_id=$pid;
       $this->url=$url;
       $this->category_id=$cid;
       $this->caption=$cap;
       $this->status=$sts;
   }
    public function mysqlfor() {
       $this->photo_id=mysql_real_escape_string($this->photo_id);
       $this->url=mysql_real_escape_string($this->url);
       $this->category_id=mysql_real_escape_string($this->category_id);
       $this->caption=mysql_real_escape_string($this->caption);
       $this->status=mysql_real_escape_string($this->status);
   }
   public static function checkPhotoAvalibility($url,$cid,$cap)
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM slider_photos WHERE url='".mysql_real_escape_string($url)."' and category_id=".mysql_real_escape_string($cid)." and caption='".mysql_real_escape_string($cap)."'";
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
    public function UploadPhotos($url,$cid,$cap)
    {
        $this->mysqlfor();
          $a=self::checkPhotoAvalibility($this->url,$this->category_id,$this->caption);
          if($a==0)
          {
              return "This Image already exsists";
          }
          else{
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            
            $sql="INSERT INTO `slider_photos` VALUES(NULL,'".$url."',".$cid.",'".$cap."',".$this->status.")";
            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Upload Image");
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
}
public function updateImage()
   {

        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
            $sql="UPDATE slider_photos SET category_id='$this->category_id',caption='" . $this->caption . "' WHERE photo_id=" . $this->photo_id;

            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Update Data");
            }
            else{
                return 1;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   
}
public static function approveImage($id)
   {

        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="UPDATE slider_photos SET status=1  WHERE photo_id=" . mysql_real_escape_string($id);

            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Update Data");
            }
            else{
                return 1;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   
}
 public static function deleteImage($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
         try{
            $sql="DELETE FROM slider_photos WHERE photo_id=" .mysql_real_escape_string($id);
            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Delete Data");
            }
            $a=mysqli_affected_rows($con);
            if($a==0)
            {
                throw new Exception("No Image(s) Deleted");
            }
            else{
                return 1;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
   public static function getAllImages()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM slider_photos";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive Images from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return 0;
            }
            else {
                $count=0;
                $image="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new Slider_PhotoClass($row['photo_id'],$row['url'],$row['category_id'],$row['caption'],$row['status']);
                    $image[$count]= $c;
                    $count++;
                }
                return $image;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
    public static function getAllImagescat($cat,$status)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM slider_photos WHERE category_id='".mysql_real_escape_string($cat)."' AND status='".mysql_real_escape_string($status)."'";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive Images from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return 0;
            }
            else {
                $count=0;
                $image="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new Slider_PhotoClass($row['photo_id'],$row['url'],$row['category_id'],$row['caption'],$row['status']);
                    $image[$count]= $c;
                    $count++;
                }
                return $image;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
   public static function getlastid()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT MAX(`photo_id`) max FROM slider_photos";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive Images from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return 0;
            }
            else {
               $row = mysqli_fetch_array($result);
               return $row['max'];
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
   
    public static function getImagesObject($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM slider_photos WHERE photo_id='".mysql_real_escape_string($id)."'";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive Images from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return 0;
            }
            else {
                $row = mysqli_fetch_array($result);
                    $c=new Slider_PhotoClass($row['photo_id'],$row['url'],$row['category_id'],$row['caption'],$row['status']);

                return $c;
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
