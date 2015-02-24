<?php
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/spc_executive_class.php';
define('INCLUDE_CHECK', true);
if(isset($_GET['id']))
{
    $ti=$_GET['id'];
}
 else {
   die("First Go to spc managemant page");

}


$b= Spc_Executive::getAllSpcExecutiveobject($ti);
if($b===0){
    die("invalid spc executive");
}
?>
<form method="post" id="updateform" enctype="multipart/form-data" action="server/spc/spc_update_server.php"> 
      
       <label for="id">Id<span style="color:red;">*</span>:</label>
       <input type="number" readonly="true" value="<?php echo $b->spc_executive_id ?>" name="id" class="text ui-widget-content ui-corner-all" id="name" required maxlength="40" />

    
    <label for="prefix">Prefix<span style="color:red;">*</span>:</label>
      <select name="prefix" id="prefix" class="text ui-widget-content ui-corner-all" required="true">    

         <option value="Mr." <?php if($b->spc_executive_prefix=="Mr.")echo "selected" ?>>Mr.</option>
        <option value="Ms." <?php if($b->spc_executive_prefix=="Ms.")echo "selected" ?>>Ms.</option>									
        <option value="Mrs." <?php if($b->spc_executive_prefix=="Mrs.")echo "selected" ?>>Mrs.</option>
        <option value="Prof." <?php if($b->spc_executive_prefix=="Prof.")echo "selected" ?>>Prof.</option>
        <option value="Dr." <?php if($b->spc_executive_prefix=="Dr.")echo "selected" ?>>Dr.</option>
    </select>
      
	  <br /> <br />
	  
      <label for="name">Name<span style="color:red;">*</span>:</label>
      <input type="text" name="name" value="<?php echo $b->spc_executive_name ?>"  class="text ui-widget-content ui-corner-all" id="name" required maxlength="40" />

        <label for="phno">Phone no<span style="color:red;">*</span>:</label>
        <input type="number" name="phno" value="<?php echo $b->spc_executive_number ?>"  id="credit" class="text ui-widget-content ui-corner-all" required />
      
     <label for="year">Year<span style="color:red;">*</span>:</label>
<!--    <input type="text" name="semester" class="text ui-widget-content ui-corner-all" id="semester" required />-->
     <input type="text" value="<?php echo $b->spc_executive_year ?>"  placeholder="Ex. M.Sc. S.T. '13" name="year" id="year" class="text ui-widget-content ui-corner-all" min="1" max="6" required />
    <button type="submit">Submit</button>
</form>  