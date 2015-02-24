<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: access_denied.php?data=You don't have direct access to this page");
//}
?>
<form method="post" id="addcourse" action="server/AcademicsForms/add_course_server.php" enctype="multipart/form-data"> <!-- for file upload--> 

      <label for="courseId">Course ID<span style="color:red;">*</span>:</label>
      <input type="text" id="courseId" class="text ui-widget-content ui-corner-all" name="courseId" required maxlength="7" />
      <label for="name">Course Name<span style="color:red;">*</span>:</label>
      <input type="text" name="name" class="text ui-widget-content ui-corner-all" id="name" required />		
      <label for="credit">Course Credit<span style="color:red;">*</span>:</label>
<!--      <input type="text" name="credit" class="text ui-widget-content ui-corner-all" id="credit" required />-->
      <input type="number" name="credit" id="credit" class="text ui-widget-content ui-corner-all" min="1" max="5" required />
     <label for="programme">Programme:</label>
            <div id="radio" >
                <input type="radio" id="radio1" name="programme" value="BCA" checked /><label for="radio1">BCA</label>
            <input type="radio" id="radio2" name="programme" value="Msc.ST" /><label for="radio2">Msc.ST</label>
          </div><br />       
     <label for="semester">Semester<span style="color:red;">*</span>:</label>
<!--    <input type="text" name="semester" class="text ui-widget-content ui-corner-all" id="semester" required />-->
     <input type="number" name="semester" id="semester" class="text ui-widget-content ui-corner-all" min="1" max="6" required />
    <label for="cfile">Course Structure File:</label>
    <input type="file" name="cfile" id="cfile" accept=".pdf" class="text ui-widget-content ui-corner-all" /><br /><br />
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
</form>  