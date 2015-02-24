<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../jscript/jquery-1.10.2.min.js"><\/script>')</script>
<script>
    window.onload = function() { 
        $( "#newsevnts" ).load( "homeajax.php", {"page":"allnw"},function( response, status, xhr ) {
  if ( status == "error" ) {
    var msg = "Sorry but there was an error: ";
    $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
  }
});

}
</script>


    <?php 
    require_once '../includes/header.php'; 
    ?>
        <section>            
            <?php 
          //  require_once '../includes/slider.php';
            ?>           
        </section>
    
        <link rel="stylesheet" href="../css/responsive/2cols.css" media="all">
        
        <article>
            <div id="pagecontainer" name="pagecontainer" class="pagecontainer Homecellbackground">
                <div   id="nwTable">
                     <div id="nwdeptDetailRow" class="section group" > 
                        <div id="nwdeptDetailCell" class="col span_2_of_2">
                           <h3>News & Events</h3>
                           <hr />
                       </div>
                    </div>
                    <div id="nwdeptDetailRow" class="section group" > 
                        <div  id="newsevnts" class="col span_2_of_2">
                           <center><img id="loading" src="../images/loading.gif" /></center>
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
