<?php
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}

require_once 'db/faculty_qualification_class.php';
require_once 'db/faculty_detail_class.php';
define('INCLUDE_CHECK', true);
if(!isset($_GET['id']))
{
    die("go to faculty management page");
}
$id=$_GET['id'];


$de=  faculty_qualification_class::getQualificationObject($id);
if ($_SESSION['user']->role_id==2) {
    if(faculty_detail_class::getID($_SESSION['user']->username)!=$de->faculty_id){
         header("location:access_denied.php?data=You have no access to this page ");
    }
    
}
if($de===0){
    die("invalid qualification");
}
?>
<form method="post" id="updateform" action="server/faculty-detail/faculty_qualification_update_server.php"> 
         <label for="expID">Qualification ID<span style="color:red;">*</span>:</label>
     <input type="text" value="<?php echo $de->qualification_id ?>" id="expID" class="text ui-widget-content ui-corner-all" name="expID" required readonly="true" />
    <label for="facultyID">Faculty ID<span style="color:red;">*</span>:</label>
     <input type="text" value="<?php echo $de->faculty_id; ?>" id="facultyID" class="text ui-widget-content ui-corner-all" name="facultyID" required readonly="true" />
           <label for="dName">Degree Name<span style="color:red;">*</span>:</label>
           <input type="text" name="dName" value="<?php echo $de->faculty_degree ?>" class="text ui-widget-content ui-corner-all" id="dName" required />		

              <label for="insName">Institute Name<span style="color:red;">*</span>:</label>
      <input type="text" name="insName" value="<?php echo $de->faculty_institute_name ?>" class="text ui-widget-content ui-corner-all" id="insName" required />		
         <label for="year">Passing Year<span style="color:red;">*</span>:</label>
      <input type="number" name="year" value="<?php echo $de->faculty_year_of_passing ?>" id="year" class="text ui-widget-content ui-corner-all" min="1900" required />
   	<br /><br />
    <button type="submit">Submit</button>
</form>
