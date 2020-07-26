<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


   require_once('pdo.php');
session_start();
if (!isset($_SESSION['adminname']) || strlen($_SESSION['adminname']) < 1 ) {
die('Not logged in');
}

    // If the user requested logout go back to index.php
    if ( isset($_POST['logout']) ) {
        header('Location: logout.php');
        return;
    }
?>
<!DOCTYPE html>
<html>

<head>
<title>admin panel</title>
</head>
<body>
    <h1>Account details</h1>
    <?php    if ( isset($_SESSION['success']) ) {
            echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
            unset($_SESSION['success']);
        }


        echo('<table border="1">'."\n");
        echo "<tr><td>";
        echo("<b>User_id</b>");
        echo("</td><td>");
        echo("<b>Username</b>");
        echo("</td><td>");
        echo("<b>Password</b>");
        echo("</td><td>");
        echo("<b>Mobile no</b>");
        echo("</td><td>");
        echo("<b>Email</b>");
        echo("</td><td>");
        echo("<b>Location</b>");
        echo("</td><td>");
        echo("<b>password update</b>");
  $stmt = $pdo->query("SELECT * FROM signups");
  while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {

    echo ("<tr><td>");
    echo(htmlentities($row['personid']));
    echo("</td><td>");
      echo(htmlentities($row['name']));
      echo("</td><td>");
      echo(htmlentities($row['password']));
      echo("</td><td>");
      echo(htmlentities($row['mobno']));
      echo("</td><td>");
      echo(htmlentities($row['email']));
      echo("</td><td>");
      echo(htmlentities($row['location']));
      echo("</td><td>");
    echo ('<a href="editpassword.php?personid='.$row['personid'].'">Edit Password</a> ');


  }
  ?>
  </table>

  <form method="POST">


    <a href="Logout.php">logout</a></p>
  </form>

  </body>

</html>
