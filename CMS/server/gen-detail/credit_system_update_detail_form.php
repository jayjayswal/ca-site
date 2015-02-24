<?php
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/credit_system_detaill_class.php';
if(!isset($_GET['title']) || !isset($_GET['pro']) )
{
    die("go to admission management page");
}
$ti=$_GET['title'];
$pro=$_GET['pro'];

$dd= credit_system::getDetailObject($ti, $pro);
if($dd===0){
    die("invalid crouse detail");
}

?>
<script src="textEditor/ckeditor.js"></script>
<form method="post" id="updateDetail" action="server/gen-detail/credit_system_update_detail.php" > <!-- for file upload--> 

      <label for="Title">Title<span style="color:red;">*</span>:</label>      
      <input  type="text" readonly id="title" value="<?php echo $dd->detail_title ?>"class="text ui-widget-content ui-corner-all" name="title" required maxlength="200" />
     <br />
     <label for="programme" >Programme<span style="color:red;">*</span>:</label>
     <input type="text" readonly id="programme" class="text ui-widget-content ui-corner-all" value="<?php echo $dd->course_programme ?>" name="programme"  required maxlength="200" /><br />       

      <textarea  id="editor1" name="editor1" style="width:50px;">
        <?php echo $dd->detail_desc ?>
        </textarea>
        <script>
                CKEDITOR.replace( 'editor1' );
        </script><br />
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
</form>  