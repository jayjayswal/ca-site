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
<!--								<li class="gn-search-item">
									<input placeholder="Search" type="search" class="gn-search">
									<a class="gn-icon gn-icon-search"><span>Search</span></a>
								</li>-->
                                                                <li><a class="gn-icon gn-icon-cog" href="#">News-Events</a>

									<ul class="gn-submenu">
                                                                            <li><a class="gn-icon gn-icon-illustrator" href="news-event_add_detail.php">Add News & Events</a></li>
										<li><a class="gn-icon gn-icon-photoshop" href="news-event_manage_detail.php">Manage News & Events</a></li>
									</ul>
								</li>
								

                                                     
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				
