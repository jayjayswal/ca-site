<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
?>
<form method="post" id="addform" action="server/gallery/category_add_server.php">     
<!--     <label for="categoryId">ID : </label>
     <input type="number" id="categoryId" class="text ui-widget-content ui-corner-all" name="categoryId" min="1" max="99" required />-->

      <label for="categoryName">Name<span style="color:red;">*</span>: </label>
      <input type="text" name="categoryName" class="text ui-widget-content ui-corner-all" id="categoryName" minlength="0" maxlength="20" required />

      <label for="categoryColor">Color<span style="color:red;">*</span>: </label>
            <select name="categoryColor" id="faculty_prefix" class="text ui-widget-content ui-corner-all" required="true">    

        <option value="green">green</option>
        <option value="blue">blue</option>									
        <option value="red">red</option>
        <option value="orange">orange</option>
        <option value="yellow">yellow</option>
         <option value="gray">gray</option>
          <option value="purple">purple</option>
           <option value="black">black</option>
    </select>

	  <br />
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
</form>  
