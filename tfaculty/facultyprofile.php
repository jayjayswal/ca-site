<?php 
if(!isset($_GET['id']))
{
    header('Location: facultylist.php');
}   
?>
    <?php 
    require_once '../includes/header.php'; 
    ?>
 <link rel="stylesheet" href="../css/responsive/2cols.css" media="all">
<link rel="stylesheet" href="../css/responsivetable.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../jscript/jquery-1.10.2.min.js"><\/script>')</script>
<script>
    window.onload = function() { 
        $( "#facultyprofileCell" ).load( "facultyprofileajax.php",{"id":"<?php echo $_GET['id'];?>","page":"profile"}, function( response, status, xhr ) {
  if ( status == "error" ) {
    var msg = "Sorry but there was an error: ";
    $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
  }
});

}
</script>


       <section>            
            <?php 
           // require_once '../includes/slider.php';
            ?>           
        </section>

<article>
            <div id="pagecontainer" name="pagecontainer" class="pagecontainer">

                    <div id="acTable">
                     <div id="acRow" class="section group" >
                       <div id="facultyprofileCell" class="col span_2_of_2">
                            <div class='cellbackground' id='profile'>
                             <h3>Faculty Profile</h3>                           
                             <hr /> 
                             <span id="error"> <center><img id="loading" src="../images/loading.gif" /></center></span>
                            </div>
                        </div>
                    </div>
                
                             
               </div>
            </div>
        </article>

        <footer>
            <?php
             require_once '../includes/footer.php';
            ?>
        </footer>
            	<!--[if (lt IE 9) & (!IEMobile)]>
	<script src="jscript/responsive.selectivizr-min"></script>
	<![endif]-->
    </body>
</html>
