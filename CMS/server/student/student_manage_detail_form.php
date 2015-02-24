<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/student_class.php';
$a= Student::getAllstudent("BCA");
$b= Student::getAllstudent("Msc.ST");

echo "<table><tr><th>ID</th><th>Name</th><th>batch</th><th>Programme</th><th colspan='2'>Manage Detail</th></tr>";
if($a!=0){
foreach ($a as $arr) {
    echo "<tr><td>$arr->student_id</td><td>$arr->student_first_name $arr->student_last_name</td><td>$arr->student_batch</td><td>$arr->student_programme</td>
        <td><a href='student_update_detail.php?id=$arr->student_id'>update</a></td><td><a id='delete' href='server/student/student_delete_detail.php?id=$arr->student_id'>delete</a></td></tr>";
} 
}
if($b!=0){
foreach ($b as $arr) {
    echo "<tr><td>$arr->student_id</td><td>$arr->student_first_name $arr->student_last_name</td><td>$arr->student_batch</td><td>$arr->student_programme</td>
        <td><a href='student_update_detail.php?id=$arr->student_id'>update</a></td><td><a id='delete' href='server/student/student_delete_detail.php?id=$arr->student_id'>delete</a></td></tr>";
}  
}
?>