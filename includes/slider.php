<!--<!DOCTYPE html>

<html>
    <head>

		<link rel="stylesheet" href="../css/slider.app.css" type="text/css" media="screen" />		
		<script src="../jscript/slider.app.js"></script>		
	</head>
        <body onload="photosMoreClick()">-->
         <!-- slider includes -->
<?php 
require_once '../CMS/db/slider_categor_class.php';
$a=  Slider_CategoryClass::getAllCategories();
?>
 <link rel="stylesheet" href="../css/slider.app.css" type="text/css" media="screen" />		
<script src="../jscript/slider.app.js"></script>
<script>
       function loadfirstphoto(){
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
                document.getElementById("sliderphotocylinder").innerHTML=xmlhttp.responseText;
                $("#home_features .cylinder").css({left:"-"+200+"px"});
                HomeFeature.hideLoader();
            
            }
            }
            xmlhttp.open("GET","../server/SliderLoadMorePhotos.php?start=0",true);
            xmlhttp.send();
       }
</script>
	<div class="feature_wrapper">
	<div id="home_features" class="revolver">
		<div class="barrel">
			<div id="sliderphotocylinder" class="cylinder" style="left: -292px;">	
				   

							</div>
		</div>
		<menu class="feature_more">
			<span class="more_photos">Show More</span>
		</menu>
		<menu class="feature_share">
			<span class="share_photos">Share a Photo</span>
		</menu>
            <form id="share_form" method="post" enctype="multipart/form-data" action="../CMS/server/gallery/slider_photo_add_server_for_frontend.php" target="photo_frame">
			<div class="thank_you">
				<h3>Thank You!</h3>
				<p>Thank you for submitting a photo. It will take some time for us to review it, but if all goes well you will see it here soon!</p>
			</div>
			<div class="form_body">
				<div class="column">
					<label>Photo Upload (JPG Only)</label>
					<input type="file" name="file" id="file" name="image" />
				</div>
				<div class="column end">
					<label>Category</label>
					<select name="category">
						<option value="">Select a Category</option>
                                                       <?php
                                                       foreach ($a as $cate){
                                                           echo '<option value="'.$cate->category_id.'">'.$cate->category_name.'</option>';
                                                       }
                                                       ?>
<!--                                                        <option value="1">Student Life</option>
                                                        <option value="3">Academics</option>
                                                        <option value="7">Our Campus</option>
                                                        <option value="4">The Community</option>
                                                        <option value="5">Athletics</option>
                                                        <option value="6">Global</option>-->
                                                </select>
				</div>
				<br class="clear"><br /><br />
				<label class="no_border">Write Something About Your Photo</label>
				<textarea name="description"></textarea>
				<p class="rules">By uploading this photo you agree to our <a href="#" target="_blank">Rules &amp; Policies</a></p>
				<input type="submit" class="submit" value="Submit"><input type="button" class="cancel" value="Cancel">
			</div>
		</form>
		<div class="category_wrapper">
			<menu class="categories">
				<a href="0" class="category_button all">show all</a>
                                <?php
                                   foreach ($a as $cate){
                                       echo " <a href='$cate->category_id' class='category_button $cate->category_color'>only $cate->category_name</a>";
                                   }
                                   ?>
<!--                                  <a href="1" class="category_button blue">only Student Life</a>
                                    <a href="2" class="category_button green">only Academics</a>
                                    <a href="3" class="category_button red">only Our Campus</a>
                                    <a href="4" class="category_button orange">only The Community</a>
                                    <a href="5" class="category_button gray">only Athletics</a>
                                    <a href="6" class="category_button purple">only Global</a>-->
                            </menu>
		</div>
	</div>
</div>
<!--	
		</body></html>-->