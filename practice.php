
  <?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

             require_once('pdo.php');
    session_start();

if(isset($_POST['signup'])){

  $stmp = $pdo->prepare('SELECT * FROM signups WHERE share_id = :em ');

  $stmp->execute(array( ':em' => $_POST['refer_id'] ));

  $rop = $stmp->fetch(PDO::FETCH_ASSOC);

$name="pppp";
$id="2";
echo $rop['name'];
$stmt = $pdo->prepare('INSERT INTO refer_1
 (refering_person_id, refering_person, refered_person_id, refered_person) VALUES ( :uname, :pwd, :mb, :em)');
 $stmt->execute(array(
         ':uname' => $rop['personid'],
         ':pwd' => $rop['name'],
         ':mb' => $id,
         ':em' => $name)
     );


     $stmt = $pdo->prepare('INSERT INTO refer_2
      (personid, name, joined_persons, contest_joins) VALUES ( :uname, :pwd, :mb, :em)');
      $stmt->execute(array(
              ':uname' => $rop['personid'],
              ':pwd' => $rop['name'],
              ':mb' => 0,
              ':em' => 0)
          );

     $stmo = $pdo->prepare('SELECT * FROM refer_2 WHERE person_id = :em ');

     $stmo->execute(array( ':em' => "1" ));

     $rom = $stmo->fetch(PDO::FETCH_ASSOC);
echo $rom['name'];

}

//$stmt = $pdo->prepare('INSERT INTO refer_1 (refering_person_id, refering_person, refered _person_id, refered_person )
//VALUES (value1, value2, value3, ...);');
 //$stmt->execute(array(
  //       ':uname' => $uname,
    //     ':pwd' => $pwd,
      //   ':mb' => $_REQUEST['mbno'],
        // ':em' => $email,
        // ':loc' => $location)
     //);







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




  <center>
<form method="post" class="box_form">
  <div class="form_box">
<label for="uname"><b>Refer ID</b></label>
<input type="text" placeholder="Enter Username" name="refer_id" autocomplete="on" required></br>
</div>
<div class="form_box">
<input type="submit" name="signup" value="Submit"  >
<input type="submit" name="cancel" value="Cancel"></br>
</div>

</form>



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

        <li><a href="about.html">About Us</a></li>
    <!--    <li><a href="about_onescreen.html">Our Team</a></li>    -->

    </li>

    <li>
      <a href="next_contest.php"> Current Events</a>
    </li>
    <li>
      <a href="contest_page.php">Event Gallery</a>
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

</body>
<html>
