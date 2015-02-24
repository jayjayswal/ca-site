    <?php 
    require_once '../includes/header.php'; 
    require_once '../CMS/db/alumni_blog.php';
    $total=  Alumni_Blog::countblog("1");
    $re=  ceil($total/5);
    ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../jscript/jquery-1.10.2.min.js"><\/script>')</script>
<script>
   var count=0;
    getarticles();
    var myVar = setInterval(function(){getarticles();},10000);
    function getarticles()
    {
      
        if(count==<?php echo $re ?>){
              clearInterval(myVar);
             document.getElementById("ajaxload").style.display="none";
             return;
         }
        count++;
              var xmlhttp;
                if (window.XMLHttpRequest)
                  {// code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
                  }
                else
                  {// code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }
                xmlhttp.onreadystatechange=function()
                  {
                  if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                      $(".articles").append(xmlhttp.responseText);
                    }
                  }
                xmlhttp.open("GET","ajaxbloglist.php?id="+count,true);
                xmlhttp.send();
          if(count==<?php echo $re ?>){
              clearInterval(myVar);
              setTimeout(function(){document.getElementById("ajaxload").style.display="none"},9000);
         }
    }

    function myStopFunction()
    {
    clearInterval(myVar);
    }
</script>
        <section>            
            <?php 
            //require_once '../includes/slider.php';
            ?>           
        </section>
    
        <link rel="stylesheet" href="../css/responsive/2cols.css" media="all">
        <link rel="stylesheet" href="../css/blog.css.css" media="all">
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
                                           <div class="articles">
				
<!--					<article class='clearfix'>
						
						<header>
							<span class='post-format-quote'></span>
							<h1><a href='BlogPost.php'>This is the article title</a></h1>
							<p class='article-meta-extra'>September 20th, 2012, by <a href=''>Adi Purdila</a></p>
							
						</header>
						
						<figure class='article-preview-image'>
							<a href=''><img src='http://lorempixel.com/210/210' alt='Preview image'></a>
						</figure>
						
						<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
						<p><a href=''>Read more...</a></p>
						
					</article> <hr class='fancy-hr'>
                                               <article class="clearfix">
						
						<header>
							<span class="post-format-quote"></span>
							<h1><a href="BlogPost.php">This is the article title</a></h1>
							<p class="article-meta-extra">September 20th, 2012, by <a href="">Adi Purdila</a></p>
							
						</header>
						
						<figure class="article-preview-image">
							<a href=""><img src="http://lorempixel.com/210/210" alt="Preview image"></a>
						</figure>
						
						<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
						<p><a href="">Read more...</a></p>
						
					</article> 
                                        <hr class="fancy-hr">-->
				</div>
                                            <div id="ajaxload"><br />
                                            <span id="error"> <center><img id="loading" style="height:60px;" src="../images/loading.gif" /></center></span>
                                            </div>
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
