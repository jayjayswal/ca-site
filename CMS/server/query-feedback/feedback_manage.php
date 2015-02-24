<?php
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/feedback_detail.php';
$f=  Feedback_Detail::getAllFeedbacks();

if($f===0)
{
    die("No Feedbacks are added Yet");
}
echo "<table><tr><th>ID</th><th>Time Stamp</th><th>Name</th><th>Email</th><th colspan='1'>Manage Detail</th></tr>";
if($f!=0){
foreach ($f as $arr) {
    echo "<tr><td>$arr->feedback_id</td><td>$arr->feedback_date</td><td>$arr->feedback_person_name</td><td>$arr->feedback_person_email</td><td><a href='feedback_view_reply.php?id=$arr->feedback_id'>View feedback</a></td>";
}


}
echo "</table>";
?>
