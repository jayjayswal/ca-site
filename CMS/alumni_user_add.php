<?php
require_once 'db/user_class.php';
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header("location:index.php");
}
else{
$user = $_SESSION['user'];
    if($user->role_id==1)
    {
        include('includes/head.php');
    }
 else {
        header("location:access_denied.php?data=You have no access to this page");
    }
}

?>


                    <li><a href="alumni_user_add.php">Add Alumni</a></li>
                    <li><a href="alumni_user_manage_detail.php">Manage Alumni Users</a></li>
                     <li><a href="#"><?php echo $user->username; ?></a>
                        <ul>
                            <li class='has-sub last'><a href='user_change_password.php'><span>Change password</span></a> </li>
                           <li class='has-sub last'><a href='server/logout.php'><span>Logout</span></a> </li>
                        </ul>
                    </li>
            </ul> 
    </div><!-- /container -->
    <script src="scripts/classie.js"></script>
    <script src="scripts/gnmenu.js"></script>
    <script>
            new gnMenu( document.getElementById( 'gn-menu' ) );
     </script>
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
                xmlhttp.open("GET","server/alumni/alumni_checkAvalibility.php?uname="+uname,true);
                xmlhttp.send();
            }
         
         $(document).ready(function(){

             $("#addform").submit(function(e)
            {
                var formObj = $(this);
                var formURL = formObj.attr("action");
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
                   if(data==1)
                       {
                           updateTips("User Inserted");
                           document.getElementById("addform").reset();
                       }
                       else
                           {
                               updateerror(data);
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
    <section >
        <div>
        <center><img src="images/logo.png" style="width:40%;position:relative;padding-left:0%;padding-top:2%;z-index:-1;" /></center>

        </div>
    </section>
    
    <article>
       <div id="content">             
           <div style="margin-left:10px;">
            <br />
            <p id="validateTips" class="validateTips" style="font-size:15px"></p>

                <?php include('server/alumni/alumni_add_form.php');
                ?>
        </div>
        </div>
        
    </article>
            <br /><br />

    <?php
    include('includes/footer.php');
    ?>
    </body>
</html>
