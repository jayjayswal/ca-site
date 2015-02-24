<?php
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/query_detail_class.php';
$a= query_detail_class::getAllQuerys(0);
$b= query_detail_class::getAllQuerys(1);


echo "<table><tr><th>ID</th><th>Time Stamp</th><th>Name</th><th>Query</th><th colspan='1'>Manage Detail</th></tr>";
if(sizeof($a)!=0){
foreach ($a as $arr) {
    echo "<tr><td>$arr->query_id</td><td>$arr->query_date</td><td>$arr->query_name</td><td>$arr->query_detail</td><td><a href='query_give_reply.php?id=$arr->query_id'>Give reply</a></td>";
}
}
if(sizeof($b)!=0){
foreach ($b as $arr) {
    echo "<tr><td>$arr->query_id</td><td>$arr->query_date</td><td>$arr->query_name</td><td>$arr->query_detail</td><td><a href='query_view_reply.php?id=$arr->query_id'>View reply</a></td>";
} 

}
echo "</table>";
?>
