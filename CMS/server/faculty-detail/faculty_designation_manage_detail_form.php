<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/faculty_designation_class.php';
$a= faculty_designation_class::getAlldesig();


echo "<table><tr><th>ID</th><th>Designation Name</th><th>Level</th><th colspan='2'>Manage Detail</th></tr>";
if($a!=0){
foreach ($a as $arr) {
    echo "<tr><td>$arr->faculty_designation_id</td><td>$arr->faculty_designation_name</td><td>$arr->faculty_designation_level</td>
        <td><a href='faculty_designation_update_detail.php?id=$arr->faculty_designation_id'>update</a></td>
            <td><a id='delete' href='server/faculty-detail/faculty_designation_delete_detail.php?id=$arr->faculty_designation_id'>delete</a></td></tr>";
} 
}

?>