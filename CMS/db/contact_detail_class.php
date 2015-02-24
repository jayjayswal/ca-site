<?php

require_once 'ConnectionClass.php';
class contact_detail
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
            $sql="SELECT * FROM  `contact_detail`";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database");
            }
            $n=mysqli_num_rows($result);
            if($n===1)
            {
                
                return $this->updateDetail();
            }
            else {
               
               return $this->insertDetail();
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
  }
  public static function getdetail()
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM  `contact_detail`";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive data from database");
            }
             $n=mysqli_num_rows($result);
            if($n===1)
            {
                $row = mysqli_fetch_array($result);
                $de=new contact_detail($row['contact_desc']);
                return $de;
            }
            else{
                return 0;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
  }
    public function insertDetail()
    {    
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql=sprintf("INSERT INTO `contact_detail` (`contact_desc`) VALUES ('%s');",mysql_real_escape_string($this->detail));
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
 
    
   public function updateDetail()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql=sprintf("UPDATE `contact_detail` SET `contact_desc`='%s'",mysql_real_escape_string($this->detail));
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
//$dd=new contact_detail('jjj');
//$dd->handlerequest();

?>
