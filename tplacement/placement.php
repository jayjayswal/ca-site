<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../jscript/jquery-1.10.2.min.js"><\/script>')</script>
<script>
    window.onload = function() { 
        $( "#splacementCell" ).load( "placementajax.php",{"page":"pdetail"} ,function( response, status, xhr ) {
  if ( status == "error" ) {
    var msg = "Sorry but there was an error: ";
    $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
  }
});

        $( "#empplacementCell" ).load( "placementajax.php",{"page":"empdetail"} , function( response, status, xhr ) {
  if ( status == "error" ) {
    var msg = "Sorry but there was an error: ";
    $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
  }
});

        $( "#fsplacementCell" ).load( "placementajax.php",{"page":"fdetail"} , function( response, status, xhr ) {
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
            //require_once '../includes/slider.php';
            ?>           
        </section>
    
        <link rel="stylesheet" href="../css/responsive/4cols.css" media="all">
          <link rel="stylesheet" href="../css/responsive/3cols.css" media="all">
        <article>
            <div id="pagecontainer" name="pagecontainer" class="pagecontainer">

                    <div id="placementTable">
                     <div id="placementRow" class="section group" >
                         
                     <div id="splacementCell" class="col span_2_of_3 ">
                         <div class="cellbackground" id="splacementdetail">  
                            <h3>Student Placement Cell</h3>

                            <hr />
                            <span id="error"> <center><img id="loading" src="../images/loading.gif" /></center></span>
                         </div>
                    </div>
                 
                       <div id="DetailCell" class="col span_1_of_3">

                            <div id="empplacementTable">
                                <div id="empplacementRow" class="section group" > 
                                   <div id="empplacementCell" class="col span_4_of_4">
                                        <div class="cellbackground" id="empplacementdetail">  
                                            <h3>For Employers</h3>

                                            <hr />
                                            <span id="error"> <center><img id="loading" src="../images/loading.gif" /></center></span>
                                         </div>
                                   </div>
                               </div>
                            </div>

                             <div id="fsplacementTable">
                                <div id="fsplacementRow" class="section group" > 
                                   <div id="fsplacementCell" class="col span_4_of_4">
                                        <div class="cellbackground" id="fsplacementdetail">  
                                            <h3>For Students</h3>

                                            <hr />
                                            <span id="error"> <center><img id="loading" src="../images/loading.gif" /></center></span>
                                         </div>
                                   </div>
                               </div>
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
