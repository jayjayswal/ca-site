<?php 
session_start();
require_once '../CMS/db/ConnectionClass.php';
        $con=getConnection::connectToDatabase();
        getConnection::selectDatabase($con);
//if(!isset($_SESSION['slider_total']))
//{
//    $totalresult=mysqli_query($con,"SELECT COUNT(*) FROM slider_photos");
//    $row = mysqli_fetch_array($totalresult);    
//    $total=$row['COUNT(*)'];
//    $result=  mysql_query($con,"SELECT b.`category_id`, b.`category_name`, b.`category_color`, count(a.`photo_id`) as total  from `slider_photos` a, `slider_category` b where a.`category_id`=b.`category_id` group by b.`category_id`");
//   
//    $arr=array(
//        "0"=>array(
//            $total
//        )
//    );
//
//    while($row = mysqli_fetch_array($result))
//    { 
//       $arr[$row['category_id']]=array(
//               $row['total']
//               );
//    } 
//    $_SESSION['slider_total']=$arr;
//}

    $ratio=10;
  
    if(isset($_GET['start']))
    {
       
        $page=$_GET['start'];
        $cat=-1;
       
        if(!isset($_GET['category']))
        {
          
            $cat=0;
        }
        else {
            
            $cat=$_GET['category'];
        }
        $page++;
//$totalcatphoto=$_SESSION['slider_total'][$cat][0];
            $minlimit=($ratio*($page-1));
            $maxlimit=$ratio*($page);
            if($cat==0){
            $result=  mysqli_query($con,"SELECT a.photo_id,a.url,a.caption,a.category_id,b.category_name,b.category_color FROM slider_photos a,slider_category b WHERE a.category_id=b.category_id AND a.status=1 ORDER BY a.photo_id DESC LIMIT ".$minlimit.",10");
            
            }
            else {
                $result=  mysqli_query($con,"SELECT a.photo_id,a.url,a.caption,a.category_id,b.category_name,b.category_color FROM slider_photos a,slider_category b WHERE a.category_id=b.category_id AND a.status=1 AND a.category_id=".$cat." ORDER BY a.photo_id DESC LIMIT ".$minlimit.",10");
            }
             while($row = mysqli_fetch_array($result))
            { 
               echo '<figure class="chamber '.$row['category_color'].' '.$row['category_id'].'">
                    <img src="../CMS/'.$row['url'].'" alt="" height="300" />
                    <div class="label">
                                            <p class="caption">'.$row['caption'].' </p>
                                            <div class="'.$row['category_color'].'"> 
                                    <h2>'.$row['category_name'].'</h2>
                                    <a href="'.$row['category_id'].'" class="button">show only The '.$row['category_name'].' photos</a>
                            </div>	
                    </div>
                    </figure>';
            
        }
    }


?>


