<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../jscript/jquery-1.10.2.min.js"><\/script>')</script>
<script>
    window.onload = function() { 
        $( "#facultylistCell" ).load( "facultyajax.php",{"page":"list"}, function( response, status, xhr ) {
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
    <link rel="stylesheet" href="../css/responsive/2cols.css" media="all">
        <link rel="stylesheet" href="../css/responsive/4cols.css" media="all">
          <link rel="stylesheet" href="../css/responsive/3cols.css" media="all">
        <article>
            <div id="pagecontainer" name="pagecontainer" class="pagecontainer">

                    <div id="facultyTable">
                     <div id="facultyRow" class="section group" >
                       <div id="facultydetailCell" class="col span_2_of_2">
                         <div class="cellbackground" id="facultyinfo">
                             <h3>Faculties</h3>
                             <hr /> 
                             <p>Besides highly qualified and seasoned faculty taking the courses at the department, experienced faculty from the university and professionals from the industry are involved in teaching the courses. This is how we provide academic excellence with professional expertise to the students. In addition, the reputed personalities from all over the country are invited to deliver lectures from time to time and impart practical domain knowledge.</p>
                         </div>          
                           
                        </div>

                      <div id="facultyRow" class="section group" >
                        <div id="facultylistCell" class="col span_3_of_3">
                             <span id="error"> <center><img id="loading" src="../images/loading.gif" /></center></span>
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
