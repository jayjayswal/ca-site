<?php
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/faculty_designation_class.php';
require_once 'db/faculty_detail_class.php';
define('INCLUDE_CHECK', true);
if(isset($_GET['id']))
{
    $ti=$_GET['id'];
}
 else {
   die("First Go to faculty managemant page");

}

$a=  faculty_designation_class::getAlldesig();
$b= faculty_detail_class::getFacultyObject($ti);

?>
<form method="post" id="updateform" enctype="multipart/form-data" action="server/faculty-detail/faculty_bupdate_server.php"> 
     
     <label for="faculty_id">Faculty ID<span style="color:red;">*</span>:</label>
     <input type="text" value="<?php echo $b->faculty_id ?>" id="faculty_id" class="text ui-widget-content ui-corner-all" name="faculty_id" required readonly="true"/>
    <label for="faculty_prefix">Faculty Prefix<span style="color:red;">*</span>:</label>
      <select name="faculty_prefix" id="faculty_prefix" class="text ui-widget-content ui-corner-all" required="true">    

        <option value="Mr." <?php if($b->faculty_prefix=="Mr.")echo "selected" ?>>Mr.</option>
        <option value="Ms." <?php if($b->faculty_prefix=="Ms.")echo "selected" ?>>Ms.</option>									
        <option value="Mrs." <?php if($b->faculty_prefix=="Mrs.")echo "selected" ?>>Mrs.</option>
        <option value="Prof." <?php if($b->faculty_prefix=="Prof.")echo "selected" ?>>Prof.</option>
        <option value="Dr." <?php if($b->faculty_prefix=="Dr.")echo "selected" ?>>Dr.</option>
    </select>
      
	  <br /> <br />
	  
      <label for="faculty_name">Faculty Name<span style="color:red;">*</span>:</label>
      <input type="text" name="faculty_name" value="<?php echo $b->faculty_name ?>"class="text ui-widget-content ui-corner-all" id="faculty_name" required maxlength="40" />
      
	  
       <label for="faculty_designation">Faculty Designation<span style="color:red;">*</span>:</label>
      <select name="faculty_designation"  class="text ui-widget-content ui-corner-all" id="faculty_designation" required />
      <?php
      if(sizeof($a)!=1){
foreach ($a as $arr) {
    echo" <option value='$arr->faculty_designation_id' ";if($arr->faculty_designation_id==$b->faculty_designation_id)echo 'selected'; echo ">$arr->faculty_designation_name</option>";
}
}
      ?>
</select>
<br /><br />
      <label for="faculty_email">Faculty Email<span style="color:red;">*</span>:</label>
      <input type="email" name="faculty_email" value="<?php echo $b->faculty_email ?>" class="text ui-widget-content ui-corner-all" id="faculty_email"  pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" required />
      
	  <br />
          
                <label for="faculty_uname">Faculty User-Name:</label>
      <input type="text" name="faculty_uname" value="<?php echo $b->faculty_uname ?>" class="text ui-widget-content ui-corner-all" id="faculty_name" maxlength="40" />
      <br />
	  
      <label for="facultylinkedin_id">Faculty LinkedIn Id:</label>
      <input type="url" name="facultylinkedin_id" value="<?php echo $b->faculty_linkedin_id ?>" class="text ui-widget-content ui-corner-all" id="facultylinkedin_id" />

	  <br />
	  
       <label for="file">Faculty Image:</label>
       <input type="file" accept="image/*" name="file" id="file" class="text ui-widget-content ui-corner-all" /> 
	  
	  <br />
	  <br />
    <button type="submit">Submit</button>
</form>  
