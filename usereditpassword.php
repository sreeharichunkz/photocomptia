<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
 require_once('pdo.php');
$id=$_REQUEST['personid'];
if(isset($_POST['submits']))
{ if(isset($_POST['submits']) && strlen($_POST['npsw']) > 0 && $_POST['npsw'] == $_POST['npsw2'] ) {
//  $sql = "UPDATE signups SET password=:fn";
//  $stmt = $pdo->prepare($sql);

$sql = "UPDATE signups SET password = :mk
   WHERE personid = :yr ";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
 ':mk' =>$_POST['npsw'],
 ':yr' => $id ));

 header("Location: signin.php");
   $_SESSION['success']="Your password is changed successfully";
}
else {
    $_SESSION['error']="Enter valid and same password in both the fields";
}}
$pass=$_REQUEST['password'];

   $stmt = $pdo->prepare('SELECT * FROM signups WHERE personid = :em');

    $stmt->execute(array( ':em' => $_REQUEST['personid']));

    $row = $stmt->fetch(PDO::FETCH_ASSOC);


 ?>




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
  </nav>
</br>
</br>
</br>
</br>
</br>
</br>
<div class="edpas">
<? if($row['password'] == $pass){?>
  <div class="edpas">
    <center>
    <?     if ( isset($_SESSION['error']) ) {
           echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
           unset($_SESSION['error']);

        }?>
      <h2>Dear <? echo $row['name']  ?> update your new password</h2>
  <form method="POST">
    <label for="npsw"><b>Password</b></label>

    <input type="text" placeholder="new password" name="npsw"></br></br>
    <label for="npsw2"><b>Re Password</b></label>
<input type="text" placeholder="retype password" name="npsw2"></br>
  <input type="submit" value="update password" name="submits" /></br>
</form>
</center>
</div>
<?
}
else{?>
</br>
</br>
</br>
</br>
</br>
<center>
<h2>Sorry URL NOT FOUND</h2><a href=login.php>LOGIN IN NOW</a>
</center>
<? }
?>





<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="js/plugins.js" type="text/javascript"></script>
  <script src="js/common.js" type="text/javascript"></script>

</body>
<html>
