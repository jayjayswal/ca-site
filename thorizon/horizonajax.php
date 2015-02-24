<!--horizon list-->
<?php
if(isset($_POST['page'])){
$page=$_POST['page'];
}
else{
   header('Location: index.php');
}
if(trim($page)=="allhorizon"){
?>
<div class="cellbackground" id="horizonisse">
    <?php 
        require_once '../CMS/db/horizon_issueclass.php';
        $horizon=  Horizon_IssueClass::getAllHorizonIssue();
        
        echo "<h3>Horizon Magazine</h3>
                             <hr />  <div id='horizonlistTable'>";
        if($horizon==0){
            die("No Horizon issue inserted yet");
        }
        $count=0;
        foreach($horizon as $ho)
        {
            $count++;
            if($count==1){
                 echo "<div id='horizonlistRow' class='section group' >";
            }
            echo "<div id='hrizonlistCell' class='col span_1_of_4'>
                     <div id='horizonissue'>
                         <a href='$ho->horizon_pdf_url'> <h3>$ho->horizon_version</h3></a>
                         <hr/>
                         <center> <a href='$ho->horizon_pdf_url'><img src='../CMS/$ho->horizon_photo_url' id='horizonimage'/></a></center>
                     </div>
                 </div>";
            if($count==4)
            {
                echo " </div>";
                $count=0;
            }
            
        }
        echo "</div>";
    ?>
</div>
<?php }?>