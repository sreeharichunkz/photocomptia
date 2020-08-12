<?


   require_once('pdo.php');
session_start();

if (!isset($_SESSION['adminname']) || strlen($_SESSION['adminname']) < 1 ) {
die('<a href=admin.php>signup to continue</a>');
}?>

<!DOCTYPE html>
<html>

<head>
<title>Nav admin</title>

</head>
<body>
    <h1>Panel</h1>

<a href="adminpanel.php">User Info</a></br>

<a href="adminpanel2.php">Message from User</a></br>
<a href="admin_like.php">Like Editing</a></br>
<a href="adminphotoreg.php">contest registrations</a></br>
<a href="adfrgpsw.php">Forget password</a></br>
<a href="adcoin.php">Coins</a></br>







  </body>

</html>
