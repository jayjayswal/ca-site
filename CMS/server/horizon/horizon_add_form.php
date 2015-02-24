
<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/horizon_issueclass.php';
?>
<form method="post" id="addform" enctype="multipart/form-data" action="server/horizon/horizon_add_server.php"> 
	  
      <label for="version">Horizon Version<span style="color:red;">*</span>:</label>
      <input type="text" name="version" class="text ui-widget-content ui-corner-all" id="version" required maxlength="40" />
      
            <label for="date">Date<span style="color:red;">*</span>: </label>
      <input type="date" name="date" id="date" class="text ui-widget-content ui-corner-all" required />
	  
      <label for="url">PDF File URL<span style="color:red;">*</span>:</label>
      <input type="url" name="url" class="text ui-widget-content ui-corner-all" id="url" required="true" />

	  <br />	  
       <label for="file">Horizon Image<span style="color:red;">*</span>:</label>
       <input type="file" name="file" id="file" accept="image/*" required="true" class="text ui-widget-content ui-corner-all" /> 
	  
	  <br />
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
</form>  
