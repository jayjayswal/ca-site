<?php
if(isset($_POST['page'])){
$page=$_POST['page'];
}
else{
   header('Location: index.php');
}
if(trim($page)=="casa"){
?>
<div id="nwdeptDetailRow" class="section group" > 
    <div id="nwdeptDetailCell" class="col span_4_of_4">

        <?php 
                   require_once '../CMS/db/news_event_class.php';
                   $nw=  news_event_class::getAllNewsEvents("CASA");
                   if($nw!=0){
                   foreach($nw as $a)
                   {
                       echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='$a->news_event_url' target='_blank'>$a->news_event_date - $a->news_event_desc</a> <br /><br />";
                   }
                   }
                   else{
                       echo "No News available yet.";
                   }
        ?>

   </div>
</div>
<?php }?>