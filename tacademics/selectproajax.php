<?php
if(isset($_POST['page'])){
$page=$_POST['page'];
}
else{
   header('Location: index.php');
}
if(trim($page)=="sidemenu"){
?>
<!-- side menu -->
<div class="cellbackground" id="sidemenu">
    <h3>Select Programme</h3>
     <hr />
      <dl id="sidemenuaccordian" class="accordion">
        <dt><a class="gray">BCA</a></dt>
        <dd>
            <div>
                <ul class="accordion-menu">
                    <a href="bcacreditsystem.php"><li>BCA Credit System</li></a>
                    <a href="bcacoursecatalog.php"><li>BCA Course Catalog</li></a>
                </ul>
            </div>
        </dd>
        <dt><a class="gray">MscST </a></dt>
        <dd>
            <div>
                <ul class="accordion-menu">
                    <a href="mscstcreditsystem.php"> <li>MscST Credit System</li></a>
                    <a href="mscstcoursecatalog.php"> <li>MscST Course Catalog</li></a>
                </ul>
            </div>
        </dd>
            <span>&nbsp;</span>
    </dl>
</div>
<?php }
if(trim($page)=="proginfo"){
?>
<!-- programme detail -->
<div class="cellbackground" id="programmeDetail">
<h3>Programme Information</h3>
 <hr />

<dl id="infoacordian"  class="accordion">
    <dt><a class="gray">BCA (Bachelor of Computer Application)</a></dt>
    <dd>
        <p>
This is a three-year degree programme leading to the degree Bachelor of Computer Applications. The Programme is aimed at developing the computer professionals with latest skill sets in the wide range of application areas such as business sector, government sectors, scientific research, medical science, social sciences, management, communication etc.</p>
        <p>
            <a class="button" href="bcacreditsystem.php">Read More</a></p>
    </dd>
    <dt><a class="gray">MscST (Masters of Science Software Technology)</a></dt>
    <dd>
        <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
            Ipsum has been the industry's standard dummy text ever since the 1500s, when an
            unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        <p>
            <a class="button" href="mscstcreditsystem.php">Read More</a></p>
    </dd>
    <span>&nbsp;</span>
</dl>
</div>
<?php }
if(trim($page)=="bcacredit"){
?>

<!-- bca credit system --> 
<div class="cellbackground" id="bcacreditDetail">
<h3>BCA Credit System</h3>
 <hr />

<dl id="infoacordian"  class="accordion">
    <?php

        require_once '../CMS/db/credit_system_detaill_class.php';
        $de=  credit_system::getAllDetail("BCA");
        if($de!=0){
            
        
        foreach ($de as $detail)
        {
            echo "<dt><a class='gray'>".$detail->detail_title."</a></dt>";
            echo "<dd>$detail->detail_desc</dd>";
        }
        }
        else{
            echo "no detail updated yet";
        }
    ?>
    
    <span>&nbsp;</span>
</dl>
</div>

<?php }
if(trim($page)=="msccredit"){
?>
<!-- Mscst credit system --> 
<div class="cellbackground" id="mscstcreditDetail">
<h3>MscST Credit System</h3>
 <hr />

<dl id="infoacordian"  class="accordion">
    <?php
        require_once '../CMS/db/credit_system_detaill_class.php';
        $de=  credit_system::getAllDetail("Msc.ST");
        if($de!=0){
        foreach ($de as $detail)
        {
            echo "<dt><a class='gray'>".$detail->detail_title."</a></dt>";
            echo "<dd>$detail->detail_desc</dd>";
        }
        }
        else{
            echo "no detail updated yet";
        }
    ?>

    <span>&nbsp;</span>
</dl>
</div>



<?php }
if(trim($page)=="bcacourse"){
?>
<!-- bca course catalog -->
<div class="cellbackground" id="bcacoursecatalog">
<h3>BCA Course Catalog</h3>
 <hr />

<dl id="infoacordian"  class="accordion">
    <?php
            $roman=array("I","II","III","IV","V","VI");
        require_once '../CMS/db/CourseClass.php';
        
        for($i=1;$i<=6;$i++)
        {
            $co=course::getAllCourse("BCA",$i);
            if($co===0){
                continue;
            }
            echo '<dt><a class="gray">Semester '.$roman[$i-1].'</a></dt>';
            echo '<dd><div><ul class="accordion-menu">';
           foreach ($co as $course)
            {
                   if($course->course_url==NULL || $course->course_url==""){
                       $url="#";
                   }
                   else{
                       $url=$course->course_url;
                   }
               echo "<a href='../CMS/$url' target='_blank' ><li>$course->course_id &nbsp; $course->course_name <span style='float: right;'>Credit: $course->course_credit &nbsp;&nbsp;&nbsp;</span></li></a>";
            } 
            echo '</ul></div></dd>';
        }
        
    ?>
                
    <span >&nbsp;</span>
</dl>
</div>


<?php }
if(trim($page)=="msccourse"){
?>
<!-- mscst course catalog -->
<div class="cellbackground" id="mscstcoursecatalog">
<h3>MscST Course Catalog</h3>
 <hr />

<dl id="infoacordian"  class="accordion">
    <?php
            $roman=array("I","II","III","IV","V","VI");
        require_once '../CMS/db/CourseClass.php';

        for($i=1;$i<=4;$i++)
        {
            $co=course::getAllCourse("Msc.ST",$i);
            if($co===0){
                continue;
            }
            echo '<dt><a class="gray">Semester '.$roman[$i-1].'</a></dt>';
            echo '<dd><div><ul class="accordion-menu">';
           foreach ($co as $course)
            {
                    if($course->course_url==NULL || $course->course_url==""){
                       $url="#";
                   }
                   else{
                       $url=$course->course_url;
                   }
                  
               echo "<a href='../CMS/$url' target='_blank' ><li>$course->course_id &nbsp; $course->course_name <span style='float: right;'>Credit: $course->course_credit &nbsp;&nbsp;&nbsp;</span></li></a>";
            } 
            echo '</ul></div></dd>';
        }
        
    ?>
                
    <span >&nbsp;</span>
</dl>
</div>


<?php }
?>