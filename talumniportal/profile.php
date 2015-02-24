<?php
require_once '../CMS/db/user_class.php';
require_once '../CMS/db/alumni_detail.php';
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['alumniuser'])) {
    header("location:login.php");
}
$lu=  Alumni_Detail::getAlumniObject($_SESSION['alumniuser']->alumni_uname);
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
                var formURL = "../CMS/server/alumni/alumni_update_server_for_frontend.php";
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
                   if(data.trim()==1)
                       {
                          alert("Your profile is successfully updated.")
                          window.location.reload();
                       }
                       else
                           {
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
        
        <div class="banner"><h1>Update Profile</h1></div>
        <div class="frmbg">
      <table width="1024" border="0" cellspacing="7" cellpadding="5">         
        <tr>
        <tr>
          <td><label for="email">Email<span style="color:red;">*</span>:</label></td>
          <td colspan="2"><input value="<?php echo $lu->alumni_email?>" type="email" name="email" class="tbox" id="Email"  pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" Placeholder="Email ID" required="required" /></td>
        </tr>
        <tr>
          <td><label for="linkedin_id">LinkedIn Id:</label></td>
          <td colspan="2"><input value="<?php echo $lu->alumni_linkedin_id?>"  type="url" name="linkedin_id" Placeholder="Linked ID URL" class="tbox" id="linkedin_id" /></td>
        </tr>
        <tr>
          <td><label for="file">Image:(less then 2 MB)</label></td>
          <td colspan="2"><input type="file"  accept=".jpg,.jpeg,.png,.JPG" onchange="checkImg(this.value)" name="file" id="file" class="none"  /></td>
        </tr>
        <tr>
          <td><label for="file">Resume:</label></td>
          <td colspan="2"><input type="file" accept=".pdf" onchange="checkFile(this.value)" name="rfile" id="rfile" class="none" /></td>
        </tr>
        <tr>
          <td>
          <label for="batch">Batch Year<span style="color:red;">*</span>:</label></td>
          <td colspan="2"><input value="<?php echo $lu->alumni_batch?>"  type="text" name="batch" class="tbox" id="batch" Placeholder="Batch Year" required="required" maxlength="4"/></td>
        </tr>

          <td colspan="3"> <div align="center">
            <button type="submit">Submit</button>   
               <button type="reset">Reset</button>
          </div></td>
        </tr>
      </table>
        </div>
    </div>
</form>
</body>

</html>
