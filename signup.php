  <?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

             require_once('pdo.php');
    session_start();

  if(isset($_REQUEST['mbno'])){

    $stms = $pdo->prepare('SELECT * FROM signup WHERE mobno = :mb');

    $stms->execute(array( ':mb' => $_REQUEST['mbno'] ));

    $rom = $stms->fetch(PDO::FETCH_ASSOC);

    if($rom==false){


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

            $stmk = $pdo->prepare('SELECT * FROM signups WHERE email = :em || mobno = :mb');

            $stmk->execute(array( ':em' => $email, ':mb' => $_REQUEST['mbno'] ));

            $rop = $stmk->fetch(PDO::FETCH_ASSOC);
if($rop==false){

  do{
  $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
  // Output: 54esmdr0qf
  $refer_id = substr(str_shuffle($permitted_chars), 0, 6);
  $stmp = $pdo->prepare('SELECT * FROM signups WHERE share_id = :em');

  $stmp->execute(array( ':em' => $refer_id ));

  $ros = $stmp->fetch(PDO::FETCH_ASSOC);

}while($ros== true);

             $stmn = $pdo->prepare('INSERT INTO signups
              (name,password, mobno, email, location, share_id) VALUES ( :uname, :pwd, :mb, :em, :loc, :refer)');
              $stmn->execute(array(
                      ':uname' => $uname,
                      ':pwd' => $pwd,
                      ':mb' => $_REQUEST['mbno'],
                      ':em' => $email,
                      ':loc' => $location,
                    ':refer' => $refer_id)
                  );
//taking details from person shared
                  $stnl = $pdo->prepare('SELECT * FROM signups WHERE share_id = :em ');

                  $stnl->execute(array( ':em' => $_POST['refers'] ));

                  $roj = $stnl->fetch(PDO::FETCH_ASSOC);
//Taking details from same person

                  $stlh = $pdo->prepare('SELECT * FROM signups WHERE share_id = :em ');

                  $stlh->execute(array( ':em' => $refer_id ));

                  $rok = $stlh->fetch(PDO::FETCH_ASSOC);
//////////////////////////////////////////////////////////////////////////////////////
                  $stqt = $pdo->prepare('INSERT INTO refer_1
                   (refering_person_id, refering_person, refered_person_id, refered_person) VALUES ( :uname, :pwd, :mb, :em)');
                   $stqt->execute(array(
                           ':uname' => $roj['personid'],
                           ':pwd' => $roj['name'],
                           ':mb' => $rok['personid'],
                           ':em' => $rok['name'])
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
            <a href="index.php">
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

</br></br></br><center>
    <?php

    if ( isset($_SESSION['failure']) ) {
        echo('<p style="color: red;">'.htmlentities($_SESSION['failure'])."</p>\n");
        unset($_SESSION['failure']);
    }
    if ( isset($_SESSION['success']) ) {
        echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
        unset($_SESSION['success']);
    }
    ?></center>
    <center>
    </br></br>
  <form method="post" class="box_form">
    <div class="row">
          <div class="col-lg-6">
    <div class="form_box">
  <label for="uname"><b>Full Name</b></label>
  <input type="text" placeholder="Enter Username" name="uname" autocomplete="on" required></br>
</div></div>
  <div class="col-lg-6">

  <div class="form_box">
  <label for="psw"><b>Password</b></label>
  <input type="password" placeholder="Enter Password" id="psw" name="psw" autocomplete="on" pattern="(?=.*\d)(?=.*[a-z]).{8,}" title="Must contain at least one number and more than 8 characters" required></br>
</div>
</div>
</div>
<div class="row">

      <div class="col-lg-6">
  <label for="email"><b>Email</b></label>

  <input type="text" class="form_box_email"  placeholder="Enter Email" name="email" autocomplete="on"required></br>
</div>
 <div class="col-lg-6">
<label for="location"><b>Location</b></label>

<input type="text" marginLeft=10px  placeholder="Enter Location" name="location" autocomplete="on"required></br>
</div></div>

<div class="form_box" id="refer_id">
<label for="refers"><b>Referal ID</b></label>

<input type="text" marginLeft=10px  placeholder="Referal ID (OPTIONAL)" name="refers" autocomplete="on"></br>
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
        <li>	<a href="index.php">Home</a>
      </li>
      <li>

          <li><a href="myprofile.php">My Profile</a></li>
      <!--    <li><a href="about_onescreen.html">Our Team</a></li>    -->
    </li>
    <li>

        <li><a href="refer.php">Refer And Earn</a></li>
      </li>

      <li>
        <a href="next_contest.php">Reg:Next Contest</a>
      </li>
      <li>
        <a href="contest_page.php">Live Contest</a>
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
<?}
else{$_SESSION['error']="Your mobile no is already registered signin to continue";
  header("location: signin.php");

}}
else{

  header("location: signupotp.html");}?>

  <script>
  var myInput = document.getElementById("psw");
  var letter = document.getElementById("letter");
  var capital = document.getElementById("capital");
  var number = document.getElementById("number");
  var length = document.getElementById("length");

  // When the user clicks on the password field, show the message box
  myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
  }

  // When the user clicks outside of the password field, hide the message box
  myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
  }

  // When the user starts to type something inside the password field
  myInput.onkeyup = function() {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if(myInput.value.match(lowerCaseLetters)) {
      letter.classList.remove("invalid");
      letter.classList.add("valid");
    } else {
      letter.classList.remove("valid");
      letter.classList.add("invalid");
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if(myInput.value.match(upperCaseLetters)) {
      capital.classList.remove("invalid");
      capital.classList.add("valid");
    } else {
      capital.classList.remove("valid");
      capital.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if(myInput.value.match(numbers)) {
      number.classList.remove("invalid");
      number.classList.add("valid");
    } else {
      number.classList.remove("valid");
      number.classList.add("invalid");
    }

    // Validate length
    if(myInput.value.length >= 8) {
      length.classList.remove("invalid");
      length.classList.add("valid");
    } else {
      length.classList.remove("valid");
      length.classList.add("invalid");
    }
  }
  </script>







  <script>
  document.getElementById('sign-out').addEventListener('click', function() {
    firebase.auth().signOut();
  });
    </script>
</body>
<html>
