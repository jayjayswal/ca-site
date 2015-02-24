<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/user_class.php';

?>
<form method="post" id="addform" name="addform" action="server/users/user_changepass_server.php"> 
          <label for="opassword">Old Password<span style="color:red;">*</span>: (8 to 10 character , one special character and one number is required) </label>
      <input type="password" name="opassword" id="opassword" pattern="^(?=.*\d+)(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%]{8,10}$" class="text ui-widget-content ui-corner-all" required />

      <label for="password">Password<span style="color:red;">*</span>: (8 to 10 character , one special character and one number is required) </label>
      <input type="password" name="password" id="password" pattern="^(?=.*\d+)(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%]{8,10}$" class="text ui-widget-content ui-corner-all" required />
	  
      <label for="confirmPassword">Confirm Password<span style="color:red;">*</span>:</label>
      <input type="password" name="confirmPassword" id="confirmPassword" pattern="^(?=.*\d+)(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%]{8,10}$" class="text ui-widget-content ui-corner-all" required />
    <br />
      <button type="submit">Submit</button>
</form>  

