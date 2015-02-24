<!--MscST student list-->
<?php
if(isset($_POST['page'])){
$page=$_POST['page'];
}
else{
   header('Location: index.php');
}
if(trim($page)=="msc"){
?>
<div class="cellbackground" id="Studentlist">
<h3>MscST Student</h3>
<hr />  
    <div id="studentTable">
    <?php 
        require_once '../CMS/db/student_class.php';
        $stu= Student::getAllstudent("Msc.ST");
        if($stu===0){
            die("No student inserted yet");
        }
        $count=0;
        foreach($stu as $ho)
        {
            $count++;
            if($count==1){
                 echo " <div id='studentRow' class='section group'>";
            }
            echo "<div id='studentCell' class='col span_1_of_3'>
                <div id='student'>
                    <a href='../CMS/$ho->student_resume_url' target='_blank' ><img src='../images/pdf.png' id='studentpfd'></a>
                    <h1>$ho->student_first_name $ho->student_last_name</h1>
                    <p id='semail'>$ho->student_email</p>
                    <p>CGPA:$ho->student_cgpa</p>
                </div>
            </div>";
            if($count==3)
            {
                echo " </div>";
                $count=0;
            }
            
        }

    ?>
    </div>
</div>

<?php }?>