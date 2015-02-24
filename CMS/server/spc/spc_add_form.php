<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
?>
<form method="post" id="addform" enctype="multipart/form-data" action="server/spc/spc_add_server.php"> 
      <label for="prefix">Prefix<span style="color:red;">*</span>:</label>
      <select name="prefix" id="prefix" class="text ui-widget-content ui-corner-all" required="true">    

        <option value="Mr.">Mr.</option>
        <option value="Ms.">Ms.</option>									
        <option value="Mrs.">Mrs.</option>
        <option value="Prof.">Prof.</option>
        <option value="Dr.">Dr.</option>
    </select>
      
	  <br /> <br />
	  
      <label for="name">Name<span style="color:red;">*</span>:</label>
      <input type="text" name="name" class="text ui-widget-content ui-corner-all" id="name" required maxlength="40" />

        <label for="phno">Phone no<span style="color:red;">*</span>:</label>
        <input type="number" name="phno" id="credit" class="text ui-widget-content ui-corner-all" required />
      
     <label for="year">Year<span style="color:red;">*</span>:</label>
<!--    <input type="text" name="semester" class="text ui-widget-content ui-corner-all" id="semester" required />-->
     <input type="text" placeholder="Ex. M.Sc. S.T. '13" name="year" id="year" class="text ui-widget-content ui-corner-all" min="1" max="6" required />
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
</form>  