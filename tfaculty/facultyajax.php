<!--faculty list-->
<?php
if(isset($_POST['page'])){
$page=$_POST['page'];
}
else{
   header('Location: index.php');
}
if(trim($page)=="list"){
?>
<div class="cellbackground" id="facultyinfo">
    <?php
        require_once '../CMS/db/faculty_designation_class.php';
        require_once '../CMS/db/faculty_detail_class.php';
        $desc=  faculty_designation_class::getAlldesig();
        if($desc!=0){
        foreach ($desc as $de)
        {
            echo "<h3>$de->faculty_designation_name</h3>
                   <hr /> 
                  <div id='facultylistTable'>";
            $count=0;
            $faculties=  faculty_detail_class::getAllFacultydescvise($de->faculty_designation_id);
            foreach ($faculties as $faculty)
            {
                $count++;
                if($count==1){
                    echo ' <div id="facultylistRow" class="section group" >';
                }
                echo " <div id='facultyCell' class='col span_1_of_3'>
                    <div id='facultyone'>                                              
                        <a href='$faculty->faculty_linkedin_id' target='_blank'>
                            <img src='../images/li.png' class='li-image' border='0'>
                        </a>
                          <h2>$faculty->faculty_prefix $faculty->faculty_name</h2>
                        <hr />";
                        if($faculty->faculty_image_url==NULL || $faculty->faculty_image_url=="")
                        {
                            echo "<img id='facultyimage' src='../CMS/facultyImages/facultyplaceholder.jpg'  class='imageborder'/>";
                        }
                        else
                        {
                            echo "<img id='facultyimage' src='../CMS/$faculty->faculty_image_url'  class='imageborder'/>";
                        }
                       echo" <h1>$de->faculty_designation_name</h1>
                        <p>$faculty->faculty_email</p>
                         <div id='viewprofile'>
                            <a class='Button' href='facultyprofile.php?id=$faculty->faculty_id' ><span>View Profile</span></a>
                        </div>

                    </div>
                </div>";
                if($count==3)
                {
                    echo "</div>";
                    $count=0;
                }
                
            }
            echo "</div><br /><br />";
        }
        }
        else{
            echo "No Faculty data available yet.";
        }
        
    ?>
    
</div>

<?php }?>




