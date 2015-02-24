<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student
 *
 * @author Admin
 */
require_once 'ConnectionClass.php';
class Student {
    //put your code here
    public $student_id;
    public $student_first_name;
    public $student_last_name;
    public $student_email;
    public $student_linkedin_id;
    public $student_resume_url;
    public $student_batch;
    public $student_cgpa;
    public $student_specialization;
    public $student_programme;
    public function __construct($sid,$sfname,$lname,$email,$linkedinId,$resurl,$batch,$cgpa,$specialization,$prg)
    {
        $this->student_id=$sid;
        $this->student_first_name=$sfname;
        $this->student_last_name=$lname;
        $this->student_email=$email;
        $this->student_linkedin_id=$linkedinId;
        $this->student_resume_url=$resurl;
        $this->student_batch=$batch;
        $this->student_cgpa=$cgpa;
        $this->student_specialization=$specialization;
        $this->student_programme=$prg;
    }
    public function SetStudentDetails($sid,$sfname,$lname,$email,$linkedinId,$resurl,$batch,$cgpa,$specialization,$prg)
    {
        $this->student_id=$sid;
        $this->student_first_name=$sfname;
        $this->student_last_name=$lname;
        $this->student_email=$email;
        $this->student_linkedin_id=$linkedinId;
        $this->student_resume_url=$resurl;
        $this->student_batch=$batch;
        $this->student_cgpa=$cgpa;
        $this->student_specialization=$specialization;
        $this->student_programme=$prg;
    }
    
    public function mysqlfor()
    {
        $this->student_id=mysql_real_escape_string($this->student_id);
        $this->student_first_name=mysql_real_escape_string($this->student_first_name);
        $this->student_last_name=mysql_real_escape_string($this->student_last_name);
        $this->student_email=mysql_real_escape_string($this->student_email);
        $this->student_linkedin_id=mysql_real_escape_string($this->student_linkedin_id);
        $this->student_resume_url=mysql_real_escape_string($this->student_resume_url);
        $this->student_batch=mysql_real_escape_string($this->student_batch);
        $this->student_cgpa=mysql_real_escape_string($this->student_cgpa);
        $this->student_specialization=mysql_real_escape_string($this->student_specialization);
        $this->student_programme=mysql_real_escape_string($this->student_programme);
    }
    
       public static function checkStudentAvalibility($sid)
    {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM student WHERE student_id=".mysql_real_escape_string($sid);
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

     
     
public function InsertStudent()
    {

        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
            $sqll="INSERT INTO  `student` (`student_id` ,`student_first_name` ,`student_last_name` ,`student_email` ,`student_linkedin_id`,`student_resume_url`,`student_batch`,`student_cgpa`,`student_specialization`,`student_programme`) VALUES (NULL,'$this->student_first_name','$this->student_last_name','$this->student_email','$this->student_linkedin_id','$this->student_resume_url','$this->student_batch','$this->student_cgpa','$this->student_specialization','$this->student_programme');";
            if(!mysqli_query($con,$sqll))
            {
                throw new Exception("Cannot Add Student");
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
    
     public function updateStudentDetails()
   {
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $this->mysqlfor();
            $sql="UPDATE `student` SET student_first_name='". $this->student_first_name. "',student_last_name='".$this->student_last_name."',student_email='".$this->student_email."',student_linkedin_id='".$this->student_linkedin_id."',student_resume_url='".$this->student_resume_url."',student_batch='".$this->student_batch."',student_cgpa=".$this->student_cgpa.",student_specialization='".$this->student_specialization."',student_programme='".$this->student_programme."' WHERE student_id=".$this->student_id;
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
 public static function deletestudent($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
         try{
            $sql="DELETE FROM `student` WHERE student_id=" .mysql_real_escape_string($id);
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
   
  
    public static function getstudentObjest($id)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM student WHERE student_id='".mysql_real_escape_string($id)."'";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive Students from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return 0;
            }
            else {
                $row = mysqli_fetch_array($result);
                    $c=new Student($row['student_id'],$row['student_first_name'],$row['student_last_name'],$row['student_email'],$row['student_linkedin_id'],$row['student_resume_url'],$row['student_batch'],$row['student_cgpa'],$row['student_specialization'],$row['student_programme']);
                return $c;
            }
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        getConnection::closeConnection($con);
   }
   
   
   public static function getAllstudent($cat)
   {
       $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
        try{
            $sql="SELECT * FROM student WHERE student_programme='".mysql_real_escape_string($cat)."'";
            $result=mysqli_query($con,$sql);
            if(!$result)
            {
                throw new Exception("Cannot Retrive Students from database");
            }
            $n=mysqli_num_rows($result);
            if($n===0)
            {
                return 0;
            }
            else {
                $count=0;
                $std="";
                while($row = mysqli_fetch_array($result))
                {
                   
                    $c=new Student($row['student_id'],$row['student_first_name'],$row['student_last_name'],$row['student_email'],$row['student_linkedin_id'],$row['student_resume_url'],$row['student_batch'],$row['student_cgpa'],$row['student_specialization'],$row['student_programme']);
                    $std[$count]= $c;
                    $count++;
                }
                return $std;
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
