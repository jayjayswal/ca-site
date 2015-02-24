<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
if(!isset($_GET['id']))
{
    die("go to faculty management page");
}
$id=$_GET['id'];
require_once 'db/faculty_experience_class.php';
$a= faculty_experience_class::getAllExperienceOfFaculty($id);


echo "<table><tr><th>exp_id</th><th>Faculty ID</th><th>Institute/Company Name</th><th>Years</th><th>designation</th><th colspan='2'>Manage Detail</th></tr>";
if($a!=0){
foreach ($a as $arr) {
    echo "<tr><td>$arr->experience_id</td><td>$arr->faculty_id</td><td>$arr->faculty_institute</td><td>$arr->faculty_no_of_year</td><td>$arr->faculty_designation</td>
        <td><a href='faculty_experience_update_detail.php?id=$arr->experience_id'>update</a></td>
            <td><a id='delete' href='server/faculty-detail/faculty_experience_delete_detail.php?id=$arr->experience_id&faculty=$arr->faculty_id'>delete</a></td></tr>";
} 
}

?>