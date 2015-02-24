<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/news_event_class.php';
require_once 'db/user_class.php';
if (!isset($_SESSION)) {
    session_start();
}
$user = $_SESSION['user'];

echo "<table><tr><th>ID</th><th>Date</th><th>Description</th><th>URL</th><th>Type</th><th colspan='2'>Manage Detail</th></tr>";
if($user->role_id==1 || $user->role_id==2){
$a= news_event_class::getAllNewsEvents("CA");

if($a!=0){
foreach ($a as $arr) {
    echo "<tr><td>$arr->news_event_id</td><td>$arr->news_event_date</td><td>$arr->news_event_desc</td><td>$arr->news_event_url</td><td>$arr->news_event_type</td>
        <td><a href='news-event_update_detail.php?id=$arr->news_event_id'>update</a></td><td><a id='delete' href='server/news-event/news_delete_detail.php?id=$arr->news_event_id'>delete</a></td></tr>";
} 
}
}
$b= news_event_class::getAllNewsEvents("CASA");


if($b!=0){
foreach ($b as $arr) {
    echo "<tr><td>$arr->news_event_id</td><td>$arr->news_event_date</td><td>$arr->news_event_desc</td><td>$arr->news_event_url</td><td>$arr->news_event_type</td>
        <td><a href='news-event_update_detail.php?id=$arr->news_event_id'>update</a></td><td><a id='delete' href='server/news-event/news_delete_detail.php?id=$arr->news_event_id'>delete</a></td></tr>";
   }  
}
echo "</table>";
?>