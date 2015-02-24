<?php
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/query_detail_class.php';
define('INCLUDE_CHECK', true);
if(!isset($_GET['id']))
{
    die("go to Query management page");
}
$id=$_GET['id'];


$de= query_detail_class::getQueryObject($id);
if($de->query_status=="1")
{
    die("Reply alredy sent");
}
?>
<form method="post" id="updateform" action="server/query-feedback/query_reply_server.php"> 
         <label for="queryID">Query ID<span style="color:red;">*</span>:</label>
     <input type="text" value="<?php echo $de->query_id; ?>" id="queryID" class="text ui-widget-content ui-corner-all" name="queryID" required readonly="true" />
    <label for="time">Time/Date<span style="color:red;">*</span>:</label>
     <input type="text" value="<?php echo $de->query_date; ?>" id="time" class="text ui-widget-content ui-corner-all" name="time" required readonly="true" />
      <label for="name">Name<span style="color:red;">*</span>:</label>
      <input type="text" name="name" value="<?php echo $de->query_name; ?>" readonly="true" class="text ui-widget-content ui-corner-all" id="name" required maxlength="25" />		
      <label for="email">Email<span style="color:red;">*</span>:</label>
      <input type="email" name="email" readonly="true" value="<?php echo $de->query_email; ?>" class="text ui-widget-content ui-corner-all" id="email" required />	
       <label for="query">Query<span style="color:red;">*</span>:</label>
       <textarea class="text ui-widget-content ui-corner-all" readonly="true" name="query" id="query" rows="4" cols="50" required><?php echo $de->query_detail ?></textarea>
              <label for="reply">Reply<span style="color:red;">*</span>:</label>
       <textarea class="text ui-widget-content ui-corner-all" name="reply" id="reply" rows="4" cols="50" required></textarea>
   <br /><br />
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
</form>
