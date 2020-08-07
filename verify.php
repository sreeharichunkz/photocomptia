<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('config.php');

   require_once('pdo.php');
session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();


    }
}

if ($success === true)
{
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>
             <p  style='background-color:tomato;'>You will be informed when the contest is live</p>
                <p >check the contest page <a href='nature_contest.php'>here</a></p>";

             $sql = "UPDATE photoreg SET payment = 'Done'
                   WHERE photo_id = :yr ";
             $stmt = $pdo->prepare($sql);
             $stmt->execute(array(

                 ':yr' => $_SESSION['photo_id'] ));
////////////////////////////////////////////
            $sml="INSERT INTO `nature_post` (`text`, `added`) VALUES
                 (:yr, 0)";
                    $smt = $pdo->prepare($sml);
                    $smt->execute(array(

                    ':yr' => '<img src="contest/'.$_SESSION['image_name'].'" width="600"><p>By — '.$_SESSION['username'].'</p>'));
  /*
                        $stmt = $pdo->prepare('INSERT INTO nature_post
                         (text, added, mobno, email,photolink,photo_id) VALUES ( :id, :uname, :mb, :em, :link, :imgid)');
//////////////////////////////////////////////////////////////////////////////// */
$stml = $pdo->query("SELECT * FROM signups WHERE personid=".$_SESSION['personid']);
$row = $stml->fetch(PDO::FETCH_ASSOC);

if(!isset($_SESSION['contest_joined'])){
                 $_SESSION['contest_joined']=$row['contest_joined'];
$rs=$_SESSION['contest_joined'] +1;

              $sql = "UPDATE signups SET contest_joined =:rs
                       WHERE personid = :ys ";
                 $stmp = $pdo->prepare($sql);
                 $stmp->execute(array(
                    ':rs' => $rs,
                     ':ys' => $_SESSION['personid'] ));

$stkl = $pdo->query("SELECT * FROM refer_1 WHERE refered_person_id=".$_SESSION['personid']);
$rom = $stkl->fetch(PDO::FETCH_ASSOC);
if($rom!=false){
$sql = "UPDATE refer_1 SET contest_joined =:rs
         WHERE refered_person_id = :ys ";
   $stmp = $pdo->prepare($sql);
   $stmp->execute(array(
      ':rs' => $rs,
       ':ys' => $_SESSION['personid'] ));
}}
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

?>
<html>
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
<link rel="stylesheet" type="text/css" href="main.css"/>
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
  <a class="link_login" href="signin.php?page=next_contest.php"><b>LOGIN</b></a>
<?}?>
        </div>
	</nav></br></br></br></br></br></br>
  <center>
<?echo $html;?>
</center>





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

            <li><a href="about.php">About Us</a></li>
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


<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="js/plugins.js" type="text/javascript"></script>
  <script src="js/common.js" type="text/javascript"></script>

</body>

<!-- Mirrored from netgon.net/artstyles/oliver/new/dark/about_onescreen.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Jun 2020 15:27:38 GMT -->
</html>
