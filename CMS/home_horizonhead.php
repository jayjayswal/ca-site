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
    if($user->role_id==3)
    {
        include('includes/horizonhead.php');
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
<!--                    <li><a href="http://tympanus.net/codrops">jay</a></li>-->
            </ul>
<!--        <header style="height:0px;width:0px;">
                    <h1>Google Nexus Website Menu <span>A sidebar menu as seen on the <a href="http://www.google.com/nexus/index.html">Google Nexus 7</a> page</span></h1>	
            </header> -->
    </div><!-- /container -->
    <script src="scripts/classie.js"></script>
    <script src="scripts/gnmenu.js"></script>
    <script>
            new gnMenu( document.getElementById( 'gn-menu' ) );
    </script>
             
    
    
    <section >
        <div>
        <center><img src="images/logo.png" style="width:40%;position:relative;padding-left:0%;padding-top:2%;z-index:-1;" /></center>

        </div>
    </section>
    
    
    <article>
        <div id="content">
            
        </div>
    </article>
    
    
    </body>
</html>