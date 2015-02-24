<?php 
    require_once '../includes/header.php'; 
    ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../jscript/jquery-1.10.2.min.js"><\/script>')</script>
 <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>
<script>
    window.onload = function() { 
        $( "#conDetailCell" ).load( "contectajax.php", {"page":"cont"},function( response, status, xhr ) {
  if ( status == "error" ) {
    var msg = "Sorry but there was an error: ";
    $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
  }
});

}
 $(document).ready(function(){

             $("#addqueryform").submit(function(e)
            {
                $("#qstatus").text("Processing...");
                $("#qstatus").show();
                var formObj = $(this);
                var formURL = "../CMS/server/query-feedback/query_add_server.php";
                var formData = new FormData(this);
                $.ajax({
                    url: formURL,
                type: 'POST',
                    data:  formData,
                mimeType:"multipart/form-data",
                contentType: false,
                    cache: false,
                    processData:false,
                success: function(data, textStatus, jqXHR)
                {
                   if(data==1)
                       {
                          document.getElementById("addqueryform").reset(); 
                          $("#qstatus").text("Your query is submited successfully, we will contact you as soon as possible.");
                       }
                       else
                           {
                              $("#qstatus").text(data);
                           }
                },
                 error: function(jqXHR, textStatus, errorThrown) 
                 {
                     alert("something Wrong with server.");
                 }          
                });
                e.preventDefault(); //Prevent Default action.
            });
            
             $("#addfeedform").submit(function(e)
            {
                $("#fstatus").text("Processing...");
                $("#fstatus").show();
                var formObj = $(this);
                var formURL = "../CMS/server/query-feedback/feedback_add_server.php";
                var formData = new FormData(this);
                $.ajax({
                    url: formURL,
                type: 'POST',
                    data:  formData,
                mimeType:"multipart/form-data",
                contentType: false,
                    cache: false,
                    processData:false,
                success: function(data, textStatus, jqXHR)
                {
                   if(data==1)
                       {
                           document.getElementById("addfeedform").reset(); 
                          $("#fstatus").text("Your feedback is submited successfully, thank you.");
                       }
                       else
                           {
                              $("#fstatus").text(data);
                           }
                },
                 error: function(jqXHR, textStatus, errorThrown) 
                 {
                    $("#fstatus").text("sumthing Wrong with server.");
                 }          
                });
                e.preventDefault(); //Prevent Default action.
               
            });
        
        });
</script>
<script>
var myCenter=new google.maps.LatLng(22.311897,73.185574);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:17,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  animation:google.maps.Animation.BOUNCE
  });

marker.setMap(map);

}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
        <section>            
            <?php 
          //  require_once '../includes/slider.php';
            ?>           
        </section>
    
        <link rel="stylesheet" href="../css/responsive/4cols.css" media="all">
          <link rel="stylesheet" href="../css/responsive/2cols.css" media="all">
        <article>
            <div id="pagecontainer" name="pagecontainer" class="pagecontainer">

                    <div id="contectTable">
                     <div id="contectRow" class="section group" >
                       <div id="DetailCell" class="col span_1_of_2">

                            <div  id="conTable">
                                <div id="conDetailRow" class="section group" > 
                                    <div class="Homecellbackground" style="min-height:50px;" id="conDetailCell" class="col span_4_of_4">
                                          <h3>Contact detail</h3>
                                           <hr />
                                           <span id="error"> <center><img id="loading" src="../images/loading.gif" /></center></span>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                         <div id="mapCell" class="col span_1_of_2">

                            <div  id="mapTable">
                                <div id="mapRow" class="section group" > 
                                    <div class="Homecellbackground" style="min-height:50px;" id="mapCell" class="col span_4_of_4">
                                          <h3>Map</h3>
                                           <hr />
                                           <!-- GOOGLE MAPS -->
                                          
				<div id="googleMap" style="width:500px;height:300px;"></div>
                                    </div>
                                </div>
                                
                            </div>

                        </div>

                    </div>
                        <div id="homeRow" class="section group" >
                       <div id="DetailCell" class="col span_1_of_2">

                            <div  id="queryTable">
                                <div id="queryRow" class="section group" > 
                                    <div class="Homecellbackground" style="min-height:50px;" id="queryCell" class="col span_4_of_4">
                                          <h3>Ask query</h3>
                                           <hr />
                                           <span id="qstatus" style="color: #666666;"hidden="true"></span><br />
                                           <form method="post" id="addqueryform" > 
                                               <label for="name">Name:</label>
                                               <input type="text" placeholder="Your name" name="name" class="text ui-widget-content ui-corner-all" id="name" required maxlength="25" />		<br /><br />
                                               <label for="email">Email:</label>
                                               <input type="email" placeholder="Your email" name="email" class="text ui-widget-content ui-corner-all" id="email" required />	<br /><br />
                                                <label for="query">Query:(300 character)</label>
                                                <textarea spellcheck="true" style="resize: none;" placeholder="Write your query here" class="text ui-widget-content ui-corner-all" name="query" maxlength="300" id="query" rows="7" cols="50" required></textarea>
                                               <br /><br />
                                             <button type="submit">Submit</button>
                                             <button type="reset">Reset</button>
                                         </form> 
                                           
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                         <div id="DetailCell" class="col span_1_of_2">

                            <div  id="conTable">
                                <div id="conDetailRow" class="section group" > 
                                    <div class="Homecellbackground" style="min-height:50px;" id="conDetailCell" class="col span_4_of_4">
                                          <h3>Give feedback</h3>
                                           <hr />
                                            <span id="fstatus" style="color: #666666;"hidden="true"></span><br />
                                           <form method="post" id="addfeedform" > 
                                               <label for="name">Name:</label>
                                               <input type="text" placeholder="Your name" name="name" class="text ui-widget-content ui-corner-all" id="name" required maxlength="25" />		<br /><br />
                                               <label for="email">Email:</label>
                                               <input type="email" placeholder="Your email" name="email" class="text ui-widget-content ui-corner-all" id="email" required />	<br /><br />
                                                <label for="feed">Feedback:(300 character)</label>
                                                <textarea spellcheck="true" style="resize: none;" placeholder="Write your feedback here" class="text ui-widget-content ui-corner-all" name="feed" maxlength="300" id="feed" rows="7" cols="50" required></textarea>
                                               <br /><br />
                                             <button type="submit">Submit</button>
                                             <button type="reset">Reset</button>
                                         </form> 
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
