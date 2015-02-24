<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../jscript/jquery-1.10.2.min.js"><\/script>')</script>
<script>

</script>
<style>
    h3{
        font-family: arial;
        color: #009999;
        font-size: xx-large;
    }
</style>

    <?php 
    //include( $_SERVER['DOCUMENT_ROOT']."/ca-site/includes/header.php");
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
                             
                             <h3>404 - The page cannot be found</h3>
                             <hr /> 
                             <p>
                                 Sorry, we cannot find the page <span style="color: #0000ff"> <?php echo $_SERVER['REQUEST_URI']; ?></span><br /><br/> 

                                It might have been removed, had its name changed, or is temporarily unavailable.<br /><br/> 

                                Please check that the Web site address is spelled correctly.<br /><br/> 

                                Or go to our <a href="/ca-site/thome/home.php" >home page</a>, and use the menus to navigate to a specific section. <br /><br/> 
                             </p>
                         </div>          

                        </div>
                    </div>
                    </div>      
               </div>
           
        </article>

        <footer>
            <?php
           //  require_once '../includes/footer.php';
            ?>
        </footer>
            	<!--[if (lt IE 9) & (!IEMobile)]>
	<script src="jscript/responsive.selectivizr-min"></script>
	<![endif]-->
    </body>
</html>
