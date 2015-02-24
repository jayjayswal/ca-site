
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../jscript/jquery-1.10.2.min.js"><\/script>')</script>
<link rel="stylesheet" type="text/css" href="../css/side.accordion.css" />
<script src="../jscript/side.accordion.min.js"></script>
<script>
    window.onload = function() { 
        $( "#acmenuCell" ).load( "selectproajax.php",{"page":"sidemenu"}, function( response, status, xhr ) {
  if ( status == "error" ) {
    var msg = "Sorry but there was an error: ";
    $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
  }
  else
      {
              $('#sidemenuaccordian').accordion({
            open: true, // First List Open, Default Value: false
            autoStart: false, // Auto Start, Default Value: false
            onHoverActive: false, // On Hover Active, Default Value: false
            slideInterval: 3000, // Expression at specified intervals (in milliseconds) Default Value: 3000
            duration: 'slow', // The default duration is slow. The strings 'fast' and 'slow' can be supplied to indicate durations of 200 and 600 milliseconds, respectively.
            easing: 'swing', //  An easing function specifies the speed at which the animation progresses at different points within the animation.
            complete: function () { console.log('Complete Event'); } //If supplied, the complete callback function is fired once the accordion is complete.
            });
      }
});
  $( "#bcaDetailCell" ).load( "selectproajax.php", {"page":"bca"},function( response, status, xhr ) {
  if ( status == "error" ) {
    var msg = "Sorry but there was an error: ";
    $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
  }
  else
      {
              $('#infoacordian').accordion({
            open: true, // First List Open, Default Value: false
            autoStart: false, // Auto Start, Default Value: false
            onHoverActive: false, // On Hover Active, Default Value: false
            slideInterval: 3000, // Expression at specified intervals (in milliseconds) Default Value: 3000
            duration: 'slow', // The default duration is slow. The strings 'fast' and 'slow' can be supplied to indicate durations of 200 and 600 milliseconds, respectively.
            easing: 'swing', //  An easing function specifies the speed at which the animation progresses at different points within the animation.
            complete: function () { console.log('Complete Event'); } //If supplied, the complete callback function is fired once the accordion is complete.
            });
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
          <link rel="stylesheet" href="../css/responsive/3cols.css" media="all">
        <article>
            <div id="pagecontainer" name="pagecontainer" class="pagecontainer">

                    <div id="acTable">
                     <div id="acRow" class="section group" >
                       <div id="acmenuCell" class="col span_1_of_4">
                         <div class="cellbackground" id="sidemenu">
                             <h3>Select Programme</h3>
                             <hr /> 
                             <span id="error"> <center><img id="loading" src="../images/loading.gif" /></center></span>
                         </div>          

                        </div>
                         <div id="bcaDetailCell" class="col span_3_of_4 ">
                             <div class="cellbackground" id="bcaadmissionDetail">
                                <h3>BCA Admission Detail</h3>
                                 <hr />
                                <span id="error"> <center><img id="loading" src="../images/loading.gif" /></center></span>
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
