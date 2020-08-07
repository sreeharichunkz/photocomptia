<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require('config.php');
require('razorpay-php/Razorpay.php');
require_once('pdo.php');

if(isset($_POST['register'])){

    if(isset($_POST['photolink']) && strlen($_POST['photolink']) > 0){
         $link=$_POST['photolink'];
         $mbno=$_SESSION['mobno'];
         $email=$_SESSION['email'];
         $name=$_SESSION['username'];

                    $stmt = $pdo->prepare('INSERT INTO photoreg
                     (personid, name, mobno, email,photolink) VALUES ( :id, :uname, :mb, :em, :link)');
                     $stmt->execute(array(
                            ':id' => $_SESSION['personid'],
                             ':uname' => $name,
                             ':mb' => $mbno,
                             ':em' => $email,
                             ':link' => $link)
                         );

                     $_SESSION['success']="Record added";
                     header("Location: signin.php");
}
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
if(isset($_FILES['image'])){
   $errors= array();
   $file_name = $_FILES['image']['name'];
   $file_size =$_FILES['image']['size'];
   $file_tmp =$_FILES['image']['tmp_name'];
   $file_type=$_FILES['image']['type'];
   $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
 $name=$_SESSION['username'];
   $extensions= array("jpeg","jpg","png");
$imgname= $name.$photo_id.".".$file_ext;
   if(in_array($file_ext,$extensions)=== false){
      $errors[]="extension not allowed, please choose a JPEG or PNG file.";
   }

   if($file_size > 2097152){
      $errors[]='File size must be excately 2 MB';
   }


   if(empty($errors)==true){

     $mbno=$_SESSION['mobno'];
     $email=$_SESSION['email'];
     $name=$_SESSION['username'];
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


   }else{
      print_r($errors);
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
    "contact"           => $_SESSION['mobno'],

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
  <a class="link_login" href="signin.php?page=next_contest.php"><b>LOGIN</b></a>
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

<center><a id="open-popup" class="btn btn__contact" href="register.php">Register Now</a></br></br>
								<a class="btn" href="nature_contest.php">Contest Page</a></center>
						<footer class="item-news__footer">
					        <div class="share-post">
								<div class="btn-block" >


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
		        <!-- Comment Form -->        </div>
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

                <li><a href="myprofile.php">My Profile</a></li>
              </li>
             <li>

                 <li><a href="refer.php">Refer And Earn</a></li>

				    </li>
				    <li>

						    <li><a href="contest_page.php">Live contest</a></li>
					<!--    <li><a href="about_onescreen.html">Our Team</a></li>    -->

					</li>
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
