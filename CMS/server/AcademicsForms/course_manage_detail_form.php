<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/CourseClass.php';
$a= course::getAllCoursecat("BCA");
$b=  course::getAllCoursecat("Msc.ST");

echo "<table><tr><th>ID</th><th>Name</th><th>Programme</th><th colspan='2'>Manage Detail</th></tr>";
if($a!=0){
foreach ($a as $arr) {
    echo "<tr><td>$arr->course_id</td><td>$arr->course_name</td><td>$arr->course_programme</td>
        <td><a href='course_update_detail.php?id=$arr->course_id'>update</a></td><td><a id='delete' href='server/AcademicsForms/course_delete_detail.php?id=$arr->course_id'>delete</a></td></tr>";
} 
}
if($b!=0){
foreach ($b as $arr) {
    echo "<tr><td>$arr->course_id</td><td>$arr->course_name</td><td>$arr->course_programme</td>
        <td><a href='course_update_detail.php?id=$arr->course_id'>update</a></td><td><a id='delete' href='server/AcademicsForms/course_delete_detail.php?id=$arr->course_id'>delete</a></td></tr>";
}  
}
?>