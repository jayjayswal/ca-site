<!--faculty profile-->
<?php 

if(isset($_POST['page'])){
$page=$_POST['page'];
}
else{
   header('Location: index.php');
}
if(trim($page)=="profile"){
if(isset($_POST['id'])){
$id=$_POST['id'];
}
require_once '../CMS/db/faculty_designation_class.php';
require_once '../CMS/db/faculty_detail_class.php';
require_once '../CMS/db/faculty_experience_class.php';
require_once '../CMS/db/faculty_qualification_class.php';

$faculty=  faculty_detail_class::getFacultyObject($id);
if($faculty===0){
    die("No faculty exsist with this id.");
}
$descg= faculty_designation_class::getname($faculty->faculty_designation_id);
$exp=  faculty_experience_class::getAllExperienceOfFaculty($id);
$qua= faculty_qualification_class::getAllQualificationOfFaculty($id);

echo "<div class='cellbackground' id='profile'>
    <a href='$faculty->faculty_linkedin_id' target='_blank'>
                              <img src='../images/li.png' class='li-image' border='0'>
                               </a>
                             <h3>Faculty Profile</h3>                           
                             <hr /> ";


 echo " <div id='facultyone'>";    
  if($faculty->faculty_image_url==NULL || $faculty->faculty_image_url=="")
    {
        echo "<img id='facultyimage' src='../CMS/facultyImages/facultyplaceholder.jpg'  class='imageborder'/>";
    }
    else
    {
        echo "<img id='facultyimage' src='../CMS/$faculty->faculty_image_url'  class='imageborder'/>";
    }
   echo"    <h2>$faculty->faculty_prefix $faculty->faculty_name</h2>
       <h1>$descg</h1>       
       <p>$faculty->faculty_email</p>";
   if($qua!=NULL){
   echo " <div style='clear: both;margin:20px 40px 20px 0px;'>
           <br/><br/>
           <h3>Qualifications</h3>
           <hr />";
   echo "<table><thead>
		<tr>
			<th>Degree Name</th>
			<th>Year of Passing</th>
			<th>Institute Name</th>
		</tr>
		</thead>
                <tbody class='qua'>";
   foreach ($qua as $q){
       echo "<tr>
           <td>$q->faculty_degree</td>
	   <td>$q->faculty_year_of_passing</td>
	   <td>$q->faculty_institute_name</td>
           </tr>";
   }
   echo "</tbody></table></div>";
   
   }
   
   if($exp!=NULL){
   echo " <div style='clear: both;margin:20px 40px 20px 0px;'>
           <br/><br/>
           <h3>Experience</h3>
           <hr />";
   echo "<table><thead>
		<tr>
			<th>Institute/Company Name</th>
			<th>Number of Years</th>
			<th>Designation</th>
		</tr>
		</thead>
                <tbody class='exp'>";
   foreach ($exp as $e){
       echo "<tr>
           <td>$e->faculty_institute</td>
	   <td>$e->faculty_no_of_year</td>
	   <td>$e->faculty_designation</td>
           </tr>";
   }
   echo "</tbody></table></div></div></div>";
   
   }
}
?>