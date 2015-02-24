
<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
//require_once 'db/faculty_designation_class.php';
//$a=  faculty_designation_class::getAlldesig();
?>
<form method="post" id="addform" name="addform" enctype="multipart/form-data" action="server/alumni/alumni_add_server.php"> 
	  
      <label for="fname">First Name<span style="color:red;">*</span>:</label>
      <input type="text" name="fname" class="text ui-widget-content ui-corner-all" id="fname" required maxlength="40" />      

            <label for="lname">Last Name<span style="color:red;">*</span>:</label>
      <input type="text" name="lname" class="text ui-widget-content ui-corner-all" id="lname" required maxlength="40" />    
      
            <label for="email">Email<span style="color:red;">*</span>:</label>
      <input type="email" name="email" class="text ui-widget-content ui-corner-all" id="email"  pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" required />
   
            <label for="linkedin_id">LinkedIn Id:</label>
      <input type="url" name="linkedin_id" class="text ui-widget-content ui-corner-all" id="linkedin_id" />

             <label for="file">Image<span style="color:red;">*</span>:</label>
             <input type="file" name="file" id="file" class="text ui-widget-content ui-corner-all" required="true"/> 
       
       <label for="file">Resume:</label>
       <input type="file" name="rfile" id="rfile" class="text ui-widget-content ui-corner-all" /> 
	  
             <label for="batch">Batch Year<span style="color:red;">*</span>:</label>
        <input type="text" name="batch" class="text ui-widget-content ui-corner-all" id="batch" required maxlength="9" />    
	
      
      <label for="userName">Username<span style="color:red;">*</span>:</label>
      <input type="text" id="userName" name="userName" class="text ui-widget-content ui-corner-all"  required maxlength="10" /><button id="check" onclick="checkuname()" type="button">check availability</button><samp id="result" style="color:red"></samp>
      <label for="password">Password<span style="color:red;">*</span>: (8 to 10 character , one special character and one number is required) </label>
      <input type="password" name="password" id="password" pattern="^(?=.*\d+)(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%]{8,10}$" class="text ui-widget-content ui-corner-all" required />
      <label for="confirmPassword">Confirm Password<span style="color:red;">*</span>:</label>
      <input type="password" name="confirmPassword" id="confirmPassword" pattern="^(?=.*\d+)(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%]{8,10}$" class="text ui-widget-content ui-corner-all" required />
<br /><br />
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
</form>  
