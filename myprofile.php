


<?

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$conn = mysqli_connect('localhost', 'roots', 'password', 'photo');
session_start();
$conn = mysqli_connect('localhost', 'roots', 'password', 'photo');
require('config.php');
require('razorpay-php/Razorpay.php');
require_once('pdo.php');


if (!isset($_SESSION['personid']) || strlen($_SESSION['personid']) < 1 ) {
  $_SESSION['error']="Sign in to continue to that page";
 header("Location: signin.php?page=myprofile.php");
}
$stmp = $pdo->prepare('SELECT * FROM signups WHERE personid = :id');

$stmp->execute(array( ':id' => $_SESSION['personid'] ));

$rop = $stmp->fetch(PDO::FETCH_ASSOC);


if(isset($_POST['submit']) && strlen($_POST['password']) > 0 ) {
//  $sql = "UPDATE signups SET password=:fn";
//  $stmt = $pdo->prepare($sql);

$sql = "UPDATE signups SET password = :mk
  WHERE personid = :yr ";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
':mk' =>$_POST['password'],
':yr' => $_SESSION['personid'] ));



              $_SESSION['success']="Your password changed successfully";
}
$slnl = $pdo->prepare('SELECT * FROM signups WHERE personid = :em ');

$slnl->execute(array( ':em' => $_SESSION['personid'] ));

$roj = $slnl->fetch(PDO::FETCH_ASSOC);

$sml = "SELECT COUNT(*) FROM refer_1
      WHERE refering_person_id = ".$_SESSION['personid']." AND contest_joined>='1'";


      $rs = mysqli_query($conn, $sml);
      $result = mysqli_fetch_array($rs);

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

    <style>
  input[type='text'], input[type='email'], input[type='password'], input[type='datetime'], input[type='date'], input[type='month'], input[type='time'], input[type='week'], input[type='search'], input[type='tel'], textarea,
textarea.form-profile {
  background-color: #111111;
  border: 1px solid #fff;
  border-radius: 0;
  box-shadow: none;
  color: #fff;
  font-weight: 300;
  height: 66px;
  width: 500px;
  letter-spacing: .05rem;
  padding-left: 30px;
  padding-right: 30px;
  position: relative;
  z-index: 2;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}
@media only screen and (max-width: 580px) {
  input[type='text'], input[type='email'], input[type='password'], input[type='datetime'], input[type='date'], input[type='month'], input[type='time'], input[type='week'], input[type='search'], input[type='tel'], textarea,
  textarea.form-profile {
    font-size: .86rem;
    height: 46px;
    padding-left: 15px;
    padding-right: 15px;
  }
}

input[type='text']:focus, input[type='email']:focus, input[type='password']:focus, input[type='datetime']:focus, input[type='date']:focus, input[type='month']:focus, input[type='time']:focus, input[type='week']:focus, input[type='search']:focus, input[type='tel']:focus, textarea:focus,
textarea.form-profile:focus {
  background-color: #111111;
  border-color: #fff;
  box-shadow: none;
  color: #fff;
  outline: none;
}

input._big {
  font-size: .86rem;
  height: 76px;
}
@media only screen and (max-width: 580px) {
  input._big {
    height: 46px;
  }
}

textarea,
textarea.form-profile {
  padding-top: 30px;
  padding-bottom: 30px;
  -ms-overflow-y: hidden !important;
  resize: none;
}
@media only screen and (max-width: 580px) {
  textarea,
  textarea.form-profile {
    padding-top: 15px;
    padding-bottom: 15px;
  }
}

.form-group {
  margin-bottom: 40px;
  position: relative;
}
@media only screen and (max-width: 580px) {
  .form-group {
    margin-bottom: 20px;
  }
}

.has-danger .form-profile {
  border-color: #5328fe;
  box-shadow: none;
}
.has-danger .form-profile:focus {
  border-color: #5328fe;
  box-shadow: none;
}
.has-danger .subscribe-form__inner .btn-subscribe {
  border-left: 1px solid #5328fe;
}

#validator-subscribe,
.validation-success,
.validation-danger {
  font-size: .86rem;
  letter-spacing: .2rem;
  padding-top: 15px;
  text-align: center;
}
@media only screen and (max-width: 580px) {
  #validator-subscribe,
  .validation-success,
  .validation-danger {
    padding-top: 10px;
  }
}

.validation-success {
  color: #fff;
}

.validation-danger {
  color: #fff;
}
input:read-only {
  background-color:#111111;
}
::placeholder,
.form-profile::placeholder {
  color: #fff;
  transition: all 0.3s cubic-bezier(0.7, 0, 0.3, 1);
}

:-ms-input-placeholder,
.form-profile:-ms-input-placeholder {
  color: #fff;
  opacity: 1;
  transition: all 0.3s cubic-bezier(0.7, 0, 0.3, 1);
}

:focus::placeholder {
  color: transparent;
}

:focus:-ms-input-placeholder {
  color: transparent;
}

