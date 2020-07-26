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

$id=$_REQUEST['personid'];
    if(isset($_POST['submits'])) {
  //  $sql = "UPDATE signups SET password=:fn";
//  $stmt = $pdo->prepare($sql);

$sql = "UPDATE signups SET password = :mk
      WHERE personid = :yr ";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
    ':mk' =>$_POST['npsw'],
    ':yr' => $id ));
  }



?>
<!DOCTYPE html>
<html>

<head>
<title>password</title>

</head>
<body>
    <h1>Change Password</h1>
<?    $stmt = $pdo->prepare('SELECT * FROM signups WHERE personid = :em');

    $stmt->execute(array( ':em' => $_REQUEST['personid']));

    $row = $stmt->fetch(PDO::FETCH_ASSOC);




     ?>

  <form method="POST">

    <label for="uname"><b>Username</b></label>
    <input type="text" value="<? echo $row['name'] ?>" name="uname" readonly/> </br>


    <label for="psw"><b>Password</b></label>
    <input type="text" value="<?echo $row['password'] ?>" name="psw" readonly/></br>

    <label for="npsw"><b>Password</b></label>

    <input type="text" placeholder="add new password" name="npsw"></br>

  <input type="submit" value="update password" name="submits" /></br>

  </form>

  </body>

</html>
