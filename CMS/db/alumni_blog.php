<?php
require_once 'ConnectionClass.php';
class Alumni_Blog {
    //put your code here
    public $blog_id;
    public $alumni_uname;
    public $alumni_blog_subject;
    public $alumni_blog_detail;
    public $alumni_blog_date;
    public $alumni_blog_status=0;
   
  public function __construct($bid,$auname,$asub,$adetail,$da,$sts) {
       $this->blog_id=$bid;
       $this->alumni_uname=$auname;
       $this->alumni_blog_subject=$asub;
       $this->alumni_blog_detail=$adetail;
       $this->alumni_blog_status=$sts;
       $this->alumni_blog_date=$da;
   }
   public function SetBlog($bid,$auname,$asub,$adetail,$da,$sts)  {
       $this->blog_id=$bid;
       $this->alumni_uname=$auname;
       $this->alumni_blog_subject=$asub;
       $this->alumni_blog_detail=$adetail;
       $this->alumni_blog_status=$sts;
       $this->alumni_blog_date=$da;
   }
   public static function checkBlogAvalibility($bid)
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM alumni_blog WHERE blog_id=".mysql_real_escape_string($bid);
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
    public function InsertBlog()
    {
        
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
           
            $sql="INSERT INTO `alumni_blog` VALUES(NULL,'".mysql_real_escape_string($this->alumni_uname)."','".mysql_real_escape_string($this->alumni_blog_subject)."','".mysql_real_escape_string($this->alumni_blog_detail)."','".mysql_real_escape_string(date('Y-m-d'))."',".mysql_real_escape_string($this->alumni_blog_status).")";
            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Add this Blog");
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
public function updateBlog()
   {
       $a=self::checkBlogAvalibility($this->blog_id);
          if($a==1)
          {
              return "This Blog Doesn't exsists";
          }
          else{
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="UPDATE alumni_blog SET alumni_blog_subject='" . mysql_real_escape_string($this->alumni_blog_subject) . "',alumni_blog_detail='".mysql_real_escape_string($this->alumni_blog_detail)."' WHERE blog_id=" .mysql_real_escape_string( $this->blog_id);

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
}
public static function getBlogObject($id)
   {

        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * From alumni_blog WHERE blog_id=" .mysql_real_escape_string($id);
              $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive Blogs from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return 0;
            }
            else {
                $row = mysqli_fetch_array($result);  
                            $c=new Alumni_Blog($row['blog_id'],$row['alumni_uname'],$row['alumni_blog_subject'],$row['alumni_blog_detail'],$row['alumni_blog_date'],$row['alumni_blog_status']);
                return $c;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   
}
 public static function deleteBlog($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
         try{
            $sql="DELETE FROM alumni_blog WHERE blog_id=" . mysql_real_escape_string($id);
            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Delete Data");
            }
            $a=mysqli_affected_rows($con);
            if($a==0)
            {
                throw new Exception("No Blog(s) Deleted");
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
   
   public static function getAllBlogs($status)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM alumni_blog where alumni_blog_status=".mysql_real_escape_string($status);

            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive Blogs from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return "No Blogs are Added Yet";
            }
            else {
                $count=0;
                $blogs="";
                while($row = mysqli_fetch_array($result))
                {
                   
                     $c=new Alumni_Blog($row['blog_id'],$row['alumni_uname'],$row['alumni_blog_subject'],$row['alumni_blog_detail'],$row['alumni_blog_date'],$row['alumni_blog_status']);
                    $blogs[$count]= $c;
                    $count++;
                }
                return $blogs;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
   public static function getAllBlogswithlimit($status,$lowlimit,$uplimit)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT `blog_id`,`alumni_uname`,`alumni_blog_subject`,SUBSTRING(alumni_blog_detail,1,290) `alumni_blog_detail`,`alumni_blog_date`,`alumni_blog_status` FROM alumni_blog where alumni_blog_status=".mysql_real_escape_string($status)." ORDER BY blog_id DESC LIMIT ".mysql_real_escape_string($lowlimit).",".mysql_real_escape_string($uplimit)."";

            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive Blogs from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return 0;
            }
            else {
                $count=0;
                $blogs="";
                while($row = mysqli_fetch_array($result))
                {
                   
                      $c=new Alumni_Blog($row['blog_id'],$row['alumni_uname'],$row['alumni_blog_subject'],$row['alumni_blog_detail'],$row['alumni_blog_date'],$row['alumni_blog_status']);
                    $blogs[$count]= $c;
                    $count++;
                }
                return $blogs;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
    
   
   
    public static function ApproveBlog($id){
       

        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="UPDATE alumni_blog SET alumni_blog_status=1 WHERE blog_id=".mysql_real_escape_string($id);

            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Update Data");
            }
 else {
     echo 1;
 }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
            getConnection::closeConnection($con);
               
   }
    public static function countblog($status){
       

        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT count(`blog_id`) count FROM `alumni_blog` WHERE `alumni_blog_status`=".mysql_real_escape_string($status)."";

            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive Blogs from database");
            }
                $row = mysqli_fetch_array($result);
                
                   return $row['count'];        
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
            getConnection::closeConnection($con);
               
   }
   
   

}

?>
