<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
?><form method="post" id="addform" action="query_add_server.php"> 
      <label for="name">Name<span style="color:red;">*</span>:</label>
      <input type="text" name="name" class="text ui-widget-content ui-corner-all" id="name" required maxlength="25" />		
      <label for="email">Email<span style="color:red;">*</span>:</label>
      <input type="email" name="email" class="text ui-widget-content ui-corner-all" id="email" required />	
       <label for="query">Query<span style="color:red;">*</span>:</label>
       <textarea class="text ui-widget-content ui-corner-all" name="query" id="query" ows="4" cols="50" required></textarea>
      <br /><br />
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
</form>  
