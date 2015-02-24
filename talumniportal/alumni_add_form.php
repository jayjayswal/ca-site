<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration form</title>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400italic' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="../css/Alumni_Portal.css" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../jscript/jquery-1.10.2.min.js"><\/script>')</script>
</head>
    <script>
            function checkuname()
            {
               
                var uname=document.addform.userName.value;
                var xmlhttp;
                if (window.XMLHttpRequest)
                  {// code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
                  }
                else
                  {// code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }
                xmlhttp.onreadystatechange=function()
                  {
                  if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        if(xmlhttp.responseText=="1")
                        {
                            document.getElementById("result").style.color="green";
                           document.getElementById("result").innerHTML="Username is available."
                           return xmlhttp.responseText;
                        }
                        else if(xmlhttp.responseText=="0")
                        {
                            document.getElementById("result").style.color="red";
                           document.getElementById("result").innerHTML="Username is not available."
                            return xmlhttp.responseText;
                        }
                        else
                        {
                            document.getElementById("result").style.color="red";
                           document.getElementById("result").innerHTML=xmlhttp.responseText;
                            return xmlhttp.responseText;
                        }
                    }
                  }
                xmlhttp.open("GET","../CMS/server/alumni/alumni_checkAvalibility.php?uname="+uname,true);
                xmlhttp.send();
            }
         
         $(document).ready(function(){
             $("#addform").submit(function(e)
            {
                var formObj = $(this);
                var formURL = "../CMS/server/alumni/alumni_add_server_for_frontend.php";
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
                          alert("Congratulations you have successfully registered. your request are sent to administrator for approval.")
                          window.location.href = "login.php";
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
<body>
<form method="post" id="addform" name="addform" enctype="multipart/form-data"> 
    <div class="wrapper">
        
        <div class="banner"><h1>Register Yourself</h1></div>
        <div class="frmbg">
      <table width="1024" border="0" cellspacing="7" cellpadding="5">         
        <tr>
           
          <td width="155"> <label for="fname">First Name<span style="color:red;">*</span>:</label></td>
          
          <td colspan="2"><input type="text" name="fname" class="tbox" id="fname" required maxlength="40" Placeholder="First Name" /></td>
        </tr>
        <tr>
          <td> <label for="lname">Last Name<span style="color:red;">*</span>:</label></td>
          <td colspan="2"> <input type="text" name="lname" class="tbox" id="lname" required maxlength="40" Placeholder="Last Name" /> </td>
        </tr>
        <tr>
          <td><label for="email">Email<span style="color:red;">*</span>:</label></td>
          <td colspan="2"><input type="email" name="email" class="tbox" id="Email"  pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" Placeholder="Email ID" required="required" /></td>
        </tr>
        <tr>
          <td><label for="linkedin_id">LinkedIn Id:</label></td>
          <td colspan="2"><input type="url" name="linkedin_id" Placeholder="Linked ID URL" class="tbox" id="linkedin_id" /></td>
        </tr>
        <tr>
          <td><label for="file">Image<span style="color:red;">*</span>:(less then 2 MB)</label></td>
          <td colspan="2"><input type="file" required="true" accept=".jpg,.jpeg,.png,.JPG" onchange="checkImg(this.value)" name="file" id="file" class="none"  /></td>
        </tr>
        <tr>
          <td><label for="file">Resume:</label></td>
          <td colspan="2"><input type="file" accept=".pdf" onchange="checkFile(this.value)" name="rfile" id="rfile" class="none" /></td>
        </tr>
        <tr>
          <td>
          <label for="batch">Batch Year<span style="color:red;">*</span>:</label></td>
          <td colspan="2"><input type="text" name="batch" class="tbox" id="batch" Placeholder="Batch Year" required="required" maxlength="4"/></td>
        </tr>
        <tr>
          <td>
          <label for="userName">Username<span style="color:red;">*</span>:</label></td>
          <td colspan="2"> <input type="text" id="userName" name="userName" class="tbox" Placeholder="Username" required maxlength="10" onchange="checkuname()"/>
     	<samp id="result" style="color:red"></samp></td>
        </tr>
        <tr>
          <td><label for="password">Password<span style="color:red;">*</span>: </label></td>
          <td colspan="2"><input type="password" name="password" id="password" pattern="^(?=.*\d+)(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%]{8,10}$" class="tbox" Placeholder="Password" maxlength="10" required="required" />&nbsp;(8 to 10 character , one special character and one number is required) </td>
        </tr>
        <tr>
          <td><label for="confirmPassword">Confirm Password<span style="color:red;">*</span>:</label></td>
          <td width="304"><input type="password" name="confirmPassword" Placeholder="Confirm Password" id="confirmPassword" pattern="^(?=.*\d+)(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%]{8,10}$" class="tbox" maxlength="10" onchange="compare()" required /></td>
          <td width="499"><samp id="Err"> </samp></td>
        </tr>
          <tr>
              <td></td>
              <td>
                          <?php
                            require_once('../server/recaptchalib.php');
                            $publickey = "6LdP8-sSAAAAAHEjEls27x9HxaLdyU-t-0DeILvB"; // you got this from the signup page
                            echo recaptcha_get_html($publickey);
                          ?>
              </td>
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
</form>

</body>
</html>