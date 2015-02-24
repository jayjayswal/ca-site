    <?php 
    if(!isset($_GET['id']))
    {
        header('Location: bloglist.php');
    }  
    require_once '../includes/header.php'; 
    
    ?>

        <section>            
            <?php 
            //require_once '../includes/slider.php';
            ?>           
        </section>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../jscript/jquery-1.10.2.min.js"><\/script>')</script>

        <link rel="stylesheet" href="../css/responsive/2cols.css" media="all">
        <link rel="stylesheet" href="../css/blog.css.css" media="all">
        <script>
    window.onload = function() { 
        $( "#blogCell" ).load( "ajaxblog.php",{"id":"<?php echo $_GET['id'];?>","page":"blog"}, function( response, status, xhr ) {
  if ( status == "error" ) {
    var msg = "Sorry but there was an error: ";
    $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
  }
});

}
</script>
        <article>
            <div id="pagecontainer" name="pagecontainer" class="pagecontainer">

                    <div id="bloglistTable">
                     <div id="bloglistRow" class="section group" >
                         
                     <div id="bloglidtCell" class="col span_2_of_2 ">
                           <div  id="blogTable">
                                <div id="blogRow" class="section group" > 
                                    <div class="Homecellbackground" id="blogCell" class="col span_2_of_2">
                                          <h3>Alumni Blog</h3>
                                            <hr />
                                            <br />
                                             <span id="error"> <center><img id="loading" style="height:60px;" src="../images/loading.gif" /></center></span>

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

