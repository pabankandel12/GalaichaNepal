<?php
session_start();

// Example cart setup for testing
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [
    ['p_name' => 'Sample Product', 'p_price' => 100],
    ['p_name' => 'Second Product', 'p_price' => 200]
  ];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galaicha Nepal - Payment</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
    }

    .container {
      background: green;
      padding: 20px 0;
      text-align: center;
      color: #fff;
    }

    .main-contain {
      max-width: 600px;
      margin: 20px auto;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      margin-bottom: 20px;
      color: green;
      font-style: italic;
      font-weight: 200;
    }

    input[type="text"],
    input[type="email"],
    input[type="submit"],
    button {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    input[type="submit"],
    button {
      background: green;
      color: #fff;
      cursor: pointer;
    }

    input[type="submit"]:hover,
    button:hover {
      background: darkgreen;
    }

    .hidden {
      display: none;
    }

    /* Custom modal */
    #confirmModal {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      display: none;
      justify-content: center;
      align-items: center;
    }

    #confirmModal .modal-content {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      width: 300px;
      text-align: center;
    }

    #confirmModal button {
      padding: 10px 20px;
      margin: 5px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }

    #confirmBtn {
      background: green;
      color: #fff;
    }

    #cancelBtn {
      background: red;
      color: #fff;
    }
  </style>
</head>

<body>

  <div class="container">
    <h1>Payment Page</h1>
  </div>
  <div class="main-contain">
    <h1>Payment Option</h1>

    <!-- Cash on Delivery -->
    <input type="radio" id="showForm1" name="showForm" value="form1" checked>
    <label for="showForm1">Cash on Delivery</label>

    <form id="form1" class="payment-form" action="payment_action.php" method="POST">
      <label>Full Name</label>
      <input type="text" name="oname" required>
      <label>Phone Number</label>
      <input type="text" name="ophone" required>
      <label>Email</label>
      <input type="email" name="oemail" required>
      <label>Address</label>
      <input type="text" name="oaddress" required>
      <input type="hidden" name="payment_method" value="COD">
      <input type="submit" value="Place Order">
    </form>

    <!-- eSewa -->
    <input type="radio" id="showForm2" name="showForm" value="form2">
    <label for="showForm2">E-Sewa</label>

    <?php
    // Cart calculation
    $total = 0;
    if (!empty($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $item) {
        $total += ($item['p_price'] * 1);
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

    <form id="esewaForm" class="payment-form" style="display:none;" method="POST" action="https://rc-epay.esewa.com.np/api/epay/main/v2/form">
      <input type="hidden" name="amount" value="<?php echo $total; ?>">
      <input type="hidden" name="tax_amount" value="<?php echo $tax_amount; ?>">
      <input type="hidden" name="total_amount" value="<?php echo $total_amount; ?>">
      <input type="hidden" name="transaction_uuid" value="<?php echo $transaction_uuid; ?>">
      <input type="hidden" name="product_code" value="<?php echo $product_code; ?>">
      <input type="hidden" name="product_service_charge" value="0">
      <input type="hidden" name="product_delivery_charge" value="0">
      <input type="hidden" name="success_url" value="http://localhost/FinalProject-ERROR%20MANAGE/payment_action.php">
      <input type="hidden" name="failure_url" value="http://localhost/FinalProject-ERROR%20MANAGE/">
      <input type="hidden" name="signed_field_names" value="total_amount,transaction_uuid,product_code">
      <input type="hidden" name="signature" value="<?php echo $signature; ?>">

      <label>Full Name</label>
      <input type="text" name="oname" required>
      <label>Phone Number</label>
      <input type="text" name="ophone" required>
      <label>Email</label>
      <input type="email" name="oemail" required>
      <label>Address</label>
      <input type="text" name="oaddress" required>
      <input type="hidden" name="payment_method" value="eSewa">

      <!-- Only show eSewa pay button -->
      <button type="button" id="esewaPayBtn" name="submit1" >Pay with eSewa</button>
    </form>
  </div>

  <!-- Custom Confirmation Modal -->
  <div id="confirmModal">
    <div class="modal-content">
      <h3>Confirm Payment</h3>
      <p>Do you want to proceed with eSewa payment?</p>
      <button id="confirmBtn">Confirm</button>
      <button id="cancelBtn">Cancel</button>
    </div>
  </div>

  <script>
    const showForm1 = document.getElementById('showForm1');
    const showForm2 = document.getElementById('showForm2');
    const form1 = document.getElementById('form1');
    const esewaForm = document.getElementById('esewaForm');
    const esewaBtn = document.getElementById('esewaPayBtn');
    const confirmModal = document.getElementById('confirmModal');
    const confirmBtn = document.getElementById('confirmBtn');
    const cancelBtn = document.getElementById('cancelBtn');

    showForm1.addEventListener('click', () => {
      form1.style.display = 'block';
      esewaForm.style.display = 'none';
    });
    showForm2.addEventListener('click', () => {
      form1.style.display = 'none';
      esewaForm.style.display = 'block';
    });

    esewaBtn.addEventListener('click', () => {
      confirmModal.style.display = 'flex';
    });

    confirmBtn.addEventListener('click', () => {
      confirmModal.style.display = 'none';
      esewaForm.submit();
    });

    cancelBtn.addEventListener('click', () => {
      confirmModal.style.display = 'none';
    });
  </script>

</body>

</html>