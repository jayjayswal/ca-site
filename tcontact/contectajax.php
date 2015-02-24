<?php
if(isset($_POST['page'])){
$page=$_POST['page'];
}
else{
   header('Location: index.php');
}
if(trim($page)=="cont"){
require_once '../CMS/db/contact_detail_class.php';
$con=  contact_detail::getdetail();

if($con===0){
    die("Contect detail is not available");
}
echo "  <h3>Contact detail</h3><hr />".$con->detail;
}
?>
