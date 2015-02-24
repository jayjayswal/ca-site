<?php
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/alumni_detail.php';
define('INCLUDE_CHECK', true);
if(!isset($_GET['id']))
{
    die("go to blog management page");
}
$id=$_GET['id'];


$de= Alumni_Detail::getAlumniObject($id);
if($de=="No Alumni's are Added Yet")
{
    die("No Alumni's are Added Yet");
}
else{
?>
<image src="<?php echo $de->alumni_photo_url ?>" />
<?php if($de->alumni_resume_url!=NULL){ ?>
<a href="<?php echo $de->alumni_resume_url ?>" >view resume</a><?php } ?>
      <label for="userName">Username<span style="color:red;">*</span>:</label>
      <input type="text" readonly="true" id="userName" value="<?php echo $de->alumni_uname ?>" name="userName" class="text ui-widget-content ui-corner-all"  required maxlength="10" />
  
 <label for="fname">First Name<span style="color:red;">*</span>:</label>
 <input type="text" readonly="true" value="<?php echo $de->alumni_first_name ?>" name="fname" class="text ui-widget-content ui-corner-all" id="fname" required maxlength="40" />      

            <label for="lname">Last Name<span style="color:red;">*</span>:</label>
      <input type="text" readonly="true" name="lname" value="<?php echo $de->alumni_last_name ?>" class="text ui-widget-content ui-corner-all" id="lname" required maxlength="40" />    
      
            <label for="email">Email<span style="color:red;">*</span>:</label>
      <input type="email" readonly="true" name="email" value="<?php echo $de->alumni_email ?>" class="text ui-widget-content ui-corner-all" id="email"  pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" required />
   
            <label for="linkedin_id">LinkedIn Id:</label>
      <input type="url" readonly="true" name="linkedin_id" value="<?php echo  $de->alumni_linkedin_id?>" class="text ui-widget-content ui-corner-all" id="linkedin_id" />

             <label for="batch">Batch Year<span style="color:red;">*</span>:</label>
        <input type="text" readonly="true" name="batch" value="<?php echo $de->alumni_batch ?>"  class="text ui-widget-content ui-corner-all" id="batch" required maxlength="9" />    
	
         

    <label for="status">status<span style="color:red;">*</span>:</label>
      <input name="status" readonly="true" value="
          <?php if($de->alumni_status==0){echo 'Not Approved';}else{ echo 'Approved';} ?>
             " class="text ui-widget-content ui-corner-all" id="status" required />	
     
<?php } ?>
<br /><br /><br />
