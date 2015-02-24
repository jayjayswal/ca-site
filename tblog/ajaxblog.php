<?php
if(isset($_POST['page'])){
$page=$_POST['page'];
}
else{
   header('Location: index.php');
}
if(trim($page)=="blog"){
if(isset($_POST['id'])){
$id=$_POST['id'];
}

require_once '../CMS/db/alumni_blog.php';
require_once '../CMS/db/alumni_detail.php';
$blog=  Alumni_Blog::getBlogObject($id);

if($blog===0){
    die("No blog with this id.");
}
if($blog->alumni_blog_status==0 || $blog->alumni_blog_status=="0" ){
    die("This blog is not approved yet");
}
    $alumni=  Alumni_Detail::getAlumniObject($blog->alumni_uname);
    echo " <h3>Alumni Blog</h3><hr /><br /><div class='articles'>
        <article class='clearfix'>			
            <header>
                    <span class='post-format-quote'></span>
                    <h1><a href='BlogPost.php'>".trim($blog->alumni_blog_subject)."</a></h1>
                    <p class='article-meta-extra'> ".date("F jS, Y",strtotime($blog->alumni_blog_date)).", by <a href=''>$alumni->alumni_first_name $alumni->alumni_last_name</a></p>

            </header>

            <figure class='article-preview-image'>
                    <a href=''><img src='../cms/$alumni->alumni_photo_url' alt='Preview image'></a>
            </figure>

            <p>".trim($blog->alumni_blog_detail)."</p>

    </article> <hr class='fancy-hr'></div>";
}
?>