<?php
session_start();
if (!isset($_SESSION['Normal_username'])) {
    header("Location: login.php");
    exit();
}else{
  $username = $_SESSION['Normal_username'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
 
    //takes the user/order details
    if (isset($_POST['oname'])) {
  
    $name = $_POST['oname'];
    $phone = $_POST['ophone'];
    $email = $_POST['oemail'];
    $address = $_POST['oaddress'];
    // $date = date("Y-m-d H:i:s");

  
    }
    // Cart calculation
    $total = 0;
    if (!empty($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $item) {
        $total += ($item['p_price'] * 1);
        $pid[] = $item['p_id'];
        $pname[] = $item['p_name'];
      }
    } else {
      $total = 100;
    }
    
    // eSewa setup
    $tax_amount = 10;
    $total_amount = $total + $tax_amount;
    $transaction_uuid = uniqid();
    $product_code = "EPAYTEST";
    $secret = "8gBm/:&EnhH.1/q";
    $data = [
      "total_amount" => $total_amount,
      "transaction_uuid" => $transaction_uuid,
      "product_code" => $product_code
    ];
    $message = "";
    foreach ($data as $key => $value) {
      $message .= "$key=$value,";
    }
    $message = rtrim($message, ",");
    $signature = base64_encode(hash_hmac('sha256', $message, $secret, true));
    ?>

      <!-- <form   method="POST" action="https://rc-epay.esewa.com.np/api/epay/main/v2/form"> -->
      <input type="hidden" name="amount" value="<?php echo $total; ?>">
      <input type="hidden" name="tax_amount" value="<?php echo $tax_amount; ?>">
      <input type="hidden" name="total_amount" value="<?php echo $total_amount; ?>">
      <input type="hidden" name="transaction_uuid" value="<?php echo $transaction_uuid; ?>">
      <input type="hidden" name="product_code" value="<?php echo $product_code; ?>">
      <input type="hidden" name="product_service_charge" value="0">
      <input type="hidden" name="product_delivery_charge" value="0">
      <input type="hidden" name="success_url" 
      value="http://localhost/FinalProject-ERROR%20MANAGE/testing/success_payment.php?pid=$pid&username=$username&tAmt=$total_amount$">
      <input type="hidden" name="failure_url" value="http://localhost/FinalProject-ERROR%20MANAGE/index.php">
      <input type="hidden" name="signed_field_names" value="total_amount,transaction_uuid,product_code">
      <input type="hidden" name="signature" value="<?php echo $signature; ?>">

      <!-- Only show eSewa pay button -->
      <button type="submit" id="esewaPayBtn" >Pay with eSewa</button>
  
    </form>
  
</body>
</html>