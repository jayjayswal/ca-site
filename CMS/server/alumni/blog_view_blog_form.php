<?php
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/alumni_blog.php';
define('INCLUDE_CHECK', true);
if(!isset($_GET['id']))
{
    die("go to blog management page");
}
$id=$_GET['id'];


$de= Alumni_Blog::getBlogObject($id);
if($de===0){
    die("invalid blog");
}
?>
         <label for="queryID">Blog ID<span style="color:red;">*</span>:</label>
     <input type="text" value="<?php echo $de->blog_id ?>" id="queryID" class="text ui-widget-content ui-corner-all" name="queryID" required readonly="true" />
    <label for="time">User Name<span style="color:red;">*</span>:</label>
     <input type="text" value="<?php echo $de->alumni_uname; ?>" id="time" class="text ui-widget-content ui-corner-all" name="time" required readonly="true" />
      <label for="name">subject<span style="color:red;">*</span>:</label>
      <input type="text" name="name" value="<?php echo $de->alumni_blog_subject; ?>" readonly="true" class="text ui-widget-content ui-corner-all" id="name" required maxlength="25" />		
      <label for="email">status<span style="color:red;">*</span>:</label>
      <input type="email" name="email" readonly="true" value="
          <?php if($de->alumni_blog_status==0){echo 'Not Approved';}else{ echo 'Approved';} ?>
             " class="text ui-widget-content ui-corner-all" id="email" required />	
       <label for="query">Blog<span style="color:red;">*</span>:</label>
       <textarea class="text ui-widget-content ui-corner-all" readonly="true" name="query" id="query" rows="4" cols="50" required><?php echo $de->alumni_blog_detail; ?></textarea>


<br /><br /><br />
