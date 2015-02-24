<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/alumni_detail.php';
$a= Alumni_Detail::getAllAlumni(0);
$b=  Alumni_Detail::getAllAlumni(1);


if($a===0 && $b===0)
{
    die("No Alumni are Added Yet");
}
echo "<table><tr><th>User Name</th><th>first Name</th><th>last Name</th><th>batch</th><th colspan='3'>Manage Detail</th></tr>";

if($a!=0){
foreach ($a as $arr) {
    echo "<tr><td>$arr->alumni_uname</td><td>$arr->alumni_first_name</td><td>$arr->alumni_last_name</td><td>$arr->alumni_batch</td><td><a href='alumni_user_view.php?id=$arr->alumni_uname'>View alumni</a></td><td><a id='delete' href='server/alumni/alumni_delete_detail.php?id=$arr->alumni_uname'>Delete Alumni</a></td><td><a href='server/alumni/alumni_approve_detail.php?id=$arr->alumni_uname'>Approve alumni</a></td>";
}
}
if($b!=0){
foreach ($b as $arr) {
    echo "<tr><td>$arr->alumni_uname</td><td>$arr->alumni_first_name</td><td>$arr->alumni_last_name</td><td>$arr->alumni_batch</td><td><a href='alumni_user_view.php?id=$arr->alumni_uname'>View alumni</a></td><td><a id='delete' href='server/alumni/alumni_delete_detail.php?id=$arr->alumni_uname'>Delete Alumni</a></td>";
}

}
echo "</table>";

?>