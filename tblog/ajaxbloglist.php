<?php
if(isset($_GET['id']))
{
$page=$_GET['id'];
$ratio=5;
$minlimit=($ratio*($page-1));
require_once '../CMS/db/alumni_blog.php';
require_once '../CMS/db/alumni_detail.php';
$blogs=  Alumni_Blog::getAllBlogswithlimit("1", $minlimit, 5);
if($blogs!=0){
    

foreach ($blogs as $blog){
    $alumni=  Alumni_Detail::getAlumniObject($blog->alumni_uname);
    echo "<article class='clearfix'>			
            <header>
                    <span class='post-format-quote'></span>
                    <h1><a href='blog.php?id=$blog->blog_id'>".trim($blog->alumni_blog_subject)."</a></h1>
                    <p class='article-meta-extra'> ".date("F jS, Y",strtotime($blog->alumni_blog_date)).", by <a href='blog.php?id=$blog->blog_id'>$alumni->alumni_first_name $alumni->alumni_last_name</a></p>

            </header>

            <figure class='article-preview-image'>
                    <a href='blog.php?id=$blog->blog_id'><img src='../cms/$alumni->alumni_photo_url' alt='Preview image'></a>
            </figure>

            <p>".trim($blog->alumni_blog_detail)."...</p>
            <p><a href='blog.php?id=$blog->blog_id'>Read more...</a></p>

    </article> <hr class='fancy-hr'>";
}
}
else{
    echo "no blogs inserted yet";
}

}
else{
     header('Location: bloglist.php');
}
?>
