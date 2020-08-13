<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require('config.php');
require('razorpay-php/Razorpay.php');
require_once('pdo.php');
if (!isset($_SESSION['personid']) || strlen($_SESSION['personid']) < 1 ) {
  $_SESSION['error']="Sign in to continue to that page";
 header("Location: signin.php?page=register.php");
}
?>
<style>
#btns2{

  pointer-events: none;
cursor: default;
}</style>

<?
if(isset($_POST['pay_with_coin'])){

$_SESSION['payed_with_coin'] ="User payed with coin";
$stkk = $pdo->query("SELECT * FROM coins WHERE person_id =".$_SESSION['personid']);

$pom = $stkk->fetch(PDO::FETCH_ASSOC);
///////////////////
$_SESSION['coin']=$pom['coin'] -20;
///////////////////////
     $sjl =  "UPDATE coins SET coin = :rs
              WHERE person_id = :ys";
        $somp = $pdo->prepare($sjl);
        $somp -> execute(array(
            ':rs' => $_SESSION['coin'],
            ':ys' => $_SESSION['personid'] ));
               header("Location: verify.php");
}






do{
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
// Output: 54esmdr0qf
$photo_id = substr(str_shuffle($permitted_chars), 0, 4);
$stmp = $pdo->prepare('SELECT * FROM photoreg WHERE photo_id = :em');

$stmp->execute(array( ':em' => $photo_id ));

$rop = $stmp->fetch(PDO::FETCH_ASSOC);

}while($rop== true);

$_SESSION['photo_id']=$photo_id;
$mbno=$_SESSION['mobno'];
$email=$_SESSION['email'];
$name=$_SESSION['username'];
if(isset($_FILES['image'])){
   $errors= array();
   $file_name = $_FILES['image']['name'];
   $file_size =$_FILES['image']['size'];
   $file_tmp =$_FILES['image']['tmp_name'];
   $file_type=$_FILES['image']['type'];
   $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
 $name=$_SESSION['username'];
   $extensions= array("jpeg","jpg","png");

   if(in_array($file_ext,$extensions)=== false){
      $_SESSION['failure']="extension not allowed, please choose a JPEG or PNG file.";
   }

   if($file_size > 2097152){
      $_SESSION['failure']='File size must be excately 2 MB';
   }


   if(empty($errors)==true){
$imgname= $name.$photo_id.".".$file_ext;
$_SESSION['image_name']=$imgname;
      move_uploaded_file($file_tmp,"contest/".$imgname);
      echo "Success";
      $stmt = $pdo->prepare('INSERT INTO photoreg
       (personid, name, mobno, email,photolink,photo_id) VALUES ( :id, :uname, :mb, :em, :link, :imgid)');
       $stmt->execute(array(
              ':id' => $_SESSION['personid'],
               ':uname' => $name,
               ':mb' => $mbno,
               ':em' => $email,
               ':imgid' => $photo_id,
               ':link' => $imgname)
           );

    $_SESSION['success']="Your Photo is uploaded successfully Pay to continue Or reupload if needed";
   }else{
      echo $errors;
   }
}
// Create the Razorpay Order
use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);
//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => 3456,
    'amount'          => 1 * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "Photocomptia",
    "description"       => "Join our contest",
    "image"             => "logo1.png",
    "buttontext"        => "Pay to join the contest",
    "prefill"           => [

    "name"              => "dfdf",
    "email"             => $_SESSION['email'],
    "contact"           => $mbno,

    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);



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
  <a class="link_login" href="signin.php?page=register.php"><b>LOGIN</b></a>
<?}?>
        </div>
	</nav>
    <!-- /Header -->
    <!-- Blog Singel -->
	<section class="section news-singel section_first">
	    <div class="container">
		    <!-- Post -->

        <div class="container container_md">
     					<div class="row">
			<!-- /Post -->
<div class="col-lg-12">
<center>
<?

   if ( isset($_SESSION['failure']) ) {
       echo('<p style="color: red;">'.htmlentities($_SESSION['failure'])."</p>\n");
       unset($_SESSION['failure']);
   }

   if ( isset($_SESSION['success']) && !isset($_SESSION['failure'])) {
       echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
       unset($_SESSION['success']);
   }?>


		<h2>Register Here -</h2> <br>



  </center>


            <!-- Comment Form -->
                                   <h3> Upload your photo in the below tab and then sumbit. If you want to change your photo, you can always click that link again to re-upload the photo.
        							 </h3> <br> <br>



<center>



  <form action="" method="POST" enctype="multipart/form-data">
    <center>
     <input type="file" name="image" /></br><center>
     <input type="checkbox"  required class="largerCheckbox"><h7> By clicking on this you will agree to our <a href="terms.html">Terms and conditions.</a> </h7>
 <?
 $stmp = $pdo->prepare('SELECT * FROM photoreg WHERE photo_id = :id');

 $stmp->execute(array( ':id' => $photo_id ));

 $rop = $stmp->fetch(PDO::FETCH_ASSOC);
 if(isset($imgname)) {?>

<img src ='<?echo ""."contest/".$rop['photolink']."" ?>' width="100" height="100"> <?}?>
</br></br> <input   type="submit"/>

 </form></center></br>
<center>

  <?if(isset($imgname)) {
    $stkk = $pdo->query("SELECT * FROM coins WHERE person_id =".$_SESSION['personid']);

    $pom = $stkk->fetch(PDO::FETCH_ASSOC);
if($pom['coin'] >=20){?>
  <form method="post">
  <button type="submit" class="btn" id="btns" name="pay_with_coin" >Pay with 20<img src="img/photoicon.png"></button></form></br>
<?}else{?>
  <form method="post">
  <button type="submit" class="btn" id="btns2" name="pays2" >20<img src="img/photoicon.png"></br>
  Sry you dont have enough coin</button></form></br>
<?}

    ?>
<p>OR PAY WITH RS 10</P>
 <div class="pay">

            <?  require("checkout/{$checkout}.php");
            }


            ?>
</div>
</center>    <!-- /Comment Form -->


        </div>
      </div>
    </div>
  </div>

	        <!-- /Comments -->

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

</body>

<!-- Mirrored from netgon.net/artstyles/oliver/new/dark/coming_soon.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Jun 2020 15:27:50 GMT -->
</html>
