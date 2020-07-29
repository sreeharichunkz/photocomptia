<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once('pdo.php');

if(isset($_POST['register'])){

    if(isset($_POST['photolink']) && strlen($_POST['photolink']) > 0){
         $link=$_POST['photolink'];
         $mbno=$_SESSION['mobno'];
         $email=$_SESSION['email'];
         $name=$_SESSION['username'];

                    $stmt = $pdo->prepare('INSERT INTO photoreg
                     (name, mobno, email,photolink) VALUES ( :uname, :mb, :em, :link)');
                     $stmt->execute(array(
                             ':uname' => $name,
                             ':mb' => $mbno,
                             ':em' => $email,
                             ':link' => $link)
                         );

                     $_SESSION['success']="Record added";
                     header("Location: signin.php");


}
}
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
            <a href="index.html">
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
  <a class="link_login" href="signin.php"><b>LOGIN</b></a>
<?}?>
        </div>
	</nav>
    <!-- /Header -->
    <!-- Blog Singel -->
	<section class="section news-singel section_first">
	    <div class="container">
		    <!-- Post -->
			<article class="item-news item-news__main">
					<header class="item-news__header">
					    <h2 class="title title__h1">Contest — Nature Photography.</h2>
						<h6 class="title__h6 title__overhead">Open ON – 1 Aug 2020</h6>
					</header>
					<figure class="media-content">
					    <span class="reveal">
						    <img class="news-image" src="img/32_image.jpg" alt="News">
						</span>
				    </figure>
					<div class="item-news__paragraph">
					  	<blockquote class="block-quote block-quote_center">
					        <p>Capture the nature. — Win ₹5000/- </p>
							— <cite>Registration — ₹10/- </cite>
						</blockquote>
						<h2>How to Participate — </h2>

						<p>You have to upload the image below as " Google photos " or " Google Drive " link. This is done to retain the image quality. In the same link you have to upload screenshot of the payment.  </p>
						<p>The image will be processed and then it will be uploaded. Please be honest and upload photo that is taken by you only. If found that you are going against the terms, then you will be disqualifed. Don't worrier about the payment we will return back.</p>
						<p>* please note — You have to upload both Photograph and payment screenshot in the link and the you have to sumbit. If you have any doubts contact as on the below mentioned mail id. </p>
				<!--		<p>You have to upload the image below as " Google photos " or " Google Drive " link. This is done to retain the image quality. In the same link you have to upload screenshot of the payment.  </p>
						<p>The image will be processed and then it will be uploaded. Please be honest and upload photo that is taken by you only. If found that you are going against the terms, then you will be disqualifed. Don't worrier about the payment we will return back.</p>
						<p>* please note — You have to upload both Photograph and payment screenshot in the link and the you have to sumbit. If you have any doubts contact as on the below mentioned mail id. </p>
				-->
						<br>
						<h4>Payment to be done on UPI ID: photocomptia@ybl</h4>
						<br>
						<br>


						<footer class="item-news__footer">
					        <div class="share-post">
								<div class="btn-block" >
									<a class="btn" href="event_gallery.html">Contest Gallery</a>
								   </div>
					<!--				<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i><span>Facebook</span></a>
							    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i><span>Tweet</span></a>
						    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i><span>Google Plus</span></a>
								<a class="like-post" href="#"><i class="fa fa-heart" aria-hidden="true"></i><span>1</span></a>
				-->
						    </div>
					    </footer>
					</div>
			</article>
			<!-- /Post -->

		<h2>Register Here -</h2> <br> <br>
		        <!-- Comment Form -->
		        <form method="post" class="comment-form">

                    <div class="row">
				        <div class="col-md-12">
					        <div class="form-group">
							    <label for="message" class="label">Google Drive/Photos Link of photo and payment proof which contain transation ID *</label>
						        <textarea class="form-control input" id="message" rows="1" name="photolink" required></textarea>
							</div>
					        <div class="btn-block">
							    <button type="submit" name="register" class="btn">Register</button>
							</div>
				        </div>
			        </div>
                </form>
                <!-- /Comment Form -->
	        </div>
	        <!-- /Comments -->
		</div>
	</section>
    <!-- /Blog -->

	<!-- Coming Soon -->
    <section class="section section-bg section-onescreen" style="background-image: url(img/hero-image6.png);">
	    <!--div class="container container-flex">
		    <div class="row justify-content-center">
			    <div class="col-12 col-md-12 col-lg-9">
			      <h2 class="title title__h2 title_center title_normal"><span class="reveal reveal_gray">Contest will begin soon. Till then subscribe to get updates of the events.</span></h2>
				  <p>
				</div>
                <div class="col-lg-12">
			        <div class="form-group">
				        <form class="subscribe-form" data-toggle="validator">
				            <div class="subscribe-form__inner">
					            <input type="email" class="form-control _big email_valid" placeholder="Enter your email address" required data-error="Please, enter your email.">
					            <button type="submit" class="btn-subscribe">OK</button>
					        </div>
					        <div id="validator-subscribe" class="hidden"></div>
				        </form>
			        </div>
				</div>
			</div>
		</div=-->

	    <div class="container footer text-center">
		    <div class="row">

			    <div class="col-md-6 col-lg-4">
				    <h5 class="title title__h6 text_uppercase">Get in touch</h5>
				    <ul class="footer__contacts list-unstyled">

						<li><a href = "mailto: photocomptia@gmail.com">E.:photocomptia@gmail.com</a></li>

				    </ul>
				</div>
			    <div class="col-md-6 col-lg-4">
				    <h5 class="title title__h6 text_uppercase">Social</h5>
				    <ul class="footer__contacts list-unstyled">
					    <li>Connect with me on <a class="link_decoration" href="#">facebook</a>,<a class="link_decoration" href="#">twitter</a> or <a class="link_decoration" href="https://www.instagram.com/photocomptia/">instagram</a></li>
				    </ul>
				</div>
			</div>
		</div>
	</section>
    <!-- /Coming Soon -->

	<!-- Overlay Menu -->
	<div class="popup popup__menu">
	    <div class="popup-inner">
            <div class="dl-menu__wrap dl-menuwrapper">
                <ul class="dl-menu dl-menuopen">
					<li>
					    <a href="index.html">Home</a>
				    </li>
				    <li>

						    <li><a href="about.html">About Us</a></li>
					<!--    <li><a href="about_onescreen.html">Our Team</a></li>    -->

					</li>

					<li>
						<a href="blog_single_image.html"> Current Events</a>
					</li>
					<li>
					    <a href="event_gallery.html">Event Gallery </a>
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

<!-- Mirrored from netgon.net/artstyles/oliver/new/dark/coming_soon.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Jun 2020 15:27:50 GMT -->
</html>
