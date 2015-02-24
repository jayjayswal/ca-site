 <?php
 require_once '../../db/alumni_detail.php';
require_once '../../db/alumni_blog.php';
require_once '../../db/ImageManipulator.php';

require_once '../../db/site_log_class.php';
require_once '../../db/user_class.php';
 if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['alumniuser'])) {
    header("location:../../../talumniportal/login.php");
}
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: ../../access_denied.php?data=You don't have direct access to this page");
}

define('INCLUDE_CHECK', true);

if(isset($_POST['subject']))
{
    $subject=$_POST['subject'];
}
else
{
    die("sebject needed.");
}
if(isset($_POST['blog']))
{
    $blog=$_POST['blog'];
}
else
{
    die("blog needed.");
}

$bl=new Alumni_Blog(NULL, $_SESSION['alumniuser']->alumni_uname, $subject, $blog,NULL, "0");
echo $bl->InsertBlog();
$l=new site_log(NULL, NULL,$_SESSION['alumniuser']->alumni_uname, $_SERVER['REMOTE_ADDR'], $subject." blog added");
$l->insertlog();
?>