<?php
require_once '../CMS/db/user_class.php';
require_once '../CMS/db/alumni_detail.php';
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['alumniuser'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
	<title>Alumni Portal</title>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400italic' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="../css/alumniportalcss.css" type="text/css" />
<link rel="stylesheet" href="../css/Alumni_Portal.css" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../jscript/jquery-1.10.2.min.js"><\/script>')</script>
</head>
<body class="logged-in">
    <nav id="admin-bar">
        <ul>
            <li class="avatar"><a><img src="../CMS/<?php echo $_SESSION['alumniuser']->alumni_photo_url?>" height="30px" width="30px" /></a></li>
        <li class="welcome">Welcome, <?php echo $_SESSION['alumniuser']->alumni_first_name." ".$_SESSION['alumniuser']->alumni_last_name ?> ! </li>
	</ul>
<!--	<ul class="controls">		
            <li class="icon"><a href="#" data-tip="settings">S</a></li>		
	</ul>		-->
	<ul class="controls">		
            <!--<li><a href="#">Blogs You Wrote<span class="priority notice">5</span></a></li>-->
            <li><a href="profile.php">Update Profile</a></li>
            <li><a href="../tblog/bloglist.php" target="_blank">View Your Blogs on Site</a></li>
            <li><a href="shareblog.php">Share Blog</a></li>
            <li><a href="changepass.php">Change password</a></li>
	</ul>		
	<ul class="controls">
            
	</ul>
        <ul class="controls search" >
            <li><a href="logout.php">logout</a></li>
        </ul>
	</nav>    
    <div>

        <script>
             $(document).ready(function(){
            
             $("#addform").submit(function(e)
            {
                var formObj = $(this);
                var formURL = "../CMS/server/alumni/blog_add_serverfor_frontend.php";
                var formData = new FormData(this);
                $.ajax({
                    url: formURL,
                type: 'POST',
                    data:  formData,
                mimeType:"multipart/form-data",
                contentType: false,
                    cache: false,
                    processData:false,
                success: function(data, textStatus, jqXHR)
                {
                   if(data==1){
                        alert("Your Blog is successfully registered for approval.");
                        location.reload();
                   }
                   else{
                       alert(data);
                   }
                },
                 error: function(jqXHR, textStatus, errorThrown) 
                 {
                     alert("something Wrong with server.");
                 }          
                });
                e.preventDefault(); //Prevent Default action.
            });
        
        });
        </script>
    <form method="post" id="addform" name="addform" enctype="multipart/form-data"> 
    <div class="wrapper">
        
        <div class="banner"><h1>Share your blog:</h1></div>
        <div class="frmbg">
      <table width="1024" border="0" cellspacing="7" cellpadding="5">         
        <tr>
           
          <td width="155"> <label for="subject">Title:(35 characters)</label></td>
          
          <td colspan="2"><input type="text" name="subject" maxlength="35" class="tbox" id="subject" required maxlength="40" Placeholder="Subject" /></td>
        </tr>
        <tr>
          <td> <label for="blog">Blog:(700 characters) </label></td>
          <td colspan="2"> <textarea name="blog" rows="10" cols="60" maxlength="700" placeholder="Write Your Blog Here"></textarea>  </td>
        </tr>
        <tr>
          <td colspan="3"> <div align="center">
            <button type="submit">Submit</button>   
               <button type="reset">Reset</button>
          </div></td>
        </tr>
      </table>
              
        </div>
    </div>
         </div>
</form>
</body>

</html>
