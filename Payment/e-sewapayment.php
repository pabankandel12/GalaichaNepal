<?php
// eSewa Secret Key
$secret = "8gBm/:&EnhH.1/q";

// Payment Data (Ensure Correct Total)
$amount = "100";  // Main amount
$tax_amount = "10";  // Tax amount
$total_amount = $amount + $tax_amount;  // Correct total amount
$transaction_uuid = "24102844";
$product_code = "EPAYTEST";

// Data Array
$data = [
    "total_amount" => $total_amount,
    "transaction_uuid" => $transaction_uuid,
    "product_code" => $product_code
];

// Generate Message String in "key=value,key=value" Format
$message = "";
foreach ($data as $key => $value) {
    $message .= "$key=$value,";
}
$message = rtrim($message, ","); // Remove trailing comma

// Generate HMAC-SHA256 Signature and Encode in Base64
$signature = base64_encode(hash_hmac('sha256', $message, $secret, true));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>eSewa Payment</title>
</head>
<body>
    <h2>Pay with eSewa</h2>
    <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
        <input type="text" id="amount" name="amount" value="<?php echo $amount; ?>" required>
        <input type="text" id="tax_amount" name="tax_amount" value="<?php echo $tax_amount; ?>" required>
        <input type="text" id="total_amount" name="total_amount" value="<?php echo $total_amount; ?>" required>
        <input type="text" id="transaction_uuid" name="transaction_uuid" value="<?php echo $transaction_uuid; ?>" required>
        <input type="text" id="product_code" name="product_code" value="<?php echo $product_code; ?>" required>
        <input type="text" id="product_service_charge" name="product_service_charge" value="0" required>
        <input type="text" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
        <input type="text" id="success_url" name="success_url" value="https://developer.esewa.com.np/success" required>
        <input type="text" id="failure_url" name="failure_url" value="https://developer.esewa.com.np/failure" required>
        
        <!-- Corrected Signed Field Names -->
        <input type="text" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
        
        <!-- Corrected Dynamic Signature -->
        <input type="text" id="signature" name="signature" value="<?php echo $signature; ?>" required>
        
        <input value="Submit" type="submit">
    </form>
</body>
</html>
