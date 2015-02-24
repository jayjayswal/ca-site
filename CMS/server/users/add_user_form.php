<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/user_class.php';
$a=  user_class::getRoles();
if($a===0){
    die("There is no roles in database, insert role first");
}
?>
<form method="post" id="addform" name="addform" action="server/users/add_user_server.php"> 

      <label for="userName">Username<span style="color:red;">*</span>:</label>
      <input type="text" id="userName" name="userName" class="text ui-widget-content ui-corner-all"  required maxlength="10" /><button id="check" onclick="checkuname()" type="button">check availability</button><samp id="result" style="color:red"></samp>
	  
      <label for="password">Password<span style="color:red;">*</span>: (8 to 10 character , one special character and one number is required) </label>
      <input type="password" name="password" id="password" pattern="^(?=.*\d+)(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%]{8,10}$" class="text ui-widget-content ui-corner-all" required />
	  
      <label for="confirmPassword">Confirm Password<span style="color:red;">*</span>:</label>
      <input type="password" name="confirmPassword" id="confirmPassword" pattern="^(?=.*\d+)(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%]{8,10}$" class="text ui-widget-content ui-corner-all" required />
      <label for="roleId">Role ID<span style="color:red;">*</span>:</label>
      <select name="roles" id="roles" name="roles" class="text ui-widget-content ui-corner-all" required="true">    
       <?php foreach($a as $x=>$x_value)
        {
           echo '<option value="'.$x.'">'.$x_value.'</option>';
        }?>
    </select><br />
      <button type="submit">Submit</button>
      <button type="reset">Reset</button>
</form>  

