<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/user_class.php';
if (!isset($_SESSION)) {
    session_start();
}
$user = $_SESSION['user'];
?>
<form method="post" id="addNE" action="server/news-event/news_add_server.php" >

      <label for="newsEventsDate">Date<span style="color:red;">*</span>: </label>
      <input type="date" name="newsEventsDate" id="newsEventsDate" class="text ui-widget-content ui-corner-all" required />

      <label for="newsEventsDesc">Description<span style="color:red;">*</span>: </label>
      <input type="text" name="newsEventsDesc" class="text ui-widget-content ui-corner-all" id="newsEventsDesc" minlength="0" maxlength="25" required />

      <label for="newsEventsUrl">URL : </label>
      <input type="url" name="newsEventsUrl" id="newsEventsUrl" class="text ui-widget-content ui-corner-all"  />
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
    <button type="reset">Reset</button>
  </form>

