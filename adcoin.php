<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


   require_once('pdo.php');
session_start();
$j=1;
while($j>=1000){

if(isset($_POST[$j])){


  $stkk = $pdo->query("SELECT * FROM coins WHERE person_id =".$j);

  $pom = $stkk->fetch(PDO::FETCH_ASSOC);


  $stmn = $pdo->prepare('INSERT INTO coins
   (coin) VALUES ( :uname)');
   $stmn->execute(array(

           ':uname' => $pom['coin']+$_POST['no'.$j])
       );



}

$j+=1;
}









?>
<!DOCTYPE html>
<html>

<head>
<title>admin panel</title>
</head>
<body>
    <h1>Coin details</h1>
    <?php    if ( isset($_SESSION['success']) ) {
            echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
            unset($_SESSION['success']);
        }


        echo('<table border="1">'."\n");
        echo "<tr><td>";
        echo("<b>User_id</b>");
        echo("</td><td>");
        echo("<b>name</b>");
        echo("</td><td>");
        echo("<b>coin</b>");
        echo("</td><td>");
        echo("<b>coin added</b>");
        echo("</td><td>");
        echo("<b>Enter the coins to add</b>");
        echo("</td><td>");
        echo("<b>Submit</b>");



  $stmt = $pdo->query("SELECT * FROM coins ORDER BY coin DESC;");
  $i=1;
  while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {

    echo ("<tr><td>");
    echo(htmlentities($row['person_id']));
    echo("</td><td>");
      echo(htmlentities($row['name']));
      echo("</td><td>");
      echo(htmlentities($row['coin']));
      echo("</td><td>");
      echo(htmlentities($row['added_coin']));
      echo("</td><td>");?>
        <form method="post">
<input  type=text name="<? echo "no".$i  ?>"/>
<?  echo("</td><td>");?>
<input  type=submit name="<? echo $i  ?>"/>
</form>
<? $i =$i +1;
  }
  ?>
  </table>

  <form method="POST">


    <a href="Logout.php">logout</a></p>
  </form>

  </body>

</html>
