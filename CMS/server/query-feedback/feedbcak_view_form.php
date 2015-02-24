<?php
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/feedback_detail.php';
define('INCLUDE_CHECK', true);
if(!isset($_GET['id']))
{
    die("go to feedback management page");
}
$id=$_GET['id'];


$de= Feedback_Detail::getFeedbackObject($id);

?>
         <label for="queryID">Feedback ID<span style="color:red;">*</span>:</label>
     <input type="text" value="<?php echo $de->feedback_id; ?>" id="queryID" class="text ui-widget-content ui-corner-all" name="queryID" required readonly="true" />
    <label for="time">Time/Date<span style="color:red;">*</span>:</label>
     <input type="text" value="<?php echo $de->feedback_date; ?>" id="time" class="text ui-widget-content ui-corner-all" name="time" required readonly="true" />
      <label for="name">Name<span style="color:red;">*</span>:</label>
      <input type="text" name="name" value="<?php echo $de->feedback_person_name; ?>" readonly="true" class="text ui-widget-content ui-corner-all" id="name" required maxlength="25" />		
      <label for="email">Email<span style="color:red;">*</span>:</label>
      <input type="email" name="email" readonly="true" value="<?php echo $de->feedback_person_email; ?>" class="text ui-widget-content ui-corner-all" id="email" required />	
       <label for="query">Feedback<span style="color:red;">*</span>:</label>
       <textarea class="text ui-widget-content ui-corner-all" readonly="true" name="query" id="query" rows="4" cols="50" required><?php echo $de->feedback_detail ?></textarea>



