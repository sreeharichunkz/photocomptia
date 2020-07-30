<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
 require_once('pdo.php');
if(isset($_POST['sndmessage'])){


     $subject=$_POST['subject'];
        $message=$_POST['message'];
        $mbno=$_SESSION['mobno'];
        $email=$_SESSION['email'];
        $name=$_SESSION['username'];

           $stmt = $pdo->prepare('INSERT INTO messagess
            (name, mob_no, email, subject ,message) VALUES ( :uname, :mb, :em, :sub, :mes)');
            $stmt->execute(array(
                    ':uname' => $name,
                    ':mb' => $mbno,
                    ':em' => $email,
                    ':sub' => $subject,
                    ':mes' => $message)
                );

            $_SESSION['success']="Record added";
            header("Location: signin.php");




}
echo   $_SESSION['mobno'];
//  if(isset($_POST['verify'])){
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
          <a class="link_login" href="userlogout.php"><b>LOGOUT</b></a><?
    } else{
    ?>
      <a class="link_login" href="signin.php?page=contact.php"><b>LOGIN</b></a>
    <?}?>
            </div>
	</nav>
	<!-- /Header -->

	<!-- Contact -->
	<section class="section section-contact section-onescreen">
	    <div class="container">
		    <div class="row">
			    <div class="col-lg-12">
				    <h2 class="title__section title__h1 title_horizontal-line"><span class="reveal reveal_gray">Let’s chat.</span></h2>
			    </div>
			</div>
            <div class="row">
			    <div class="col-lg-4">
                    <p class="text-block">Please provide your valuable feedback.<br>You can also tell us about new contest ideas or any other suggestions.</p>
					<a id="open-popup" class="btn btn__contact" href="#">Leave a message</a>
				</div>



		</div>
	</section>


		    <footer class="footer">

				<div class="container">
					<div class="row">


						<div class="col-md-6 col-lg-4">
							<h5 class="title title__h6 text_uppercase">Get in touch</h5>
							<ul class="footer__contacts list-unstyled">
								<li>Mail: photocomptia@gmail.com</li>

							</ul>
						</div>
						<div class="col-md-6 col-lg-4">
							<h5 class="title title__h6 text_uppercase">Social</h5>
							<ul class="footer__contacts list-unstyled">
								<li>Connect with me on <a class="link_decoration" href="#">facebook</a>,<br/><a class="link_decoration" href="#">twitter</a> or <a class="link_decoration" href="#">instagrem</a></li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		<div class="text-decoration text-decoration_bottom" data-100-start="transform[swing]:translateY(100px)" data--800-top="transform[swing]:translateY(-100px)">Contact</div>
	</section>
    <!-- /Contact -->

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
					    <a href="contest_page.php">Event Gallery</a>
				    </li>
		   		<!--	<li>
					    <a href="blog.html">Our Services</i></a>
				    </li>    -->
					<li><a href="contact.php">Contact Us</a></li>
					<li><a href="signup.php">Signup/login</a></li>
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

	<!-- Contact Form -->
	<div class="popup popup-overlay">
	    <button id="close-popup" class="popup__btn-close" aria-label="Close">close</button>
	    <div class="popup-inner">
		    <form method="post" id="contact-forms" data-toggle="validator">
			    <div class="container container_md">

			        <div class="row">

				        <div class="col-lg-6">
                            <div class="form-group">
						        <label for="Subject" class="label">Your Subject ..*</label>
                                <input type="text" class="form-control input" name="subject" id="phone" required data-error="Please, enter the subject." autocomplete="off">
						    </div>
				        </div>
			        </div>
                    <div class="row">
				        <div class="col-lg-12">
					        <div class="form-group">
						        <label for="message" class="label">Your Message ... *</label>
						        <textarea class="form-control input" name="message" id="message" rows="3" required data-error="Please, enter message."></textarea>
						    </div>
					        <div class="btn-block text-center">
							    <button type="submit" class="btn" name="sndmessage" >Send Message</button>
							    <div id="validator-contact" class="hidden"></div>
						    </div>
				        </div>
			        </div>
			    </div>
            </form>

	    </div>
	</div>
	<!-- /Contact Form -->

	<!-- JavaScripts -->
	<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="js/plugins.js" type="text/javascript"></script>
    <script src="js/common.js" type="text/javascript"></script>

    <!-- Google Maps
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRGVSzcdx25I5nhL5gzJwnaw3Q5vDHiGI"></script>
	<script src="js/map.init.js"></script>
	-->
</body>

<!-- Mirrored from netgon.net/artstyles/oliver/new/dark/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Jun 2020 15:27:38 GMT -->
</html>
