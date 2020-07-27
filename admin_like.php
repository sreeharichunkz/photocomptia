<?php include('server.php');
session_start();
  require_once('pdo.php');
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  if (!isset($_SESSION['adminname']) || strlen($_SESSION['adminname']) < 1 ) {
  die('<a href=admin.php>signup to continue</a>');
  }
 ?>

<?php foreach ($posts as $post): ?>
 <div class="post">

   <div class="post-info">

<?php echo $post['id'] ?>==>
  <?php echo getLikes($post['id']); ?>

     &nbsp;&nbsp;&nbsp;&nbsp;

   <!-- if user dislikes post, style button differently -->

   </div>
 </div>
<?php endforeach ?>
<?
echo('<table border="1">'."\n");
echo "<tr><td>";
echo("<b>Post_id</b>");
echo("</td><td>");
echo("<b>Likes</b>");


$stmt = $pdo->query("SELECT * FROM posts");
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
echo ("<tr><td>");

echo $row['id'];


echo("</td><td>");
echo $row['added'];


  /*    $y=$x+$row['added'];
      $sql = "UPDATE posts SET added = $y

              WHERE id = $row['id']";

      $stmt = $pdo->prepare($sql);


}*/
}





  if(isset($_POST['submit1'])) {
    $stmt = $pdo->query("SELECT * FROM posts WHERE id =1");
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $x=$row['added'];
 $y=$_POST['post1'];
 $z=$x+$y;

 $sql = "UPDATE posts SET added = :n1

         WHERE id = 1";
 $stmp = $pdo->prepare($sql);
 $stmp->execute(array(

     ':n1' => $z));

  }

  if(isset($_POST['submit2'])) {
    $stmt = $pdo->query("SELECT * FROM posts WHERE id =2");
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $x=$row['added'];
 $y=$_POST['post2'];
 $z=$x+$y;

 $sql = "UPDATE posts SET added = :n1

         WHERE id = 2";
 $stmp = $pdo->prepare($sql);
 $stmp->execute(array(

     ':n1' => $z));

  }

  if(isset($_POST['submit3'])) {
    $stmt = $pdo->query("SELECT * FROM posts WHERE id =3");
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $x=$row['added'];
 $y=$_POST['post3'];
 $z=$x+$y;

 $sql = "UPDATE posts SET added = :n1

         WHERE id = 3";
 $stmp = $pdo->prepare($sql);
 $stmp->execute(array(

     ':n1' => $z));

  }

  if(isset($_POST['submit4'])) {
    $stmt = $pdo->query("SELECT * FROM posts WHERE id =4");
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $x=$row['added'];
 $y=$_POST['post4'];
 $z=$x+$y;

 $sql = "UPDATE posts SET added = :n1

         WHERE id = 4";
 $stmp = $pdo->prepare($sql);
 $stmp->execute(array(

     ':n1' => $z));

  }

  if(isset($_POST['submit5'])) {
    $stmt = $pdo->query("SELECT * FROM posts WHERE id =5");
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $x=$row['added'];
 $y=$_POST['post5'];
 $z=$x+$y;

 $sql = "UPDATE posts SET added = :n1

         WHERE id = 5";
 $stmp = $pdo->prepare($sql);
 $stmp->execute(array(

     ':n1' => $z));

  }

  if(isset($_POST['submit6'])) {
    $stmt = $pdo->query("SELECT * FROM posts WHERE id =6");
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $x=$row['added'];
 $y=$_POST['post6'];
 $z=$x+$y;

 $sql = "UPDATE posts SET added = :n1

         WHERE id = 6";
 $stmp = $pdo->prepare($sql);
 $stmp->execute(array(

     ':n1' => $z));

  }
?>
<html>
<head>
  <title>Admins</title>
  </head>
  <body>
</table><div class="likeman">
<form method="post">
  <input type="number" name="post1" placeholder="likes to add in post1">
  <input type="submit" name="submit1"></br>
  <input type="number" name="post2" placeholder="likes to add in post2">
  <input type="submit" name="submit2"></br>
  <input type="number" name="post3" placeholder="likes to add in post3">
  <input type="submit" name="submit3"></br>
  <input type="number" name="post4" placeholder="likes to add in post4">
  <input type="submit" name="submit4"></br>
  <input type="number" name="post5" placeholder="likes to add in post5">
  <input type="submit" name="submit5"></br>
  <input type="number" name="post6" placeholder="likes to add in post6">
  <input type="submit" name="submit6"></br>

</form>


</body>
