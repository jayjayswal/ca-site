<?php
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/faculty_designation_class.php';
define('INCLUDE_CHECK', true);
if(isset($_GET['id']))
{
    $ti=$_GET['id'];
}
 else {
   die("First Go to faculty managemant page");

}


$de=  faculty_designation_class::getDesigObject($ti);
if($de===0){
    die("invalid faculty designation");
}
?>
<form method="post" id="updateform" action="server/faculty-detail/faculty_designation_update_server.php"> 
     <label for="designation_id">Designation ID<span style="color:red;">*</span>:</label>
     <input type="text" readonly="true" id="designation_id" value="<?php echo $de->faculty_designation_id ?>" class="text ui-widget-content ui-corner-all" name="designation_id" required maxlength="5" />
      <label for="designation_name">Designation Name<span style="color:red;">*</span>:</label>
      <input type="text" name="designation_name" value="<?php echo $de->faculty_designation_name?>" class="text ui-widget-content ui-corner-all" id="designation_name" required maxlength="25" />		
          <label for="level">Level<span style="color:red;">*</span>:</label>
          <input type="number" name="level" id="level" value="<?php echo $de->faculty_designation_level ?>" class="text ui-widget-content ui-corner-all" min="1" max="6" required />
  <br /><br />
    <button type="submit">Submit</button>
</form>
