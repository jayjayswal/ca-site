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
                                                                <li><a class="gn-icon gn-icon-earth" href="news-event_add_detail.php">News-Events</a></li>
                                                                <li><a class="gn-icon gn-icon-article" href="Course_Add_Course.php" >Course Detail</a></li>
                                                            <li><a class="gn-icon gn-icon-article" href="dept_detail_update.php">Department Detail</a></li>
                                                                <li><a class="gn-icon gn-icon-article" href="credit_system_manage_detail.php">Credit System</a></li>
                                                                <li><a class="gn-icon gn-icon-article" href="admission_manage_detail.php">Admission Detail</a></li>
                                                                <li><a class="gn-icon gn-icon-article" href="Contact_detail_update.php">Contact Detail</a></li>

                                                                <li><a class="gn-icon gn-icon-archive" href="faculty_bmanage_detail.php">Faculty Detail</a></li>
								<li><a class="gn-icon gn-icon-archive" href="faculty_designation_manage_detail.php" >Faculty Designation</a></li>
                                                                <li><a class="gn-icon gn-icon-photoshop" href="spc_manage_detail.php" >SPC Executive</a></li>
								<li><a class="gn-icon gn-icon-download"href="student_manage_detail.php" >Student</a></li>
                                                                <li><a class="gn-icon gn-icon-cog" href="horizon_manage_detail.php" >Horizon Issue</a></li>
								<li><a class="gn-icon gn-icon-help" href="query_manage_detail.php" >Queries</a></li>
                                                                <li><a class="gn-icon gn-icon-help" href="feedback_manage_detail.php" >Feedback</a></li>
								<li><a class="gn-icon gn-icon-earth" href="alumni_user_manage_detail.php" >Alumni</a></li>
                                                                <li><a class="gn-icon gn-icon-earth" href="alumni_blog_manage_detail.php" >Alumni Blog</a></li>
                                                                 <li><a class="gn-icon gn-icon-cog" href="user_manage_detail.php" >Manage User</a></li>
								<li><a class="gn-icon gn-icon-cog" href="log_view_detail.php" >View Log</a></li>
                                                                
                                                                <li><a class="gn-icon gn-icon-pictures" href="cagegory_manage_detail.php" >Manage Category</a></li>
                                                                 <li><a class="gn-icon gn-icon-pictures"href="slider_photo_manage.php" >Manage Slider Photos</a></li>

                                                     
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>			