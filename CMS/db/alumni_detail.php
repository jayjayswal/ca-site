<?php
require_once 'ConnectionClass.php';
class Alumni_Detail {
    //put your code here
    public $alumni_uname;
    public $alumni_first_name;    
    public $alumni_last_name;
    public $alumni_email;
    public $alumni_linkedin_id;
    public $alumni_resume_url;
    public $alumni_batch;
    public $alumni_photo_url;
    public $alumni_password;
    public $alumni_status=0;
    
    public function __construct($auname,$fname,$lname,$email,$linkedin,$res_url,$batch,$photo_url,$pwd,$status) {
        $this->alumni_uname=$auname;
        $this->alumni_first_name=$fname;    
        $this->alumni_last_name=$lname;
        $this->alumni_email=$email;
        $this->alumni_linkedin_id=$linkedin;
        $this->alumni_resume_url=$res_url;
        $this->alumni_batch=$batch;
        $this->alumni_photo_url=$photo_url;
        $this->alumni_password=$pwd;
        $this->alumni_status=$status;
   }
   public function SetAlumniDetail($auname,$fname,$lname,$email,$linkedin,$res_url,$batch,$photo_url,$pwd,$status) {
        $this->alumni_uname=$auname;
        $this->alumni_first_name=$fname;    
        $this->alumni_last_name=$lname;
        $this->alumni_email=$email;
        $this->alumni_linkedin_id=$linkedin;
        $this->alumni_resume_url=$res_url;
        $this->alumni_batch=$batch;
        $this->alumni_photo_url=$photo_url;
        $this->alumni_password=$pwd;
        $this->alumni_status=$status;
   }
   public function mysqlfor(){
       
        $this->alumni_uname=mysql_real_escape_string( $this->alumni_uname);
        $this->alumni_first_name=mysql_real_escape_string($this->alumni_first_name);
        $this->alumni_last_name=mysql_real_escape_string($this->alumni_last_name);
        $this->alumni_email=mysql_real_escape_string($this->alumni_email);
        $this->alumni_linkedin_id=mysql_real_escape_string( $this->alumni_linkedin_id);
        $this->alumni_resume_url=mysql_real_escape_string($this->alumni_resume_url);
        $this->alumni_batch=mysql_real_escape_string($this->alumni_batch);
        $this->alumni_photo_url=mysql_real_escape_string($this->alumni_photo_url);
        $this->alumni_password=mysql_real_escape_string($this->alumni_password);
        $this->alumni_status=mysql_real_escape_string( $this->alumni_status);
   }
   
   
   public static function checkUsernameAvalibility($auname)
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM alumni_detail WHERE alumni_uname='".mysql_real_escape_string($auname)."'";
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


public function InsertAlumni()
    {
          $a=self::checkUsernameAvalibility($this->alumni_uname);
          if($a==0)
          {
              return "This username already exsists";
          }
          else{
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
           $this->mysqlfor();
            $this->alumni_password=sha1($this->alumni_password);
           // $sql="INSERT INTO alumni_detail VALUES('".$this->alumni_uname."','".$this->alumni_first_name."','".$this->alumni_last_name."','".$this->alumni_email."','".$this->alumni_linkedin_id."','".$this->alumni_resume_url."','".$this->alumni_batch."','".$this->alumni_photo_url."','".$this->alumni_password."',".$this->alumni_status.")";
            $sqll="INSERT INTO  `alumni_detail` (`alumni_uname` ,`alumni_first_name` ,`alumni_last_name` ,`alumni_email` ,`alumni_linkedin_id` ,`alumni_resume_url` ,`alumni_batch` ,`alumni_photo_url` ,`alumni_password` ,`alumni_status`) VALUES ('$this->alumni_uname','$this->alumni_first_name','$this->alumni_last_name','$this->alumni_email',  '$this->alumni_linkedin_id','$this->alumni_resume_url',$this->alumni_batch,'$this->alumni_photo_url','$this->alumni_password',$this->alumni_status);";
            if(!mysqli_query($con,$sqll))
            {
                throw new Exception("Cannot Add Alumni");
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
    public function updateAlumni()
   {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
            $this->alumni_password=sha1($this->alumni_password);
            $sql="UPDATE alumni_detail SET alumni_email='".$this->alumni_email."',alumni_linkedin_id='".$this->alumni_linkedin_id."',alumni_resume_url='".$this->alumni_resume_url."',alumni_batch='".$this->alumni_batch."',alumni_photo_url='".$this->alumni_photo_url."' WHERE alumni_uname='".$this->alumni_uname."'";
            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Update Data");
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
 public static function getAlumniObject($un)
   {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM alumni_detail WHERE alumni_uname='".mysql_real_escape_string($un)."'";
              $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive Alumni's from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return 0;
            }
            else {
                
                $row = mysqli_fetch_array($result);
                   
                    $c=new Alumni_Detail($row['alumni_uname'],$row['alumni_first_name'],$row['alumni_last_name'],$row['alumni_email'],$row['alumni_linkedin_id'],$row['alumni_resume_url'],$row['alumni_batch'],$row['alumni_photo_url'],$row['alumni_password'],$row['alumni_status']);
                    return $c;
        }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   
}
 public static function deleteAlumni($un)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
         try{
            $sql="DELETE FROM alumni_detail WHERE alumni_uname='" . mysql_real_escape_string($un)."'";
            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Delete Data");
            }
            $a=mysqli_affected_rows($con);
            if($a==0)
            {
                throw new Exception("Not Deleted");
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
   
   public static function getAllAlumni($status)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM alumni_detail WHERE alumni_status=".mysql_real_escape_string($status);
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive Alumni's from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return 0;
            }
            else {
                $count=0;
                $alumni="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new Alumni_Detail($row['alumni_uname'],$row['alumni_first_name'],$row['alumni_last_name'],$row['alumni_email'],$row['alumni_linkedin_id'],$row['alumni_resume_url'],$row['alumni_batch'],$row['alumni_photo_url'],$row['alumni_password'],$row['alumni_status']);
                    $alumni[$count]= $c;
                    $count++;
                }
                return $alumni;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
     public static function ApproveAlumni($a_uname){
       

        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try
        {
            $sql="UPDATE alumni_detail SET alumni_status=1 WHERE alumni_uname='".mysql_real_escape_string($a_uname)."'";

            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Update Data");
            }
            else 
            {
                echo "done";
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
            getConnection::closeConnection($con);

   }
   
   public static function changepass($newpass,$uname){
       

        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try
        {
            $pass=  sha1($newpass);
            $sql="UPDATE alumni_detail SET alumni_password='".mysql_real_escape_string($pass)."' WHERE alumni_uname='".mysql_real_escape_string($uname)."'";

            if(!mysqli_query($con,$sql))
            {
                throw new Exception("Cannot Update Data");
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
   public static function getNoOfAlumni($uname,$pass){
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM alumni_detail where alumni_uname='" . mysql_real_escape_string($uname) . "' and alumni_password='" .mysql_real_escape_string( $pass ). "'";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive Alumni's from database");
            }
            $n=mysqli_num_rows($result);
            return $n;
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
   

}
       
//$alu=new Alumni_Detail("Riddhi","Riddhu","verma","www.xl@sd.com","http://www.bib.com",NULL,2011,NULL,"qaz@1",0);
//$alu->InsertAlumni();
//$a=Alumni_Detail::getAllAlumni();
/*echo $a[1]->alumni_batch ."  " ;
echo $a[1]->alumni_email."  ";
echo $a[1]->alumni_first_name."  ";
echo $a[1]->alumni_last_name."  ";
echo $a[1]->alumni_linkedin_id."  ";
echo $a[1]->alumni_password."  ";
echo $a[1]->alumni_photo_url."  ";
echo $a[1]->alumni_resume_url."  ";
echo $a[1]->alumni_status."  ";
echo $a[1]->alumni_uname."  "; */
//$alu->updateAlumni();
   // $a[0]->deleteAlumni();
// ApproveAlumni("Riddhi");
//echo $a[1]->alumni_status."  ";
?>