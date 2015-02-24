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


                    <li><a href="user_add.php">Add CMS User</a></li>
                    <li><a href="user_manage_detail.php">Manage CMS Users</a></li>
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
        
     </script>
    <section >
        <div>
        <center><img src="images/logo.png" style="width:40%;position:relative;padding-left:0%;padding-top:2%;z-index:-1;" /></center>

        </div>
    </section>
    
    <article>
       <div class="CSSTable" id="content">       
           <div style="margin-left:10px;">
                <p id="validateTips" class="validateTips" style="font-size:15px"></p>
                <?php include('server/users/user_manage_detaill_form.php');
                        if(isset($_SESSION['answer']))
                        {
                            if($_SESSION['answer']==1)
                            {
                                ?><script>updateTips( " <?php echo "Details Deleted" ?>" )</script><?php
                            }
                            else {
                               
                                 ?><script>updateerror( " <?php echo $_SESSION['answer']; ?>" )</script><?php
                            }
                            unset($_SESSION['answer']);
                        }
                ?>
        </div>
         
        </div>
    </article>

    <?php
    include('includes/footer.php');
    ?>
    </body>
</html>

