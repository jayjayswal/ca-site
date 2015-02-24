<?php //  if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//} ?>
<form method="post" id="addform" action="server/faculty-detail/faculty_designation_add_server.php"> 
      <label for="designation_name">Designation Name<span style="color:red;">*</span>:</label>
      <input type="text" name="designation_name" class="text ui-widget-content ui-corner-all" id="designation_name" required maxlength="25" />		
          <label for="level">Level<span style="color:red;">*</span>:</label>
     <input type="number" name="level" id="level" class="text ui-widget-content ui-corner-all" min="1" max="6" required />
  <br /><br />
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
</form>  
