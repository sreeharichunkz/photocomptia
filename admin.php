<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if(isset($_POST['signin'])){
    if(isset($_POST['uname']) && strlen($_POST['uname']) > 0 && isset($_POST['psw']) && strlen($_POST['psw']) > 0 ){

      require_once('pdo.php');

   $stmt = $pdo->prepare('SELECT * FROM admin WHERE username = :em AND password = :pw');

   $stmt->execute(array( ':em' => $_POST['uname'], ':pw' => $_POST['psw']));

   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   if ( $row !== false ) {

   $_SESSION['adminname'] = $_POST['uname'];

   $_SESSION['mobno'] = $row['mobno'];

   // Redirect the browser to index.php
   $_SESSION['success'] = "welcome ".$_SESSION['name'];
   header("Location: navadmin.php");

   return;
        }
        else {
               error_log("Login fail ".$_POST['email']." $check");
               $_SESSION['error'] = "Incorrect password";
                 header("Location: signin.php");
                 return;
           }


  }
}

 ?>


<!DOCTYPE html>
<html>
<head>
  <title>admin login</title>
</head>
<body>
<form method="post">
<label for="uname"><b>Username</b></label>
<input type="text" placeholder="Enter Username" name="uname" required>

<label for="psw"><b>Password</b></label>
<input type="password" placeholder="Enter Password" name="psw" required>

<input type="submit" name="signin" value="Log In">
<input type="submit" name="cancel" value="Cancel">
</form>
</body>
</html>
