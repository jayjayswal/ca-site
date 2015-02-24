<?php
require_once 'ConnectionClass.php';

class Slider_CategoryClass {
    //put your code here
    public $category_id;
    public $category_name;
    public $category_color;
    
    public function __construct($cid,$cname,$ccolor) {
        $this->category_id=$cid;
        $this->category_name=$cname;
        $this->category_color=$ccolor;
    }
    public function setCategories($cname,$ccolor) {
        $this->category_name=$cname;
        $this->category_color=$ccolor;
    }
    public static function checkAvalibility($name)
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM slider_category WHERE category_name='".mysql_real_escape_string($name)."'";
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
     public function insertCategory()
    {
          $a=  self::checkAvalibility(mysql_real_escape_string($this->category_name));
          if($a==0)
          {
              return "This Category already exsists";
          }
          else{
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="INSERT INTO slider_category VALUES(NULL,'" . mysql_real_escape_string($this->category_name) . "','" . mysql_real_escape_string($this->category_color) . "')";
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
    
   public function updateCategory()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="UPDATE slider_category SET category_name='" . mysql_real_escape_string($this->category_name) . "',category_color='".mysql_real_escape_string($this->category_color)."' WHERE category_id=" . mysql_real_escape_string($this->category_id);
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
   
   
   public static function deleteCategory($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
         try{
            $sql="DELETE FROM slider_category WHERE category_id='" . mysql_real_escape_string($id). "'";
            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Delete Data");
            }
            $a=mysqli_affected_rows($con);
            if($a==0)
            {
                throw new Exception("No Row(s) Deleted");
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
   
   public static function getAllCategories()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM slider_category";
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
                $category="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new Slider_CategoryClass($row['category_id'],$row['category_name'],$row['category_color']);
                    $category[$count]= $c;
                    $count++;
                }
                return $category;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
    
}

//$cat= new Slider_CategoryClass(4,"lah","casd");
//$cat->insertCategory();
//$cat->updateCategory();
//$cat->deleteCategory();
//$c=Slider_CategoryClass::getAllCategories();
//echo $c[0]->category_name;
?>
