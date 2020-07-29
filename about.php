<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once('pdo.php');
 ?>



<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from netgon.net/artstyles/oliver/new/dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Jun 2020 15:24:44 GMT -->
<head>
    <meta charset="utf-8" />
    <title>photocomptia</title>

	<!-- Meta Data -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Team" />
    <meta name="keywords" content="Photo Competions and Events" />
    <meta name="description" content="Participate in the event and win exciting prizes." />

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="144x144" href="images/favicons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="57x57" href="images/favicons/apple-touch-icon-57x57.png">
	<link rel="shortcut icon" href="images/favicons/favicon.png" type="image/png">

    <!-- Styles -->
	<link rel="stylesheet" type="text/css" href="style/style.css"/>

	<!-- Modernizr -->
	<script src="js/modernizr.custom.js" type="text/javascript"></script>

</head>
<body>
    <div class="loading animated">
	    <div class="loading-wrap animated bounceInLeft">
		    <img class="logotype animated infinite bounceIn" src="img/logo1.png" alt="logo">
	    </div>
	</div>

    <!-- Header -->
	<nav class="navbar animated slideInDown">
        <div class="navbar-left">
            <a href="index.php">
                <img class="logotype" src="img/logo1.png" alt="logo">
			</a>
        </div>
		<div id="open-overlay-nav" class="hamburger">
            <span class="hamburger__line"></span>
            <span class="hamburger__line"></span>
            <span class="hamburger__line"></span>
			<span class="hamburger__text">Menu</span>

		</div>
    <div class="hamburger__login">
      <?  if( isset($_SESSION['personid']) ) { ?>
			<a class="link_login" href="signin.php"><b>LOGOUT</b></a><?
} else{
?>
	<a class="link_login" href="signin.php"><b>LOGIN</b></a>
<?}?>
        </div>
	</nav>
	<!-- /Header -->

	<!-- About -->
	<section class="section section-history section_no-space-bottom section_first">
    	<div class="container">
            <div class="row justify-content-center">
			    <div class="col-12 col-lg-9 section__header-wrap section__quote">
				    <h2 class="title title__h2 title_center title_light title_vertical-line-bottom">
					    Photography —is the most democratic of all arts.
					</h2>
				</div>
			</div>
		</div>
	<section class="section section-onescreen">
	    <div class="container">
            <div class="row row-flex os">
			    <div class="col-sm-auto col-lg-5">
				    <div class="block-image">
                        <div class="reveal reveal--img"><img src="img/image_history_01.jpg" alt="About Us"></div>
                    </div>
				</div>
			    <div class="col-12 col-lg-7">
				    <div class="col-about__describe col-about__describe_right">

				        <h2 class="title title__h2 title__section title_normal">About Us.</h2>
				        <p class="block-description block-description_two-column">photocomptia is a website for the photographers of india. We conduct contest and events to encourger many young photographers all over the country and give them some cash money or goodies. Winners of a event are not chosen by us, its by the audience. In case we may not meet the no. of Participants Participating in a contest(i.e, if the prize money is 1000 and the Participants are less than 100) but still we are ready to give the winners what we promised. This is the reason why we are now in free hosting. </p>
				    </div>
				</div>
			</div>
		</div>
		<div class="text-decoration text-decoration_bottom" data-100-start="transform[swing]:translateY(100px)" data--800-top="transform[swing]:translateY(-100px)">About Us</div>
	</section>
    <!-- /About -->

	<!-- Overlay Menu -->
	<div class="popup popup__menu">
	    <div class="popup-inner">
            <div class="dl-menu__wrap dl-menuwrapper">
                <ul class="dl-menu dl-menuopen">
					<li>
					    <a href="index.php">Home</a>
				    </li>
				    <li>

						    <li><a href="about.html">About Us</a></li>
					<!--    <li><a href="about_onescreen.html">Our Team</a></li>    -->

					</li>

					<li>
						<a href="next_contest.php"> Current Events</a>
					</li>
					<li>
					    <a href="contest_page.php">Event Gallery </a>
				    </li>
		   		<!--	<li>
					    <a href="blog.html">Our Services</i></a>
				    </li>    -->
					<li><a href="contact.php">Contact Us</a></li>

				<!--    <li>
					    <a href="#">Socials <i class="fa fa-angle-down" aria-hidden="true"></i></a>
					    <ul class="dl-submenu">
						    <li><a href="about_onescreen.html">About Onescreen</a></li>
							<li><a href="coming_soon.html">Coming Soon</a></li>
						    <li><a href="page_error.html">Page Error</a></li>
							<li><a href="page_error_v2.html">Page Error v2</a></li>
						    <li><a href="nav_v2.html">Menu v2</a></li>
					    </ul>
				    </li> -->
			    </ul>
		    </div>
	    </div>
	</div>
	<!-- /Overlay Menu -->
	<!-- JavaScripts -->
	<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="js/plugins.js" type="text/javascript"></script>
    <script src="js/common.js" type="text/javascript"></script>

</body>

<!-- Mirrored from netgon.net/artstyles/oliver/new/dark/about_onescreen.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Jun 2020 15:27:38 GMT -->
</html>
