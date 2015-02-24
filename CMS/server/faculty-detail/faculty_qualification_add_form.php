<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/faculty_detail_class.php';
if(!isset($_GET['id']))
{
    die("go to faculty management page");
}
$id=$_GET['id'];
$a=  faculty_detail_class::getFacultyObject($id);
?>
<form method="post" id="addform" action="server/faculty-detail/faculty_qualification_add_server.php"> 
     <label for="facultyID">Faculty ID<span style="color:red;">*</span>:</label>
     <input type="text" value="<?php echo $a->faculty_id; ?>" id="facultyID" class="text ui-widget-content ui-corner-all" name="facultyID" required readonly="true" />
           <label for="dName">Degree Name<span style="color:red;">*</span>:</label>
      <input type="text" name="dName" class="text ui-widget-content ui-corner-all" id="dName" required />		

              <label for="insName">Institute Name<span style="color:red;">*</span>:</label>
      <input type="text" name="insName" class="text ui-widget-content ui-corner-all" id="insName" required />		
         <label for="year">Passing Year<span style="color:red;">*</span>:</label>
      <input type="number" name="year" id="year" class="text ui-widget-content ui-corner-all" min="1900" required />
   	
     <br /><br />
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
</form>  
