<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
?>
<form method="post" id="addcourse" action="server/student/student_add_server.php" enctype="multipart/form-data">

      <label for="firstname">First Name<span style="color:red;">*</span>: </label>
      <input type="text" name="firstname" class="text ui-widget-content ui-corner-all" id="firstname" minlength="0" maxlength="15"  required />

      <label for="lastname">Last Name<span style="color:red;">*</span>: </label>
      <input type="text" name="lastname" class="text ui-widget-content ui-corner-all" id="lastname" minlength="0" maxlength="15"  required />

      <label for="email">Email<span style="color:red;">*</span>: </label>
      <input type="email" name="email" class="text ui-widget-content ui-corner-all" id="email" required />

      <label for="linkedinId">Linkedin Id: </label>
      <input type="url" name="linkedinId" class="text ui-widget-content ui-corner-all" id="linkedinId"/>


      <label for="batch">Batch<span style="color:red;">*</span>: </label>
      <input type="text" name="batch" class="text ui-widget-content ui-corner-all" id="batch" minlength="0" maxlength="15"  required />

      <label for="cgpa">CGPA<span style="color:red;">*</span>: </label>
      <input type="text" name="cgpa" class="text ui-widget-content ui-corner-all" id="cgpa" maxlength="4"  required />

      <label for="specialization">Specialization: </label>
      <input type="text" name="specialization" class="text ui-widget-content ui-corner-all" id="specialization" minlength="0" maxlength="15" />

      <label for="programme">Programme: </label>
            <div id="radio" >
                <input type="radio" id="radio1" name="programme" value="BCA" checked /><label for="radio1">BCA</label>
                <input type="radio" id="radio2" name="programme" value="Msc.ST" /><label for="radio2">Msc.ST</label>
            </div><br /><br />
    <label for="cfile">Resume File<span style="color:red;">*</span>:</label>
    <input type="file" name="cfile" id="cfile" class="text ui-widget-content ui-corner-all" required accept=".pdf" />
    <br />
      <button type="submit">Submit</button>
      <button type="reset">Reset</button>
   </form>