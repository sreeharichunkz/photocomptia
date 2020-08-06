<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('config.php');

   require_once('pdo.php');
session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();


    }
}

if ($success === true)
{
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";

             $sql = "UPDATE photoreg SET payment = 'Done'
                   WHERE photo_id = :yr ";
             $stmt = $pdo->prepare($sql);
             $stmt->execute(array(

                 ':yr' => $_SESSION['photo_id'] ));

$stml = $pdo->query("SELECT * FROM signups WHERE personid=".$_SESSION['personid']);
$row = $stml->fetch(PDO::FETCH_ASSOC);

if(!isset($_SESSION['contest_joined'])){
                 $_SESSION['contest_joined']=$row['contest_joined'];
$rs=$_SESSION['contest_joined'] +1;

              $sql = "UPDATE signups SET contest_joined =:rs
                       WHERE personid = :ys ";
                 $stmp = $pdo->prepare($sql);
                 $stmp->execute(array(
                    ':rs' => $rs,
                     ':ys' => $_SESSION['personid'] ));

$stkl = $pdo->query("SELECT * FROM refer_1 WHERE refered_person_id=".$_SESSION['personid']);
$rom = $stkl->fetch(PDO::FETCH_ASSOC);
if($rom!=false){
$sql = "UPDATE refer_1 SET contest_joined =:rs
         WHERE refered_person_id = :ys ";
   $stmp = $pdo->prepare($sql);
   $stmp->execute(array(
      ':rs' => $rs,
       ':ys' => $_SESSION['personid'] ));
}}
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
