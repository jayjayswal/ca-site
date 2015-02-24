<?php

require_once 'ConnectionClass.php';
class user_class {
    public $username;
    public $password;
    public $role_id;
    
     public function  __construct($uname,$pass,$rid) {
         $this->username=$uname;
         $this->password=$pass;
         $this->role_id=$rid;
    }
    public function setvalues($uname,$pass,$rid)
    {
         $this->username=$uname;
         $this->password=$pass;
         $this->role_id=$rid;
    }
    
    public function mysqlfor()
    {
         $this->username=mysql_real_escape_string($this->username);
         $this->password=mysql_real_escape_string($this->password);
         $this->role_id=mysql_real_escape_string($this->role_id);
    }
    
    public static function checkAvalibility($uname)
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM user WHERE username='".mysql_real_escape_string($uname)."'";
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
     
      public function insertUser()
    {
         $a= user_class::checkAvalibility(mysql_real_escape_string($this->username));
          if($a==0)
          {
              return "Username id alredy exsist";
          }
          else{
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->password= sha1($this->password);
            $this->mysqlfor();
            $sql="INSERT INTO `user` (`username`, `password`, `role_id`) VALUES ('$this->username', '$this->password', '$this->role_id');";
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
     public function updateUser()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->password=sha1($this->password);
            $this->mysqlfor();
            $sql="UPDATE `user` SET `password` = '$this->password', `role_id` = '$this->role_id' WHERE `user`.`username` = '$this->username';";
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
   
    public static function getUserObject($uname)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM `user` WHERE `user`.`username` = '".mysql_real_escape_string($uname)."';";
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
                    $c=new user_class($row['username'],$row['password'],$row['role_id']);                    
                return $c;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
    public static function deleteUser($uname)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
         try{
            $sql="DELETE FROM `user` WHERE `user`.`username` = '".mysql_real_escape_string($uname)."';";
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
   public static function getAllUsers()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM `user`";
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
                $user="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new user_class($row['username'],$row['password'],$row['role_id']);
                    $user[$count]= $c;
                    $count++;
                }
                return $user;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
   public function getpass()
   {
       return $this->password;
   }
    public static function getRoles()
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM `role`";
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
                $role="";
                while($row = mysqli_fetch_array($result))
                {
                    $role[$row['role_id']]=$row['role_name'];
                }
                return $role;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
   
}

//$u=new user_class("jjay","asds",2);
//$u->insertUser();
//$u->updateUser();
//$u->deleteCourse();
//$al=  user_class::getAllUsers();
//echo $al[0]->getpass();
?>
