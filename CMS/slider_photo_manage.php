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
       elseif ($user->role_id==4) {
        include('includes/photohead.php');
    }
 else {
        header("location:access_denied.php?data=You have no access to this page");
    }
}


?>


                    <li><a href="slider_photo_add.php">Add slider photo</a></li>
                    <li><a href="slider_photo_manage.php">Manage slider photo</a></li>
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
     

         <script type="text/javascript">
             
            function showDetails(x)
            {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                    xmlhttp=new XMLHttpRequest();
                }
                else
                {
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp.onreadystatechange=function()
                {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        document.getElementById("tableDiv").innerHTML=xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET","server/gallery/slider_photo_manage_form.php?req=showDetails&value="+x,true);
                xmlhttp.send();
            }
             function populate_category()
            {
                var xmlhttp;
                if(window.XMLHttpRequest)
                {
                    xmlhttp = new XMLHttpRequest();
                }
                else
                {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
    
                xmlhttp.onreadystatechange = function()
                {
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("category").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET","server/gallery/slider_photo_manage_form.php?req="+"populate_category",false);
                xmlhttp.send();
            }

            window.onload=function(){
                var urlParams = <?php echo json_encode($_GET, JSON_HEX_TAG);?>;
                  populate_category();
                if(urlParams['catid']!=undefined){
                    var cat=urlParams['catid'];
                                        $("#category option").filter(function() {
                        return $(this).attr("value") == cat; 
                        }).prop('selected', true); 
                    showDetails(cat);                   
                }
            }
            
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
               <label for="category">Select Category: </label>
        <select id="category" name="category" onchange="showDetails(this.value)">
            <option value="0">--SELECT CATEGORY--</option>
        </select>
        <p id="validateTips" class="validateTips" style="font-size:15px"></p>
        <br/>
        <?php 
                        if(isset($_SESSION['answer']))
                        {
                           
                            if($_SESSION['answer']===1)
                            {
                                ?><script>updateTips( " <?php echo "Operation done" ?>" )</script><?php
                            }
                            else {
                               
                                 ?><script>updateerror( " <?php echo $_SESSION['answer']; ?>" )</script><?php
                            }
                            unset($_SESSION['answer']);
                        }
        ?>
        <div class="CSSTable" id="tableDiv">
        </div>

                
        </div>
        </div>
        
    </article>
            <br /><br />

    <?php
    include('includes/footer.php');
    ?>
    </body>
</html>
