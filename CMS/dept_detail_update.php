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
         
         $(document).ready(function(){
            
             $("#editdetail").submit(function(e)
            {
                for (instance in CKEDITOR.instances) {
                        CKEDITOR.instances[instance].updateElement();
                }
//                 alert( CKEDITOR.instances.editor1.getData());
                var formObj = $(this);
                var formURL = formObj.attr("action");
                var formData = new FormData(this);
                $.ajax({
                    url: formURL,
                    type: 'POST',
                    data:  formData,
                contentType: false,
                    cache: false,
                    processData:false,
                success: function(data, textStatus, jqXHR)
                {
                       if(data==1)
                       {
                           updateTips("Detail Updated");
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
           <div style="margin-left:10px;"><br /><br />
               <h2>Update Department Detail:</h2>
            <p id="validateTips" class="validateTips" style="font-size:15px"></p>

                <?php include('server/gen-detail/dept_detail_form.php');
                ?><br /><br /><br />
        </div>
         
        </div>
        
    </article>
            <br /><br />

    <?php
    include('includes/footer.php');
    ?>
    </body>
</html>
