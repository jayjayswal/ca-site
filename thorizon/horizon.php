<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../jscript/jquery-1.10.2.min.js"><\/script>')</script>
<script>
    window.onload = function() { 
        $( "#horizonisseCell" ).load( "horizonajax.php",{"page":"allhorizon"}, function( response, status, xhr ) {
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
           // require_once '../includes/slider.php';
            ?>           
        </section>
    
        <link rel="stylesheet" href="../css/responsive/4cols.css" media="all">
          <link rel="stylesheet" href="../css/responsive/2cols.css" media="all">
        <article>
            <div id="pagecontainer" name="pagecontainer" class="pagecontainer">

                    <div id="horizonTable">
                     <div id="horizoninfoRow" class="section group" >
                       <div id="horizoninfoCell" class="col span_2_of_2">
                         <div class="cellbackground" id="horizoninfodetail">
                             <h3>Horizon Magazine</h3>
                             <hr /> 
                             <p>
                                 Efforts made for a medium to shorten the gap between the new technological advancements and awareness of students led into the shaping of an official publication, we call it "The Horizon".
                             </p>
                         </div>          

                        </div>
                    </div>
                     <div id="horizonisseRow" class="section group" >
                       <div id="horizonisseCell" class="col span_2_of_2">
                           <div class="cellbackground" id="horizonisse">
                               <h3>Horizon Magazine</h3>
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
