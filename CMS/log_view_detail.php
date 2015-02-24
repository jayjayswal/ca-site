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
     

         <script type="text/javascript">
            function loaddate(val){
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
                xmlhttp.open("GET","server/users/log_view_detaill_form.php?req=date&value="+val,true);
                xmlhttp.send();
            }
            function dispDropdown()
            {
                if (document.getElementById('username').checked)
                {
                    document.getElementById('drpDiv').style.display = 'block';
                    document.getElementById('calcDiv').style.display = 'none';
                }
                else
                {
                    document.getElementById('drpDiv').style.display = 'none';
                }
            }
            
            function dispCalender()
            {
                if (document.getElementById('calender').checked)
                {
                    document.getElementById('calcDiv').style.display ='block';
                    document.getElementById('drpDiv').style.display = 'none';
                }
                else
                {
                    document.getElementById('calcDiv').style.display = 'none';
                }
            }
            function userDetails(x)
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
                xmlhttp.open("GET","server/users/log_view_detaill_form.php?req=userDetails&value="+x,true);
                xmlhttp.send();
            }
            
            function dispAll(y)
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
                xmlhttp.open("GET","server/users/log_view_detaill_form.php?req=all",true);
                xmlhttp.send();
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
 Search By: <br />
 
        username :<input type="radio" name="search" id="username" value="username" onclick="dispDropdown()"  />
        &nbsp;&nbsp;&nbsp;Date:<input type="radio" name="search" id="calender" value="calender" onclick="dispCalender()"  />
      &nbsp;&nbsp;&nbsp;
       All: <input type="radio" name="search" id="all" value="all" onclick="dispAll(this.value)"  />
        <br/><br/>
        
        <div id="drpDiv" style="display: none">
            <select id="usrDropdown" onchange="userDetails(this.value)">
            <option value="0">--SELECT USERNAME--</option>
            <?php require_once 'db/user_class.php';
            $users= user_class::getAllUsers();
            foreach ($users as $u){
                echo "<option value=".$u->username.">$u->username</option>";
            }
            ?>
        </select>
        </div>
        
        <div id="calcDiv" style="display: none">
            <input type="date" id="calc" onchange="loaddate(this.value)" />
        </div>
        <br/><br/>
        
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
