<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
?>
<script src="textEditor/ckeditor.js"></script>
<form method="post" id="updateDetail" action="server/gen-detail/credit_system_add_detail.php" > <!-- for file upload--> 

      <label for="Title">Title<span style="color:red;">*</span>:</label>      
     <input type="text" id="title" class="text ui-widget-content ui-corner-all" name="title" required maxlength="200" />
     <br />
     <label for="programme">Programme:</label>
            <div id="radio" >
                <input type="radio" id="radio1" name="programme" value="BCA" checked /><label for="radio1">BCA</label>
            <input type="radio" id="radio2" name="programme" value="Msc.ST" /><label for="radio2">Msc.ST</label>
          </div><br />       

      <textarea  id="editor1" name="editor1" style="width:50px;">
        </textarea>
        <script>
                CKEDITOR.replace( 'editor1' );
        </script><br />
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
</form>  