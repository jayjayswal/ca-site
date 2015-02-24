
<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/faculty_designation_class.php';
$a=  faculty_designation_class::getAlldesig();
?>
<form method="post" id="addform" enctype="multipart/form-data" action="server/faculty-detail/faculty_add_server.php"> 
      <label for="faculty_prefix">Faculty Prefix<span style="color:red;">*</span>:</label>
      <select name="faculty_prefix" id="faculty_prefix" class="text ui-widget-content ui-corner-all" required="true">    

        <option value="Mr.">Mr.</option>
        <option value="Ms.">Ms.</option>									
        <option value="Mrs.">Mrs.</option>
        <option value="Prof.">Prof.</option>
        <option value="Dr.">Dr.</option>
    </select>
      
	  <br /> <br />
	  
      <label for="faculty_name">Faculty Name<span style="color:red;">*</span>:</label>
      <input type="text" name="faculty_name" class="text ui-widget-content ui-corner-all" id="faculty_name" required maxlength="40" />
      
	  
       <label for="faculty_designation">Faculty Designation<span style="color:red;">*</span>:</label>
      <select name="faculty_designation" class="text ui-widget-content ui-corner-all" id="faculty_designation" required />
      <?php
      if(sizeof($a)!=0){
foreach ($a as $arr) {
    echo" <option value='$arr->faculty_designation_id'>$arr->faculty_designation_name</option>";
}
}
      ?>
</select>
<br /><br />
      <label for="faculty_email">Faculty Email<span style="color:red;">*</span>:</label>
      <input type="email" name="faculty_email" class="text ui-widget-content ui-corner-all" id="faculty_email"  pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" required />
      
	  <br />
          
       <label for="faculty_uname">Faculty User-Name:</label>
      <input type="text" name="faculty_uname" class="text ui-widget-content ui-corner-all" id="faculty_name" maxlength="20" />
      <br />
	  
      <label for="facultylinkedin_id">Faculty LinkedIn Id:</label>
      <input type="url" name="facultylinkedin_id" class="text ui-widget-content ui-corner-all" id="facultylinkedin_id"  />

	  <br />
	  
       <label for="file">Faculty Image:</label>
       <input type="file" accept="image/*" name="file" id="file" class="text ui-widget-content ui-corner-all" /> 
	  
	  <br />
	  <br />
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
</form>  
