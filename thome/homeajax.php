<?php
if(isset($_POST['page'])){
$page=$_POST['page'];
}
else{
   header('Location: index.php');
}
if(trim($page)=="deptdetail"){
?>
<div id="deptDetailRow" class="section group" > 
    <div class="Homecellbackground" id="deptDetailCell" class="col span_4_of_4">
          <h3>Department of Computer Applications</h3>
           <hr />
           <?php
                require_once '../CMS/db/dept_detail_class.php';
                $deptdetail= dept_detail::getdetail();
                echo $deptdetail->detail;
           ?>
   </div>
</div>
<?php 
}
if(trim($page)=="nw"){
?>
<!-- news event detail -->
<div id="nwdeptDetailRow" class="section group" > 
    <div class="Homecellbackground" id="nwdeptDetailCell" class="col span_4_of_4">

       <h3>News & Events</h3>
       <hr />
        <?php 
                   require_once '../CMS/db/news_event_class.php';
                   $nw=  news_event_class::getAllTopNewsEvents("CA");
                   if($nw!=0){
                   foreach($nw as $a)
                   {
                       echo "<a href='$a->news_event_url' target='_blank'>$a->news_event_date - $a->news_event_desc</a> <br /><br />";
                   }
                   }
                   else{
                       echo "No News available yet.";
                   }
        ?>

   </div>
</div>


<?php 

}
if(trim($page)=="allnw"){
?>


<div id="nwdeptDetailRow" class="section group" > 
    <div id="nwdeptDetailCell" class="col span_4_of_4">

        <?php 
                   require_once '../CMS/db/news_event_class.php';
                   $nw=  news_event_class::getAllNewsEvents("CA");
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

<?php 
}
?>