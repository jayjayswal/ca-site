<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/user_class.php';
$a= user_class::getAllUsers();
$ro=  user_class::getRoles();

if($a===0)
{
    die("No Users inserted Yet.");
}
else
{
echo "<table><tr><th>Username</th><th>role</th><th colspan='2'>Manage Detail</th></tr>";

foreach ($a as $arr) {
    echo "<tr><td>$arr->username</td><td>".$ro[$arr->role_id]."</td><td><a href='user_update_detail.php?uname=$arr->username'>update</a></td><td><a id='delete' href='server/users/user_delete_detail.php?uname=$arr->username'>delete</a></td></tr>";
} 
}


?>