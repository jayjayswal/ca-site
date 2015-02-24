<link rel="stylesheet" type="text/css" href="../css/side.accordion.css" />    
<?php 
    require_once '../includes/header.php'; 
    ?>
        <section>            
            <?php 
            require_once '../includes/slider.php';
            ?>           
        </section>

<script src="../jscript/side.accordion.min.js"></script>
<script>
    
    window.onload = function() { 
        HomeFeature.showLoader();
        $( "#deptTable" ).load( "homeajax.php",{"page":"deptdetail"} ,function( response, status, xhr ) {
  if ( status == "error" ) {
    var msg = "Sorry but there was an error: ";
    $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
  }
});

        $( "#nwdeptTable" ).load( "homeajax.php",{"page":"nw"} ,function( response, status, xhr ) {
  if ( status == "error" ) {
    var msg = "Sorry but there was an error: ";
    $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
  }
});
loadfirstphoto();
            $('#infoacordian').accordion({
            open: true, // First List Open, Default Value: false
            autoStart: true, // Auto Start, Default Value: false
            onHoverActive: false, // On Hover Active, Default Value: false
            slideInterval: 5000, // Expression at specified intervals (in milliseconds) Default Value: 3000
            duration: 'slow', // The default duration is slow. The strings 'fast' and 'slow' can be supplied to indicate durations of 200 and 600 milliseconds, respectively.
            easing: 'swing', //  An easing function specifies the speed at which the animation progresses at different points within the animation.
            complete: function () { console.log('Complete Event'); } //If supplied, the complete callback function is fired once the accordion is complete.
            });
}
</script>
    
        <link rel="stylesheet" href="../css/responsive/4cols.css" media="all">
          <link rel="stylesheet" href="../css/responsive/3cols.css" media="all">
        <article>
            <div id="pagecontainer" name="pagecontainer" class="pagecontainer">

                    <div id="homeTable">
                     <div id="homeRow" class="section group" >
                       <div id="DetailCell" class="col span_2_of_3">

                            <div  id="deptTable">
                                <div id="deptDetailRow" class="section group" > 
                                    <div class="Homecellbackground" id="deptDetailCell" class="col span_4_of_4">
                                          <h3>Department of Computer Applications</h3>
                                           <hr />
                                           <span id="error"> <center><img id="loading" src="../images/loading.gif" /></center></span>
                                    </div>
                                </div>
                                
                            </div>

                            <div id="sliderTable">
                                <div id="sliderDetailRow" class="section group" > 
                                   <div id="sliderCell" class="col span_4_of_4">
                                  
                                       <dl id="infoacordian" style="width: 95%;" class="accordion">
                                                <dt><a class="gray">Infrastructure</a></dt>
                                                <dd>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                                        unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                    <p>
                                                        <a class="button" href="#">Read More</a></p>
                                                </dd>
                                                <dt><a class="gray">Experienced Faculty</a></dt>
                                                <dd>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                                        unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                    <p>
                                                        <a class="button" href="#">Read More</a></p>
                                                </dd>
                                                <dt><a class="gray">Fully Equipped Labs</a></dt>
                                                <dd>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                                        unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                    <p>
                                                        <a class="button" href="#">Read More</a></p>
                                                </dd>
                                                <dt><a class="gray">Projector Oriented Tutoring</a></dt>
                                                <dd>
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                                        unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                    <p>
                                                        <a class="button" href="#">Read More</a></p>
                                                </dd>
                                            </dl>

                                       
                                       
                                       
                                   </div>
                               </div>
                            </div>

                        </div>
                         <div id="newseventCell" class="col span_1_of_3 ">
                             <div  id="nwdeptTable">
                                 <div id="nwdeptDetailRow" class="section group" > 
                                    <div class="Homecellbackground" id="nwdeptDetailCell" class="col span_4_of_4">
                                       <h3>News & Events</h3>
                                       <hr />
                                       <span id="error"> <center><img id="loading" src="../images/loading.gif" /></center></span>
                                    </div>
                                 </div>
                            </div>
                            <div id="seeallnw">
                                <a class="Button" href="news_event.php" ><span>See all</span></a>
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
