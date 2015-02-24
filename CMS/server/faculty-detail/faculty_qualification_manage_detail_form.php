<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
if(!isset($_GET['id']))
{
    die("go to faculty management page");
}
$id=$_GET['id'];
require_once 'db/faculty_qualification_class.php';
$a= faculty_qualification_class::getAllQualificationOfFaculty($id);


echo "<table><tr><th>Qualification_id</th><th>Faculty ID</th><th>Degree Name</th><th>Institute Name</th><th>passing Year</th><th colspan='2'>Manage Detail</th></tr>";
if($a!=0){
foreach ($a as $arr) {
    echo "<tr><td>$arr->qualification_id</td><td>$arr->faculty_id</td><td>$arr->faculty_degree</td><td>$arr->faculty_institute_name</td><td>$arr->faculty_year_of_passing</td>
        <td><a href='faculty_qualification_update_detail.php?id=$arr->qualification_id'>update</a></td>
            <td><a id='delete' href='server/faculty-detail/faculty_qualification_delete_detail.php?id=$arr->qualification_id&faculty=$arr->faculty_id'>delete</a></td></tr>";
} 
}

?>