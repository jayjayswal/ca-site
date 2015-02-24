<?php
require_once '../CMS/db/user_class.php';
require_once '../CMS/db/alumni_detail.php';
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['alumniuser'])) {
    header("location:shareblog.php");
}
?>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Portal</title>
  </script>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css/Alumni_Portal.css" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../jscript/jquery-1.10.2.min.js"><\/script>')</script>
<script>
     $(document).ready(function(){
            
             $("#frm1").submit(function(e)
            {
                var formObj = $(this);
                var formURL = "../server/validatealumnilogin.php";
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
                        window.location.href = "shareblog.php";
                   }
                   else if(data==0){
                     document.getElementById("error").innerHTML="Invalid username or password";  
                   }
                   else if(data==2){
                       document.getElementById("error").innerHTML="Sorry,Your request is not approved yet";
                   }
                   else{
                       document.getElementById("error").innerHTML="sumthing Wrong with server.";
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
    
  </head>
  <body>
  <div class="wrapper">
  <div class="Alumni-header-bar  centered">
  <div class="header content clearall">
  <img alt="Logo" class="logo" src="../images/logo.png">
  </div>
  </div>
  <div class="main content clearall">
<div class="banner">
<h1>
	Welcome to Alumni Portal
</h1>
  <h2 class="hidden-small">
	Please Sign in to continue
  </h2>
</div>
    <div class="card signin-card clearall">
    <form method="post" id="frm1">
    <h5 id="error" class="error"></h5><br/>
    <label class="hidden-label" for="Username">Username</label>
    <input id="Username" name="Username" type="text" placeholder="Username" value="" spellcheck="false" maxlength="10" required>
    <label class="hidden-label" for="Passwd">Password</label>
    <input id="Passwd" name="Passwd" type="password" placeholder="Password" maxlength="10" required>
    <input id="signIn" name="signIn" class="rc-button rc-button-submit" type="submit" value="Sign in" onclick="validate();"> 
    <p class="validateTips" ></p>
    <br /><div align="center"> Still not Registered???<a href ='alumni_add_form.php'>Sign Up</a> here.</div>
  </form>
</div>
</div>
</div>
  </body>
</html>