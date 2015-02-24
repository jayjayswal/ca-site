<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
if(isset($_GET['id']))
{
    $ti=$_GET['id'];
}
 else {
   die("First Go to slider photo managemant page");

}

require_once 'db/slider_categor_class.php';
require_once 'db/slider_photoClass.php';
$a=  Slider_CategoryClass::getAllCategories();
$ob=  Slider_PhotoClass::getImagesObject($ti)
?>
<form method="post" id="updateform" enctype="multipart/form-data"  action="server/gallery/slider_photo_update_server.php">     
     
    <label for="photoId" style="display: none;">Photo ID<span style="color:red;">*</span>: </label>
    <input readonly="true" style="display: none;" id="photoId" value="<?php echo $ob->photo_id;?>" class="text ui-widget-content ui-corner-all" name="photoId" minlength="0" maxlength="15"  required />
       <br />
             <label for="Category">Category<span style="color:red;">*</span>:</label>
      <select name="Category" id="Category" class="text ui-widget-content ui-corner-all" required="true">    
        <?php 
        foreach ($a as $b) {
            echo "<option value='$b->category_id' ";
                    if($b->category_id==$ob->category_id){echo 'selected';}
                    echo " >$b->category_name</option>";
        }
        ?>
    </select><br />
              <label for="caption">Caption<span style="color:red;">*</span>: </label>
     <textarea name="caption" id="caption" class="text ui-widget-content ui-corner-all" maxlength="100" required ><?php echo $ob->caption;?></textarea>
              
 
	  <br /> <br />
    <button type="submit">Submit</button>
</form>  
