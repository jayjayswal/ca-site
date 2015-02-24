<?php
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/alumni_blog.php';
$a= Alumni_Blog::getAllBlogs(0);
$b=  Alumni_Blog::getAllBlogs(1);

if($a===0 && $b===0)
{
    die("No Blogs are Added Yet");
}
echo "<table><tr><th>ID</th><th>User Name</th><th>Subject</th><th colspan='3'>Manage Detail</th></tr>";

if($a!=0){
foreach ($a as $arr) {
    echo "<tr><td>$arr->blog_id</td><td>$arr->alumni_uname</td><td>$arr->alumni_blog_subject</td><td><a href='alumni_blog_view.php?id=$arr->blog_id'>View Blog</a></td><td><a id='delete' href='server/alumni/blog_delete_blog.php?id=$arr->blog_id'>Delete Blog</a></td><td><a href='server/alumni/blog_approve_blog.php?id=$arr->blog_id'>Approve Blog</a></td>";
}
}
if($b!=0){
foreach ($b as $arr) {
    echo "<tr><td>$arr->blog_id</td><td>$arr->alumni_uname</td><td>$arr->alumni_blog_subject</td><td><a href='alumni_blog_view.php?id=$arr->blog_id'>View Blog</a></td><td><a id='delete' href='server/alumni/blog_delete_blog.php?id=$arr->blog_id'>Delete Blog</a></td>";
}

}
echo "</table>";
?>
