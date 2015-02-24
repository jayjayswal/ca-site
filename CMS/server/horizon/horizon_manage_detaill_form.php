
<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/horizon_issueclass.php';
$a=  Horizon_IssueClass::getAllHorizonIssue();
if($a===0)
{
    die("No Issues are Inserted Yet");
}
else
{
echo "<table><tr><th>id</th><th>Horizon Issue</th><th colspan='2'>Manage Detail</th></tr>";

foreach ($a as $arr) {
    echo "<tr><td>$arr->horizon_id</td><td>$arr->horizon_version</td>
        <td><a href='horizon_update_detail.php?id=$arr->horizon_id'>update</a></td>
       <td><a id='delete' href='server/horizon/horizon_delete_issue.php?id=$arr->horizon_id'>delete</a></td></tr>";
} 
}


?>