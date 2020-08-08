<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
   require_once('pdo.php');
if(isset($_POST['signin'])){
    if(isset($_POST['uname']) && strlen($_POST['uname']) > 0 && isset($_POST['psw']) && strlen($_POST['psw']) > 0 ) {

   $stmt = $pdo->prepare('SELECT * FROM signups WHERE mobno = :em OR email = :em AND password = :pw');

   $stmt->execute(array( ':em' => $_POST['uname'], ':pw' => $_POST['psw']));

   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   if ( $row !== false ) {

   $_SESSION['username'] = $row['name'];
   $_SESSION['email'] = $row['email'];
   $_SESSION['mobno'] = $row['mobno'];
   $_SESSION['personid'] = $row['personid'];

   // Redirect the browser to index.php
if(isset($_REQUEST['page'])){

   header("Location: ".$_REQUEST['page']);
}
else{
   header("Location: index.php");
}
   return;
        }
        else {
               error_log("Login fail ".$_POST['email']." $check");
               $_SESSION['error'] = "Incorrect password";
                 header("Location: signin.php");
                 return;
           }


  }
  else{
    $_SESSION['error']="Enter the Password";
  }
}

if(isset($_POST['frgpsw'])) {

  $stmq = $pdo->prepare('SELECT * FROM signups WHERE email = :em OR mobno = :pw');

  $stmq->execute(array( ':em' => $_POST['uname'], ':pw' => $_POST['uname']));

  $roo = $stmq->fetch(PDO::FETCH_ASSOC);
  if($roo==true){
    $_SESSION['error']="Password changing url will be send to your registered email or mobile within 12hrs as per security concerns";


    $stmn = $pdo->prepare('INSERT INTO forget_password
     (name, mbno, email, person_id) VALUES ( :uname, :mb, :em, :pk)');
     $stmn->execute(array(

             ':uname' => $roo['name'],
             ':mb' => $roo['mobno'],
             ':em' => $roo['email'],
           ':pk' => $roo['personid'])
         );
  }
else {
    $_SESSION['success']="The submitted mobile number and email are not registered";

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
 <link rel="stylesheet" type="text/css" href="main.css"/>
   <!-- Modernizr -->
   <script src="js/modernizr.custom.js" type="text/javascript"></script>


   <script src="js/modernizr.custom.js" type="text/javascript"></script>
    <script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
    <script>
      var config = {
        apiKey: "AIzaSyA1rRG77hpoYS3i6moo900KD8GR1wQ5Kh8",
        authDomain: "okcredit-7535e.firebaseapp.com",
        databaseURL: "https://okcredit-7535e.firebaseio.com",
        projectId: "okcredit-7535e",
        storageBucket: "okcredit-7535e.appspot.com",
        messagingSenderId: "870984863712"
      };
      firebase.initializeApp(config);
    </script>
     <script src="https://cdn.firebase.com/libs/firebaseui/2.3.0/firebaseui.js"></script>
     <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/2.3.0/firebaseui.css" />
     <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<style>
#message {
  display:none;
  background:#000;
  color: #f1f1f1 ;
  position: relative;
  padding: 2px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 15px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>
 </head>

 <body>
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
     <h1 style="font-color:white;">Sign in</h1>
   </div>
 <div id="open-overlay-nav" class="hamburger">
       <span class="hamburger__line"></span>
       <span class="hamburger__line"></span>
       <span class="hamburger__line"></span>
 <span class="hamburger__text">Menu</span>
   </div>
   <div class="hamburger__login">

     <a class="link_login" href="signup.php"><b>SIGNUP</b></a>

       </div>
 </nav>

    <center> <h1></br></br></br>Sign In</h1></center>
</br><center>
     <?php
     if ( isset($_SESSION['error']) ) {
         echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
         unset($_SESSION['error']);
     }
     if ( isset($_SESSION['failure']) ) {
         echo('<p style="color: red;">'.htmlentities($_SESSION['failure'])."</p>\n");
         unset($_SESSION['failure']);
     }
     if ( isset($_SESSION['success']) ) {
         echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
         unset($_SESSION['success']);
     }
     ?>
</center>
<center>

  <form method="post">
    <div class="signin_box">
    <label for="uname"><b>Email/Mobile no</b></label>
    <input type="text" placeholder="Enter Email/Mobile number" name="uname" id="psw" title="Enter mobile no with country code example:919876543210" required>

    <div id="message">

      <p id="letter"<b>Registered Mobile number with country code  without space in between eg:919876543210  (dont use "+" )</b></p>
      <p id="capital" ><b>Or Valid registered email </b></p>

    </div>
</div>
    <div class="signin_box">
    <label for="psw"><b>Password &nbsp&nbsp&nbsp&nbsp&nbsp</b>&nbsp&nbsp&nbsp&nbsp</label>
    <input type="text" placeholder="Enter Password" name="psw" >
</div>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <button type="submit" name="signin" >Login</button>
      <button type="button" class="cancelbtn">Cancel</button>

  </div></br>
</br>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" name="frgpsw" >FORGOT PASSWORD</button>
</form>
<div id="sign-out">
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="signup.php">Signup</a></div>
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

        <li><a href="refer.php">REfer And Earn</a></li>
      </li>

      <li>
        <a href="next_contest.php">Reg:Next Context</a>
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


  <script src="app.js"></script>
<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="js/plugins.js" type="text/javascript"></script>
  <script src="js/common.js" type="text/javascript"></script>

</body>
<html>
