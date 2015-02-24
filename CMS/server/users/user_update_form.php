<?php
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
define('INCLUDE_CHECK', true);
if(isset($_GET['uname']))
{
    $ti=$_GET['uname'];
}
 else {
   die("First Go to user managemant page");

}
require_once 'db/user_class.php';
$a=  user_class::getRoles();
$user=  user_class::getUserObject($ti);
if($a===0){
    die("no role entry in database");
}
if($user===0){
    die("invalid user");
}
?>
<form method="post" id="updateform" enctype="multipart/form-data" action="server/users/user_update_server.php"> 
 
      <label for="userName">Username<span style="color:red;">*</span>:</label>
      <input type="text" value="<?php echo $user->username; ?>" readonly="true" id="userName" name="userName" class="text ui-widget-content ui-corner-all"  required maxlength="10" />
	  
      <label for="password">Password<span style="color:red;">*</span>: (8 to 10 character , one special character and one number is required) </label>
      <input type="password" name="password" id="password" pattern="^(?=.*\d+)(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%]{8,10}$" class="text ui-widget-content ui-corner-all" required />
	  
      <label for="confirmPassword">Confirm Password<span style="color:red;">*</span>:</label>
      <input type="password" name="confirmPassword" id="confirmPassword" pattern="^(?=.*\d+)(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%]{8,10}$" class="text ui-widget-content ui-corner-all" required />
	  
      <label for="roleId">Role ID<span style="color:red;">*</span>:</label>
      <select name="roles" id="roles" name="roles" class="text ui-widget-content ui-corner-all" required="true">    
       <?php foreach($a as $x=>$x_value)
        {
           echo '<option value="'.$x.'" ';if($x==$user->role_id) echo " selected"; echo '>'.$x_value.'</option>';
        }?>
    </select><br />
      <button type="submit">Submit</button>
</form>  
