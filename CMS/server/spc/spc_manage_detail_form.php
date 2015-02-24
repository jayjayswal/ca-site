<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/spc_executive_class.php';
$a= Spc_Executive::getAllSpcExecutive();

echo "<table><tr><th>ID</th><th>Name</th><th>Year</th><th colspan='2'>Manage Detail</th></tr>";
if($a!=0){
foreach ($a as $arr) {
    echo "<tr><td>$arr->spc_executive_id</td><td>$arr->spc_executive_prefix $arr->spc_executive_name</td><td>$arr->spc_executive_year</td>
        <td><a href='spc_update_detail.php?id=$arr->spc_executive_id'>update</a></td><td><a id='delete' href='server/spc/spc_delete_detail.php?id=$arr->spc_executive_id'>delete</a></td></tr>";
} 
}
  
?>