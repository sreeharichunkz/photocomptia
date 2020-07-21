<?php include('server.php');
include('pdo.php');
session_start();
/*if (!isset($_SESSION['personid']) || strlen($_SESSION['personid']) < 1 ) {
die('<a href=signup.php>signup to continue</a>');
}*/
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Photocomptia</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="main.css">
  <script src="js/modernizr.custom.js" type="text/javascript"></script>
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
  <link rel="stylesheet" type="text/css" href="style/style.css"/>

</head>
<body>
  <div class="loading animated">
    <div class="loading-wrap animated bounceInLeft">
      <img class="logotype animated infinite bounceIn" src="img/logo1.png" alt="logo">
    </div>
</div>

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
      <a href="login.php"><b>Login</b></a>
    </div>
</nav>





<section class="section section_top-space-230 section_first">
  <div class="container">


    <article class="item-news item-news__main">
        <header class="item-news__header">
            <h5 class="title_h6 title_overhead">Happy Birthday !</h5>
            <h2 class="title title__h1">Fan Contest — Suriya.</h2>
        </header>


        <div class="item-news_paragraph item-news_paragraph_line">
            <p> Its Suriya's Birthday On 23/07/2020, so here what we can do. </p>
          <p>Put up the best photo of suriya and get maximum like on his photo so that you can win 5000 INR on his birthday. You can see the more details in "Read More" below.</p>
                   <center>
          <footer class="item-news__footer">
                <a class="btn" href="blog_single_image.html">Read More</a>
                      </footer>
                  </center>
                  </div>


</article>
</div>
</section>
<section class="section2">
<a href="coming_soon.html"><img class="sticky" src="img/Coming_soon.jpg" alt="Avatar" align="right"></a>
<center>
<div class="main">
  <?php foreach ($posts as $post): ?>
   <div class="post">
     <?php echo $post['text']; ?>
     <div class="post-info">
     <!-- if user likes post, style button differently -->
       <i <?php if (userLiked($post['id'])): ?>
           class="fa fa-thumbs-up like-btn"
         <?php else: ?>
           class="fa fa-thumbs-o-up like-btn"
         <?php endif ?>
         data-id="<?php echo $post['id'] ?>"></i>
       <span class="likes"><?php echo getLikes($post['id']); ?></span>

       &nbsp;&nbsp;&nbsp;&nbsp;

     <!-- if user dislikes post, style button differently -->

     </div>
   </div>
  <?php endforeach ?>
</div>
</center>
</section>
  <script src="scripts.js"></script>
  <center>
  <a href="coming_soon.html"><img class="mobview" src="img/Coming_soon.jpg" alt="Avatar" align="center"></a>

</center>

  <section class="section section-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-9 section__header-wrap">
            <h2 class="title title__h2 title_center title_normal"><span class="reveal reveal_gray">Sign up for our newsletter to receive new event updates.</span></h2>
        </div>
      </div>

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
  </section>
  <!-- /Newsletter -->

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

  <!-- Overlay Menu -->
  <div class="popup popup__menu">
      <div class="popup-inner">
            <div class="dl-menu__wrap dl-menuwrapper">
                <ul class="dl-menu dl-menuopen">
          <li>	<a href="index.html">Home</a>
        </li>
        <li>

            <li><a href="about.html">About Us</a></li>
        <!--    <li><a href="about_onescreen.html">Our Team</a></li>    -->

        </li>

        <li>
          <a href="blog_single_image.html"> Current Events</a>
        </li>
        <li>
          <a href="blog.html">Event Gallery</a>
        </li>
         <!--	<li>
          <a href="blog.html">Our Services</i></a>
        </li>    -->
        <li><a href="contact.html">Contact Us</a></li>
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





  <!-- JavaScripts -->
  <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
  <script src="js/plugins.js" type="text/javascript"></script>
    <script src="js/common.js" type="text/javascript"></script>

  </body>

  <!-- Mirrored from netgon.net/artstyles/oliver/new/dark/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Jun 2020 15:27:34 GMT -->
  </html>
