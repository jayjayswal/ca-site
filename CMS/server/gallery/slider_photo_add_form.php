<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/slider_categor_class.php';
$a=  Slider_CategoryClass::getAllCategories();
?>
<form method="post" id="addform" enctype="multipart/form-data"  action="server/gallery/slider_photo_add_server.php">     
    
           <label for="file">Image<span style="color:red;">*</span>:</label>
           <input type="file" name="file" accept=".jpg" id="file" class="text ui-widget-content ui-corner-all" required="true" /> 

       <br />
             <label for="Category">Category<span style="color:red;">*</span>:</label>
      <select name="Category" id="Category" class="text ui-widget-content ui-corner-all" required="true">    
        <?php 
        foreach ($a as $b) {
            echo "<option value='$b->category_id'>$b->category_name</option>";
        }
        ?>
    </select><br />
              <label for="caption">Caption<span style="color:red;">*</span>: </label>
     <textarea name="caption" id="caption" class="text ui-widget-content ui-corner-all" maxlength="100" required ></textarea>
              
 
	  <br />
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
</form>  
