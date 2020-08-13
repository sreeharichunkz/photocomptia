<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

           require_once('pdo.php');
  session_start();

  if (!isset($_SESSION['personid']) || strlen($_SESSION['personid']) < 1 ) {
    $_SESSION['error']="Sign in to continue to that page";
   header("Location: signin.php?page=refer.php");
  }
  $stnl = $pdo->prepare('SELECT * FROM signups WHERE personid = :em ');

  $stnl->execute(array( ':em' => $_SESSION['personid'] ));

  $roj = $stnl->fetch(PDO::FETCH_ASSOC);


?>










<?if(isset($_SESSION['personid'])){?>


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
  <a class="link_login" href="signin.php?page=refer.php"><b>LOGIN</b></a>
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
					    Refer and Earn.
					</h2>
				</div>
			</div>
        </div>
        <div class="container">
           <center>
               <h3>Your Refferance code is : <? echo $roj['share_id']?></h3>
           </center>
           <br>
    <h4>Refer a Friend and Earn 5 Photocoins...</h4>
    <br><br>
  </div>
<div class="col-md-2 col-lg-3">
  <h5>Share with:</h5>
  <img src="img/facebook.png" width="40px" >


  <a href="https://api.whatsapp.com/send?text= Hi there, join a photo contest with me in photocomptia and use refferal code as <? echo $roj['share_id']?>  https://akhilsnair1047.github.io/Photocomptia/" data-action="share/whatsapp/share"><img src="img/whatsapp.png" width="35px" ></a>


  <!--img src="img/insta.png" width="40px" -->
  <a href="mailto:?subject=Cheak this contest&amp;body=Hi there, join a photo contest with me in photocomptia and use refferal code as 123bdhs. Check out this site https://akhilsnair1047.github.io/Photocomptia/"
 title="Share by Email"><img src="img/mail_icon_2.png" width="40px" ></a>



  </div>
<br><br>

<div class="row">
<div class="col-md-7 col-lg-1">
  <span><img src="img/mail_icon.png" style="width: 75px; "/></span>
</div>
<div class="col-md-7 col-lg-7">
  <br><b> You can refer a friend to join a contest using refferal code via mail, whatsapp etc.</b>
<br><br><br>
</div>
  </div>
<div class="row">
  <div class="col-md-7 col-lg-1">
  <span><img src="img/coin.png" style="width: 75px; "/></span>
    </div>
    <div class="col-md-7 col-lg-7">
  <br><b>On their first ever participation you get 5 photocoin reward.</b>
     </div>
</div>
<br><br>
<div class="row">
  <div class="col-md-7 col-lg-1">
<span><img src="img/bag.png" style="width: 75px;  "/></span>
  </div>
  <div class="col-md-7 col-lg-7">
   <br><b>Use these Coin to join a contest or use it in Bazar to get amazing deals.</b>
</div>
</div>
<br><br><br><br>


  <?  $stot = $pdo->query("SELECT * FROM refer_1 WHERE refering_person_id=".$_SESSION['personid']);
  $roi = $stot->fetch(PDO::FETCH_ASSOC);
  if($roi ==false){?>
    <h6>You have not reffered yet. Refer using the above code to get coins.</h6>
</br><?} else{?>  <center>
<h2>The People refered by you</h2></br></br>

<div class="refer_table">
<? $stot = $pdo->query("SELECT * FROM refer_1 WHERE refering_person_id=".$_SESSION['personid']);
$i=1;
echo('<table border="5">'."\n");
echo "<tr><td>";
echo("<b>Sl No</b>");
echo("</td><td>");
echo("<b>Name</b>");
echo("</td><td>");
echo("<b>Contest joined</b>");
echo("</td><td>");

while ( $roi = $stot->fetch(PDO::FETCH_ASSOC) ) {
echo ("<tr><td>");
echo $i;
echo("</td><td>");
echo(htmlentities($roi['refered_person']));
echo("</td><td>");
echo("<center>".$roi['contest_joined']."</center>");

$i++;


}
echo("</table>");
?>
</div></center>
<?}?>
</div>
</br>
    <div class="text-decoration text-decoration_bottom" data-100-start="transform[swing]:translateY(100px)" data--800-top="transform[swing]:translateY(-100px)">Refer</div>

	<!-- /About -->
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
    <script src="js/common.js" type="text/javascript"></script><?}
    else {
         header("Location: signin.php?page=refer.php");
    }?>

</body>

<!-- Mirrored from netgon.net/artstyles/oliver/new/dark/about_onescreen.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Jun 2020 15:27:38 GMT -->
</html>