input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
input:-webkit-autofill:active {
  transition: background-color 5000s ease-in-out 0s;
  -webkit-text-fill-color: #fff !important;
}

.label {
  display: block;
  font-weight: 500;
  letter-spacing: .1rem;
  padding-left: 30px;
  position: relative;
  text-transform: uppercase;
  transform: translateY(20px);
  transition: all 0.6s 0s cubic-bezier(0.7, 0, 0.3, 1);
  z-index: 3;
  pointer-events: none;
  position: absolute;
}
@media only screen and (max-width: 580px) {
  .label {
    padding-left: 15px;
    transform: translateY(10px);
  }
}

.is-completed .label {
  transform: translateY(-32px);
}
@media only screen and (max-width: 580px) {
  .is-completed .label {
    transform: translateY(-28px);
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
  <a class="link_login" href="signin.php?page=myprofile.php"><b>LOGIN</b></a>
<?}?>
        </div>
  </nav>
    <!-- /Header -->

    <!--Tab menu-->
    <section class="section section-works section_top-space-230 section_first">
    	<div class="container">
            <div class="tab">
                <button class="tablinks active" onclick="openCity(event, 'Profile')" id="defaultOpen">My Profile</button>
                <button class="tablinks" onclick="openCity(event, 'Event')">My Entries</button>
                <button class="tablinks" onclick="openCity(event, 'Coin')">Photo Coin</button>
              </div>
      <!--/tab menu-->
      <?
          if ( isset($_SESSION['success']) ) {
              echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
              unset($_SESSION['success']);
          }?>


   <!--My Profile-->

<div id="Profile" class="tabcontent">

            <div class="row">
			    <div class="col-12 section__header-wrap">
				    <h2 class="title_section title_h1 title_horizontal-line"><span class="reveal reveal_gray">My Profile</span></h2>
	             </div>


                <div class="col-lg-6">
                 <div class="form-group">
                     <label for="firstName" >First Name</label><br>
                     <input style="background-color:#111111;"  type="text" value="<?echo $rop['name']?>"class="form-profile input" id="firstName"  readonly>
                 </div>
             </div>
             <div class="col-lg-6">
                 <div class="form-group">
                     <label for="lastName" >Last Name</label>
                     <input type="text" Value="<?echo $rop['location']?>"class="form-profile input" id="lastName" readonly>
                 </div>
             </div>
         </div>
         <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="email" >Email</label>
                    <input type="email" Value="<?echo $rop['email']?>" class="form-profile input" id="email" readonly>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="phone" >Phone</label>
                    <input type="tel" Value="<?echo $rop['mobno']?>" class="form-profile input" id="phone" readonly>
                </div>
            </div>
        </div>
        <div class="btn-block text-center">
            <button type="submit" class="btn">Save Information</button>
            <div id="validator-contact" class="hidden"></div>
        </div>


        <br><br>
        <div class="container">
        <h3>Change Password</h3>
        <br>
          <form method="post">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">

                    <label for="password" >New Password</label>
                    <input type="password"  class="form-control input" id="password" name="password" required data-error="Please, enter your password" autocomplete="off">
                </div>
            </div>

        </div>
        <div class="btn-block text-center">
            <button type="submit" name="submit" class="btn">Change Password</button>
            <div id="validator-contact" class="hidden"></div>
        </div>
      </form>
        </div>
    </div>


   <!--/My profile-->

   <!--My events-->

   <div id="Event" class="tabcontent">


        <div class="col-12 section__header-wrap">
            <h2 class="title_section title_h1 title_horizontal-line"><span class="reveal reveal_gray">My Entries</span></h2>
         </div>
         <br>
         <h6>You have not taken part in any contest.</h6>

     </div>



   <!--/my events-->

   <!--coin-->
   <div id="Coin" class="tabcontent">


        <div class="col-12 section__header-wrap">
            <h2 class="title_section title_h1 title_horizontal-line"><span class="reveal reveal_gray">Photo Coin</span></h2>
         </div>








         <br>
         <h4>Your Coin Balance is <?php echo $result[0]*5;?> <img src="img/photoicon.png"></h4>
         <h6>you can reedem this coin for taking part in new events or you can transfer directly to your bank account.</h6>

     </div>


    </div>
</section>
   <!--/coin-->
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

						    <li><a href="refer.php">Refer And Earn</a></li>
					<!--    <li><a href="about_onescreen.html">Our Team</a></li>    -->

					</li>

					<li>
						<a href="next_contest.php">Reg:Next Contest</a>
					</li>
					<li>
					    <a href="contest_page.php">Live Contest </a>
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
    <script>
        function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
        </script>

	<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="js/plugins.js" type="text/javascript"></script>
    <script src="js/common.js" type="text/javascript"></script>

</body>

<!-- Mirrored from netgon.net/artstyles/oliver/new/dark/about_onescreen.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Jun 2020 15:27:38 GMT -->
</html>
