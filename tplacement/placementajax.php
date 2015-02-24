<!-- student placement detail detail -->
<?php
if(isset($_POST['page'])){
$page=$_POST['page'];

}
else{
   header('Location: index.php');
}
if(trim($page)=="pdetail"){
?>
<div class="cellbackground" id="splacementdetail">  
    <h3>Student Placement Cell</h3>

    <hr />
    <p>The Department of Computer Applications, which is a constituent part of one of the highly esteemed and pioneering educational institutions of India - The Maharaja Sayajirao University of Baroda has an independent Student Placement Cell, which is dedicated to furnish the needs of organizations via conducting campus recruitment process.<br />
            Just as millions of pixels make up an image, the "SPC" as we call it - acts as one such critical pixel on the careers of the students that contributes to their picture of success.<br />
            The SPC functions round the year as an adaptor between students and the organizations - adapting students according to the industry requirements and facilitating contacts between them. In addition, highly acclaimed personalities from all over the country are invited to share their field knowledge.<br />
            The SPC body is available to address to student\'s questions and concerns of all kinds i.e from advice on placement procedures, help with applications & resumes to practice for interviews. The objective is to ensure that students have the information and skills necessary to outperform their competition.<br /><br />

            Activities carried out by SPC include but not limited to :<br />
             On-campus recruitments<br />
             Personality development<br />
             Training students for soft skills<br />
             Learning sessions, workshops, etc...<br />
             Inspirational documentary seminars<br /><br />

            SPC Organizing Body 2012-2013:<br /><br />
            SPC Manager :<br />
            Prof. Vipul Kalamkar - +91 989-836-6735<br /><br />
            SPC Executives :<br />
            <?php require_once '../CMS/db/spc_executive_class.php';
                $spc=  Spc_Executive::getAllSpcExecutive();
                if($spc!=0){
                    foreach ($spc as $s){
                        echo "$s->spc_executive_prefix $s->spc_executive_name - +91 $s->spc_executive_number ( $s->spc_executive_year ) <br />";
                    }
                }
            ?>

            <!--SPC Associates :<br />
            1)_______________ (M.Sc. S.T. \'13 ) <br />
            2)_______________ (M.Sc. S.T. \'13 ) <br />
            3)_______________ (M.Sc. S.T. \'13 ) <br />
            4)_______________ (M.Sc. S.T. \'13 ) <br /><br />
            SPC Volunteers :<br />
            1)_______________ (M.Sc. S.T. \'14 ) <br />
            2)_______________ (M.Sc. S.T. \'14 ) <br />
            3)_______________ (M.Sc. S.T. \'14 ) <br />
            4)_______________ (M.Sc. S.T. \'14 ) <br />-->
    </p>
</div>
<?php }
if(trim($page)=="empdetail"){
?>
<!-- For Employers detail -->
 <div class="cellbackground" id="empplacementdetail">  
    <h3>For Employers</h3>
    <hr />
  <p>  With the genesis of a fresh student placement cell & recruitment season for 2013 batch, we extend our cordial welcome to visit our campus for conducting recruitment process.<br /><br />
    </p><center>
            Placement brochure 2012-2013 :<br /><br />
            <a href="http://issuu.com/spc.msubaroda/docs/placement_brochure_2012-2013?mode=window&backgroundColor=%23222222" target="_blank"><img src="images/placement_brochure.jpg" border="0" height="158" width="122" /></a><br />
    </center>
 </div>
<?php }
if(trim($page)=="fdetail"){
?>
<!-- For students detail -->
 <div class="cellbackground" id="fsplacementdetail">  
    <h3>For Students</h3>
    <hr />
   <p> Students can find the placement policy and other documents related to placements such as resume template below :<br /><br />
			<a href="http://issuu.com/ishansheth/docs/s.p.c._placement_policy_2012-2013?mode=window&backgroundColor=%23222222" target="_blank">S.P.C. Placement Policy 2012-2013</a><br /><br />
                        <a href="docs/S.P.C. Student Resume Template 2012-2013.docx" target="_blank">S.P.C. Student Resume Template 2012-2013</a><br /><br /></p>
			
 </div>
<?php }?>