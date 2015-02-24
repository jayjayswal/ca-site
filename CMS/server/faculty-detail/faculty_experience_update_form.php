<?php
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/faculty_experience_class.php';
require_once 'db/faculty_detail_class.php';
define('INCLUDE_CHECK', true);
if(!isset($_GET['id']))
{
    die("go to faculty management page");
}
$id=$_GET['id'];


$de= faculty_experience_class::getExprienceObject($id);
if ($_SESSION['user']->role_id==2) {
    if(faculty_detail_class::getID($_SESSION['user']->username)!=$de->faculty_id){
         header("location:access_denied.php?data=You have no access to this page ");
    }
    
}
if($de===0){
    die("invalid experience");
}
?>
<form method="post" id="updateform" action="server/faculty-detail/faculty_experience_update_server.php"> 
         <label for="expID">Experience ID<span style="color:red;">*</span>:</label>
     <input type="text" value="<?php echo $de->experience_id; ?>" id="expID" class="text ui-widget-content ui-corner-all" name="expID" required readonly="true" />
    <label for="facultyID">Faculty ID<span style="color:red;">*</span>:</label>
     <input type="text" value="<?php echo $de->faculty_id; ?>" id="facultyID" class="text ui-widget-content ui-corner-all" name="facultyID" required readonly="true" />
           <label for="insName">Institute/Company Name<span style="color:red;">*</span>:</label>
      <input type="text" name="insName" value="<?php echo $de->faculty_institute?>" class="text ui-widget-content ui-corner-all" id="insName" required />		
   <label for="year">Years<span style="color:red;">*</span>:</label>
      <input type="number" name="year" value="<?php echo $de->faculty_no_of_year?>" id="year" class="text ui-widget-content ui-corner-all" min="1" max="99" required />
         <label for="desig">Designation<span style="color:red;">*</span>:</label>
      <input type="text" name="desig" value="<?php echo $de->faculty_designation?>" class="text ui-widget-content ui-corner-all" id="desigs" required />		
     <br /><br />
    <button type="submit">Submit</button>
</form>
