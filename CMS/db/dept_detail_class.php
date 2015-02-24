<?php

require_once 'ConnectionClass.php';
class dept_detail
{
    public $detail;
      
    public function __construct($d) {
        $this->detail=$d;

    }
    
    public function setvalues($d)
    {
        $this->detail=$d;
    }
    
  public function handlerequest()
  {
      $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM  `dept_detail`";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database");
            }
            $n=mysqli_num_rows($result);
             getConnection::closeConnection($con);
            if($n===1)
            {
                
               echo  $this->updateDetail();
            }
            else {
               
               echo $this->insertDetail();
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
       
  }
  public static function getdetail()
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM  `dept_detail`";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database");
            }
            $row = mysqli_fetch_array($result);
            $de=new dept_detail($row['home_page_desc']);
            getConnection::closeConnection($con);
            return $de;
        }
        catch(Exception $e)
        {
            getConnection::closeConnection($con);
            echo 'Message: ' .$e->getMessage();
        }
        
  }
    public function insertDetail()
    {    
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql=sprintf("INSERT INTO `dept_detail` (`home_page_desc`) VALUES ('%s');",mysql_real_escape_string($this->detail));
            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Insert Data");
            }
            else {
                getConnection::closeConnection($con);
                echo "done";
                return;
            }
        }
        catch(Exception $e)
        {
             getConnection::closeConnection($con);
            return 'Message: ' .$e->getMessage();
        }
       
    }
 
    
   public function updateDetail()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql=sprintf("UPDATE `dept_detail` SET `home_page_desc`='%s'",mysql_real_escape_string($this->detail));
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
            getConnection::closeConnection($con);
            echo 'Message: ' .$e->getMessage();
        }
        
   }
   
   
  
}


//
//$dd=new dept_detal('jay
//                       <font class="content-head">
//							Department of Computer Applications
//						</font>
//						<hr />
//						<font class="content-text">
//							Welcome to the website of the Department of Computer Applications, The Maharaja University of Baroda.The Department has been at the forefront of producing industry-ready software professionals since its inception & has experienced significant growth over the past few years. It offers wide range of elective & application courses along with the core courses at the undergraduate & the post graduate level. <br />
//						</font>
//                        <img src="images/docaimg.jpg"></img>
//                    </div>');
//$dd->handlerequest();
?>
