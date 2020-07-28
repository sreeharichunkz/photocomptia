

  <?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

             require_once('pdo.php');
    session_start();


  if(isset($_REQUEST['mbno'])){

  if(isset($_POST['signup'])){

      if(isset($_POST['uname']) && strlen($_POST['uname']) > 0 && isset($_POST['psw']) && strlen($_POST['psw']) > 0 ){
       $uname=$_POST['uname'];
          $pwd=$_POST['psw'];
          $mbno=$_REQUEST['mbno'];
          $email=$_POST['email'];
          $location=$_POST['location'];


          if(is_numeric($mbno)){
            if(strpos( $_POST['email'], '@') == true){
            require_once('pdo.php');

            $stmp = $pdo->prepare('SELECT * FROM signup WHERE email = :em || mobno = :mb');

            $stmp->execute(array( ':em' => $email, ':mb' => $_REQUEST['mbno'] ));

            $rop = $stmp->fetch(PDO::FETCH_ASSOC);
if($rop==false){

             $stmt = $pdo->prepare('INSERT INTO signups
              (name,password, mobno, email, location) VALUES ( :uname, :pwd, :mb, :em, :loc)');
              $stmt->execute(array(
                      ':uname' => $uname,
                      ':pwd' => $pwd,
                      ':mb' => $_REQUEST['mbno'],
                      ':em' => $email,
                      ':loc' => $location)
                  );

              $_SESSION['success']="Record added";
              header("Location: signin.php");


  $_SESSION['uname']=$uname;
   $_SESSION['pwd']=$pwd;
   $_SESSION['mbno']=$mbno;
  $_SESSION['email']=$email;
}
else{
  $_SESSION['failure'] = "Email or phoneNumber is already is registered";
}


}
else{  $_SESSION['failure'] = "Email is invalid";}
          } else{
              $_SESSION['failure'] = "year must be numeric";
          }
      } else{
      $_SESSION['failure']  = "All fields are required";
      }
  }
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
<link rel="stylesheet" type="text/css" href="main.css"/>
  	<!-- Modernizr -->
  	<script src="js/modernizr.custom.js" type="text/javascript"></script>

  </head>

  <body>
    <header>
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
      <h1 style="font-color:white;">Sign up</h1>
    </div>
<div id="open-overlay-nav" class="hamburger">
        <span class="hamburger__line"></span>
        <span class="hamburger__line"></span>
        <span class="hamburger__line"></span>
  <span class="hamburger__text">Menu</span>
    </div>
</nav>
</header>
    <!-- Header -->


<center> <h1></br></br>Sign up</h1></center>


    <?php

    if ( isset($_SESSION['failure']) ) {
        echo('<p style="color: red;">'.htmlentities($_SESSION['failure'])."</p>\n");
        unset($_SESSION['failure']);
    }
    if ( isset($_SESSION['success']) ) {
        echo('<p style="color: red;">'.htmlentities($_SESSION['success'])."</p>\n");
        unset($_SESSION['success']);
    }
    ?>
    <center>
  <form method="post" class="box_form">
    <div class="form_box">
  <label for="uname"><b>Username</b></label>
  <input type="text" placeholder="Enter Username" name="uname" autocomplete="on" required></br>
</div>
  <div class="form_box">
  <label for="psw"><b>Password</b></label>
  <input type="password" placeholder="Enter Password" name="psw" autocomplete="on"required></br>
</div>

  <div class="form_box">
  <label for="email"><b>Email</b></label>

  <input type="text" class="form_box_email"  placeholder="Enter Email" name="email" autocomplete="on"required></br>
</div>
<div class="form_box">
<label for=""><b>Location</b></label>

<input type="text" marginLeft=10px  placeholder="Enter Location" name="location" autocomplete="on"required></br>
</div>

  <div class="form_box">
  <input type="submit" name="signup" value="Submit" onclick="myFunction()" >
  <input type="submit" name="cancel" value="Cancel"></br>
</div>

</form>
<a href=signin.php>Sign in</a>


</center>

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

<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="js/plugins.js" type="text/javascript"></script>
  <script src="js/common.js" type="text/javascript"></script>
<?}
else{
  header("location: index111.html");}?>
</body>
<html>
