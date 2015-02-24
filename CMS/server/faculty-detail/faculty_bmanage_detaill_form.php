<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/faculty_detail_class.php';
require_once 'db/faculty_designation_class.php';
$a= faculty_detail_class::getAllFaculty();
$desc=  faculty_designation_class::getAlldesig();
if($a==0)
{
    die("No faculty inserted Yet.");
}
else
{
echo "<table><tr><th>id</th><th>Prifix</th><th>Name</th><th>Designation</th><th colspan='6'>Manage Detail</th></tr>";

foreach ($a as $arr) {
    foreach($desc as $de){
        if($de->faculty_designation_id===$arr->faculty_designation_id){
            $designation=$de->faculty_designation_name;
            break;
        }
    }
    echo "<tr><td>$arr->faculty_id</td><td>$arr->faculty_prefix</td><td>$arr->faculty_name</td><td>".$designation."</td>
        <td><a href='faculty_bupdate_detail.php?id=$arr->faculty_id'>update</a></td>
            <td><a href='faculty_experience_add_detail.php?id=$arr->faculty_id'>Add Experience</a></td><td><a href='faculty_experience_manage_detail.php?id=$arr->faculty_id'>Manage Experience</a></td><td><a href='faculty_qualification_add_detail.php?id=$arr->faculty_id'>Add Qualification</a></td><td><a href='faculty_qualification_manage_detail.php?id=$arr->faculty_id'>Manage Qualification</a></td><td><a id='delete' href='server/faculty-detail/faculty_delete_detail.php?id=$arr->faculty_id'>delete</a></td></tr>";
} 
}


?>