<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>CMS</title>
		<meta name="description" content="A sidebar menu as seen on the Google Nexus 7 website" />
		<meta name="keywords" content="google nexus 7 menu, css transitions, sidebar, side menu, slide out menu" />
		<meta name="author" content="MSU-CA" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />  
		<link rel="stylesheet" type="text/css" href="css/demo.css" /> 
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="scripts/modernizr.custom.js"></script>
            
                          <link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" />
                        
          <script src="scripts/jquery-1.10.2.min.js"></script>
        <script src="scripts/jquery-ui-1.10.3.custom.min.js"></script>
            <script src="scripts/myjs.js"></script>
               <link rel="stylesheet" href="css/mycss.css" />
	</head>
	<body>
            <noscript>
<div id="noscript" ><center>Your browser is not Javascript compatible or Javascript disabled.Please ensure your browser settings are good enough to run Javascript code to run this web-site.</center></div>
</noscript>
            <div class="container">
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
								    <li>
                                                                        <a class="gn-icon gn-icon-help" href="#" >Manage Category</a>
                                                                    <ul class="gn-submenu">
                                                                            <li><a class="gn-icon gn-icon-illustrator" href="category_add_detail.php">Add Category</a></li>
										<li><a class="gn-icon gn-icon-photoshop" href="cagegory_manage_detail.php">Manage Category</a></li>
                                                                           
							            </ul>
                                                                    </li>
                                                                 <li><a class="gn-icon gn-icon-cog"href="#" >Manage Slider Photos</a> 
                                                                     <ul class="gn-submenu">
                                                                            <li><a class="gn-icon gn-icon-illustrator" href="slider_photo_add.php">Add Slider Photo</a></li>
										<li><a class="gn-icon gn-icon-photoshop" href="slider_photo_manage.php">Manage Slider Photos</a></li>
                                                                           
							            </ul>
                                                                    </li>

                                                     
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				
