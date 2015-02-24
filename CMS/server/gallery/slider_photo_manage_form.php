<?php
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
       require_once '../../db/slider_categor_class.php';
       require_once '../../db/slider_photoClass.php';

switch ($_GET['req'])
{
    case "populate_category":
        

            $cat=Slider_CategoryClass::getAllCategories();
            if($cat!=0){
                foreach ($cat as $c){
                    echo "<option value='$c->category_id'>$c->category_name</option>";
                }
            }
 
            break;
            
    case "showDetails":
        $a=  Slider_PhotoClass::getAllImagescat($_GET['value'],"0");
        $b=  Slider_PhotoClass::getAllImagescat($_GET['value'],"1");
        if($a!=0 || $b!=0)
        {
            echo "<table>";
                echo "<tr><th>Thumbnail</th>";
                echo "<th>Photo_ID</th>";
                echo "<th>Caption</th>";
                echo "<th>Status</th><th colspan='3'>Manage Detail</th></tr>";
            if($a!=0){
                foreach ($a as $c){
                     echo "<tr><td><a href = '../CMS/$c->url' target=_blank><img src = '../CMS/$c->url' height=60 width=60 align=center hspace=6 /></a></td>";
                    echo "<td>$c->photo_id</td>";
                    echo "<td>$c->caption</td>";           
                    echo "<td>$c->status</td><td><a href='slider_photo_update_detail.php?id=$c->photo_id'>update</a></td><td><a id='delete' href='server/gallery/slider_photo_delete_detail.php?id=$c->photo_id'>delete</a></td>";
                    echo "<td><a href='server/gallery/slider_photo_approve_photo.php?id=$c->photo_id'>Approve photo</a></td></ tr>";
                }
            }
            if($b!=0){
                foreach ($b as $c){
                     echo "<tr><td><a href = '../CMS/$c->url' target=_blank><img src = '../CMS/$c->url' height=60 width=60 align=center hspace=6 /></a></td>";
                    echo "<td>$c->photo_id</td>";
                    echo "<td>$c->caption</td>";           
                   echo "<td>$c->status</td><td><a href='slider_photo_update_detail.php?id=$c->photo_id'>update</a></td><td><a id='delete' href='server/gallery/slider_photo_delete_detail.php?id=$c->photo_id'>delete</a></td></tr>";
                }
                 echo "</table><br/><br/><br/>";
            }
        }
            break;
}

?>

        
