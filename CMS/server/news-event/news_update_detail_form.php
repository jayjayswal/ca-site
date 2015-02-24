<?php
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/news_event_class.php';
if(!isset($_GET['id']))
{
    die("go to news event management page");
}
$id=$_GET['id'];


$dd= news_event_class::getNewsEventsObject($id);
if($dd===0){
    die("news not exsist");
}
require_once 'db/user_class.php';
if (!isset($_SESSION)) {
    session_start();
}
$user = $_SESSION['user'];
if($user->role_id==5){
    if($dd->news_event_type!="CASA"){
        header("location: access_denied.php?data=You can't update this news.");
    }
}
?>
<script src="textEditor/ckeditor.js"></script>

<form method="post" id="updateNE" action="server/news-event/news_update_detail.php" >

          <label for="newsEventsId">ID<span style="color:red;">*</span>: </label>
          <input type="number" id="newsEventsId" value="<?php echo $dd->news_event_id ?>" class="text ui-widget-content ui-corner-all" name="newsEventsId"  maxlength="20" readonly="true" required />
     
          <label for="newsEventsDate">Date<span style="color:red;">*</span>: </label>
      <input type="date" name="newsEventsDate" value="<?php echo $dd->news_event_date ?>" id="newsEventsDate" class="text ui-widget-content ui-corner-all" required />

      <label for="newsEventsDesc">Description<span style="color:red;">*</span>: </label>
      <input type="text" name="newsEventsDesc" value="<?php echo $dd->news_event_desc?>" class="text ui-widget-content ui-corner-all" id="newsEventsDesc" maxlength="200" required />

      <label for="newsEventsUrl">URL : </label>
      <input type="url" name="newsEventsUrl" value="<?php echo $dd->news_event_url ?>" id="newsEventsUrl" class="text ui-widget-content ui-corner-all"  />
<br />
<?php if($user->role_id==5)
{
    echo '<input type="text" name="type" id="type" value="CASA" style="display:none;" class="text ui-widget-content ui-corner-all"  />';
}
 else {
    echo '<label for="type">Type:</label>
            <div id="radio" >
                <input type="radio" id="radio1" name="type" value="CA" checked /><label for="radio1">CA</label>
            <input type="radio" id="radio2" name="type" value="CASA" /><label for="radio2">CASA</label>
          </div>';
}
    ?><br /><br />
    <button type="submit">Submit</button>
  </form>  