<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


   require_once('pdo.php');
session_start();
if (!isset($_SESSION['adminname']) || strlen($_SESSION['adminname']) < 1 ) {
die('<a href=admin.php>signup to continue</a>');
}

    // If the user requested logout go back to index.php
    if ( isset($_POST['logout']) ) {
        header('Location: logout2.php');
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
        echo("<b>Sl_no</b>");
        echo("</td><td>");
        echo("<b>Date & Time</b>");
        echo("</td><td>");
        echo("<b>Name</b>");
        echo("</td><td>");
        echo("<b>Subject</b>");
        echo("</td><td>");
        echo("<b>Message</b>");
        echo("</td><td>");
        echo("<b>Mobile_no</b>");
        echo("</td><td>");
        echo("<b>Email</b>");
  $stmt = $pdo->query("SELECT * FROM messagess");
  while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo ("<tr><td>");
      echo(htmlentities($row['sl_no']));
      echo("</td><td>");
      echo(htmlentities($row['time']));
      echo("</td><td>");
      echo(htmlentities($row['name']));
      echo("</td><td>");
      echo(htmlentities($row['subject']));
      echo("</td><td>");
      echo(htmlentities($row['message']));
      echo("</td><td>");
      echo(htmlentities($row['mob_no']));
      echo("</td><td>");
      echo(htmlentities($row['email']));
      echo("</td><td>");
  }
  ?>
  </table>

  <form method="POST">


    <a href="Logout.php">logout</a></p>
  </form>

  </body>

</html>
