<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/slider_categor_class.php';
$a= Slider_CategoryClass::getAllCategories();

if($a===0)
{
    die("No Categgories inserted Yet.");
}
else
{
echo "<table><tr><th>id</th><th>Name</th><th>Color</th><th colspan='1'>Manage Detail</th></tr>";

foreach ($a as $arr) {
    echo "<tr><td>$arr->category_id</td><td>$arr->category_name</td><td>$arr->category_color</td>
        <td><a id='delete' href='server/gallery/category_delete_detail.php?id=$arr->category_id'>delete</a></td></tr>";
} 
}


?>