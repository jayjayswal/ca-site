<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['user'])){
 header("Location:home.php");
} ?>

<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>CA-SITE CMS LOG-IN</title>
  <link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" />
  <script src="scripts/jquery-1.10.2.min.js"></script>
<script src="scripts/jquery-ui-1.10.3.custom.min.js"></script>

  <style>
    body { font-size: 62.5%; }
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
  </style>
  <script>
  $(function() {
    var uname = $( "#uname" ),
      pass = $( "#password" ),
      allFields = $( [] ).add( uname ).add( pass ),
      tips = $( ".validateTips" ),
      error = $( ".error" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
    
    function updateerror( t ) {
      tips
        .text( t )
        .addClass( "ui-state-error" );
      setTimeout(function() {
        tips.removeClass( "ui-state-error", 1500 );
      }, 500 );
    }
    function updateaccess( t ) {
      error
        .text( t )
        .addClass( "ui-state-error" );
      setTimeout(function() {
        tips.removeClass( "ui-state-error", 1500 );
      }, 500 );
    }


 
    $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 305,
      width: 450,
      modal: true,
      resizable: false,
      draggable: false,
      
      buttons: {
        "Log In": function() {
       
          allFields.removeClass( "ui-state-error" );

             $.post("server/check-login.php",
                {
                  username: uname.val(),
                  password: pass.val()
                },
                function(data,status){
                         
                          data=data.trim();
                            switch(data)
                            {
                                case "1":
                                    window.location.href = "home.php"
                                    break;
                                case "2":
                                    window.location.href = "home_faculty.php"
                                    break;
                                case "3":
                                    window.location.href = "home_horizonhead.php"
                                    break;
                                case "4":
                                    window.location.href = "home_photographer.php"
                                    break;
                               case "5":
                                    window.location.href = "home_casahead.php"
                                    break;
                                case "false":
                                    updateerror("Invalid Username or Password.");
                                    break;
                                default :
                                    updateerror("Some thing wrong with server");
                                    break;
                            }  
                        
                   });
            
        },
         Cancel: function() {
          $( this ).dialog( "close" );
          updateerror("Access Denied.");
        }
      },
      close: function() {
        allFields.val( "" ).removeClass( "ui-state-error" );
         $( this ).dialog( "close" );
          updateaccess("Access Denied.");
      }
    });
 
    
$(document).ready(
     function() {
        $( "#dialog-form" ).dialog( "open" );
      });
  });
  </script>
</head>
<body>
 <noscript>
<div id="noscript" ><center>Your browser is not Javascript compatible or Javascript disabled.Please ensure your browser settings are good enough to run Javascript code to run this web-site.</center></div>
</noscript>
    <h1 class="error"></h1>
    
<div id="dialog-form" title="Computer Applications | Admin Console">
 
    
    <img src="images/deptlogo.png" style="height:25%;width:70%;position:relative;padding-left:0%;padding-top:2%;float:left;"/>
<br /><br /><br /><br />
  <fieldset style="clear:both;">
    <label for="uname">User Name</label>
    <input type="text" name="uname" id="uname" class="text ui-widget-content ui-corner-all" required  />
    <label for="password">Password</label>
    <input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" required />
  </fieldset>
<p class="validateTips"></p>
</div>
 
 
 
</body>
</html>
