<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/admission_detail_class.php';
$a=  admission_detail::getAllDetail("BCA");
$b= admission_detail::getAllDetail("Msc.ST");

echo "<table><tr><th>Title</th><th>Programme</th><th colspan='2'>Manage Detail</th></tr>";
if($a!=0){
foreach ($a as $arr) {
    echo "<tr><td>$arr->detail_title</td><td>$arr->course_programme</td><td><a href='admission_update_detail.php?title=$arr->detail_title&pro=$arr->course_programme'>update</a></td><td><a id='delete'  href='server/gen-detail/admission_delete_detail.php?title=$arr->detail_title&pro=$arr->course_programme'>delete</a></td></tr>";
} 
}
if($b!=0){
foreach ($b as $arr) {
    echo "<tr><td>$arr->detail_title</td><td>$arr->course_programme</td><td><a href='admission_update_detail.php?title=$arr->detail_title&pro=$arr->course_programme'>update</a></td><td><a id='delete'  href='server/gen-detail/admission_delete_detail.php?title=$arr->detail_title&pro=$arr->course_programme'>delete</a></td></tr>";
   }  
}
?>