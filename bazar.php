<?
include('pdo.php');
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_POST['amazon_voucher'])) {
  if (!isset($_SESSION['personid']) || strlen($_SESSION['personid']) < 1 ) {
    $_SESSION['error']="Sign in first to redeem in the bazar";
   header("Location: signin.php?page=bazar.php");
 }else{?>
  <style>
#btns{

  pointer-events: none;
cursor: default;
}btns:hover {
  background-color: yellow;
}

  </style><?
 }
}

if(isset($_POST['forest_contest'])) {
  if (!isset($_SESSION['personid']) || strlen($_SESSION['personid']) < 1 ) {
    $_SESSION['error']="Sign in first to redeem in the bazar";
   header("Location: signin.php?page=bazar.php");
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
	<meta http-equiv="etag" content="2efdc27c8967f14e2c829e601f7a1228"/>
<meta property="og:title" content="Photocomptia"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="http://akhilsnair1047.github.io/Photocomptia"/>
<meta property="og:image" content="http://akhilsnair1047.github.io/Photocomptia/img/05_image.jpg"/>
<meta property="og:site_name" content="Photo Competions and Events"/>
<meta property="og:description" content="Participate in the contest and win amazing goodies and prizes!"/>
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE"/>


	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="144x144" href="images/favicons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="57x57" href="images/favicons/apple-touch-icon-57x57.png">
	<link rel="shortcut icon" href="images/favicons/favicon.png" type="image/png">

    <!-- Styles -->
	<link rel="stylesheet" type="text/css" href="style/style.css"/>
	<style>
        .redeem{
            margin-top: 110px;

        }
        @media only screen and (max-width: 991px) {
          .redeem {
             margin-top: 70px;
           }
         }@media only screen and (max-width: 768px) {
          .redeem {
             margin-top: 30px;
           }
         }
        @media only screen and (max-width: 580px) {
          .redeem {
             margin-top: 12px;
           }
         }
        </style>
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
  <a class="link_login" href="signin.php?page=bazar.php"><b>LOGIN</b></a>
  <?}?>
        </div>
	</nav>
	<!-- /Header -->

	<!-- About -->
	<section class="section section-history section_no-space-bottom section_first">
    	<div class="container">
            <div class="row">
			    <div class="col-12 section__header-wrap">
				    <h2 class="title__section title__h1 title_horizontal-line"><span class="reveal reveal_gray">Bazar</span></h2>
                    <p class="section__subtitle">Redeem — Use your coin in bazar to redeem amazing deals. You can also use your coin to join to a contest.</p>

                </div>
            </div>




<div class="row">
<div class="col-md-6 col-lg-4">
      <img src="images/amazon.png" alt="no image"></p>
</div>


<div class="col-md-6 col-lg-6">
<h4>Get Amazon gift Card worth ₹1000 for free</h4>
<h6>Redeem now with 599 coins</h6>
<div class="redeem">
<div class="btn-block text-center"><form method="post">
    <button type="submit" class="btn" id="btns" name="amazon_voucher" >Redeem Now</button></form>
    <div id="validator-contact" class="hidden"></div>
</div>
</div>
</div>
</div>
  <br>


    <div class="row">
        <div class="col-md-6 col-lg-4">
              <img src="img/hero-image6.png" alt="no image"></p>
        </div>


        <div class="col-md-5 col-lg-6">
        <h4>Join the Forest contest for free</h4>
        <h6>Redeem now with 20 coins - You can redeem this from the contest page.</h6>
        <div class="redeem">
        <div class="btn-block text-center"><form method="post">
            <button type="submit" name="forest_contest" class="btn">Go to Contest</button>
</form>
        </div>
        </div>
        </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                  <img src="img/image_news_01.jpg" alt="no image"></p>
            </div>


            <div class="col-md-5 col-lg-6">
            <h4>Join the Nature contest for free</h4>
            <h6>Redeem now with 20 coins - You can redeem this from the contest page.</h6>
            <div class="redeem">
            <div class="btn-block text-center">

                <h4>—EXPIRED</h4>
                <!--button type="submit" class="btn">Redeem Now</button>
                <div id="validator-contact" class="hidden"></div-->
            </div>
            </div>
            </div>
            </div>

</div>
</div>
                </div>

             </div>
        </div>
     </section>
  <br><br><br><br><br><br>
    <div class="text-decoration text-decoration_bottom" data-100-start="transform[swing]:translateY(100px)" data--800-top="transform[swing]:translateY(-100px)">Bazar</div>

	<!-- /About -->
	<section class="section section-bg section-onescreen" style="background-image: url(img/hero-image6.png);">
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

	<!-- Overlay Menu -->
  <div class="popup popup__menu">
        <div class="popup-inner">
              <div class="dl-menu__wrap dl-menuwrapper">
                  <ul class="dl-menu dl-menuopen">
            <li>
                <a href="index.php">Home</a>
            </li>
        <li>
          <a href="#">Profile <i class="fa fa-angle-down" aria-hidden="true"></i></a>
          <ul class="dl-submenu">
            <li>
                <a href="myprofile.php">My Profile</i></a>
            </li>
            <li>
                <a href="refer.php">My Referals</a>
            </li>
            <li>
              <a href="bazar.php">bazar</a>
            </li>

          </ul>
        </li>
                  <li><a href="about.php">About Us</a></li>
            <!--    <li><a href="about_onescreen.html">Our Team</a></li>    -->

            </li>
          <li>
            <a href="#">Contest <i class="fa fa-angle-down" aria-hidden="true"></i></a>
          <ul class="dl-submenu">
            <li>
              <a href="next_contest.php"> Current Events</a>
            </li>
            <li>
                <a href="nature_contest.php">Event Gallery </a>
            </li>
          </ul>
          </li>
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
	<script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
          modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        </script>

</body>

<!-- Mirrored from netgon.net/artstyles/oliver/new/dark/about_onescreen.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Jun 2020 15:27:38 GMT -->
</html>
