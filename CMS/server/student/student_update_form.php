<?php
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/student_class.php';
define('INCLUDE_CHECK', true);
if(isset($_GET['id']))
{
    $ti=$_GET['id'];
}
 else {
   die("First Go to course managemant page");

}


$b= Student::getstudentObjest($ti);
if($b===0){
    die("invalid student");
}
?>
<form method="post" id="updateform" action="server/student/student_update_server.php" enctype="multipart/form-data"> <!-- for file upload--> 

     <label for="courseId">Student ID<span style="color:red;">*</span>:</label>
      <input type="text" readonly="true" value="<?php echo $b->student_id; ?>" id="Id" class="text ui-widget-content ui-corner-all" name="Id" required maxlength="7" />
     
      <label for="firstname">First Name<span style="color:red;">*</span>: </label>
      <input type="text" name="firstname"  value="<?php echo $b->student_first_name; ?>" class="text ui-widget-content ui-corner-all" id="firstname" minlength="0" maxlength="15"  required />

      <label for="lastname">Last Name<span style="color:red;">*</span>: </label>
      <input type="text" name="lastname"  value="<?php echo $b->student_last_name; ?>" class="text ui-widget-content ui-corner-all" id="lastname" minlength="0" maxlength="15"  required />

      <label for="email">Email<span style="color:red;">*</span>: </label>
      <input type="email" name="email" value="<?php echo $b->student_email; ?>" class="text ui-widget-content ui-corner-all" id="email" required />

      <label for="linkedinId">Linkedin Id: </label>
      <input type="url" name="linkedinId"  value="<?php echo $b->student_linkedin_id; ?>" class="text ui-widget-content ui-corner-all" id="linkedinId"/>


      <label for="batch">Batch<span style="color:red;">*</span>: </label>
      <input type="text" name="batch"  value="<?php echo $b->student_batch; ?>" class="text ui-widget-content ui-corner-all" id="batch" minlength="0" maxlength="15"  required />

      <label for="cgpa">CGPA<span style="color:red;">*</span>: </label>
      <input type="text" name="cgpa"  value="<?php echo $b->student_cgpa; ?>" class="text ui-widget-content ui-corner-all" id="cgpa" maxlength="4"  required />

      <label for="specialization">Specialization: </label>
      <input type="text" name="specialization"  value="<?php echo $b->student_specialization; ?>" class="text ui-widget-content ui-corner-all" id="specialization" minlength="0" maxlength="15" />

      <label for="programme">Programme: </label>
            <div id="radio" >
                  <input type="radio" id="radio1" name="programme" value="BCA" <?php if($b->student_programme=="BCA") {echo "checked";} ?>  /><label for="radio1">BCA</label>
            <input type="radio" id="radio2" name="programme" value="MSc.ST"<?php if($b->student_programme=="MSc.ST") {echo "checked";} ?>  /><label for="radio2">Msc.ST</label>
          </div><br /><br />
    <label for="cfile">Resume File:</label>
    <input type="file" name="cfile" id="cfile" class="text ui-widget-content ui-corner-all" accept="application/pdf" />
    <br />
      <button type="submit">Submit</button>
</form> 

