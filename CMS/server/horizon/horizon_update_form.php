<?php
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/horizon_issueclass.php';
define('INCLUDE_CHECK', true);
if(isset($_GET['id']))
{
    $ti=$_GET['id'];
}
 else {
   die("First Go to horizon managemant page");

}


$b= Horizon_IssueClass::getHorizonIssueObject($ti);
if($b===0){
    die("inalid horizon issue");
}
?>
<form method="post" id="updateform" enctype="multipart/form-data" action="server/horizon/horizon_update_server.php"> 
     
           <label for="id">Horizon ID<span style="color:red;">*</span>:</label>
           <input type="text" value="<?php echo $b->horizon_id?>" name="id" class="text ui-widget-content ui-corner-all" id="id" required readonly="true" />
   
       <label for="version">Horizon Version<span style="color:red;">*</span>:</label>
       <input type="text" readonly="true" name="version" value="<?php echo $b->horizon_version?>" class="text ui-widget-content ui-corner-all" id="version" required maxlength="40" />
      
            <label for="date">Date<span style="color:red;">*</span>: </label>
            <input type="date" value="<?php echo $b->horizon_date?>" name="date" id="date" class="text ui-widget-content ui-corner-all" required />
	  
      <label for="url">PDF File URL:</label>
      <input type="url" name="url" value="<?php echo $b->horizon_pdf_url?>" class="text ui-widget-content ui-corner-all" id="url" required />

	  <br />	  
       <label for="file">Horizon Image:</label>
       <input type="file" accept="image/*" name="file" id="file" class="text ui-widget-content ui-corner-all" /> 
	  
	  <br />
    <button type="submit">Submit</button>
</form>  
