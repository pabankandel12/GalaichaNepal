<?php
// payment_success.php

session_start();
include('../admin/config.php');

?>
<?php
    // if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
    //     $username = $_SESSION['username'];
    // } else {
    //     echo "User not logged in.";
    //     exit();
    // }
 echo "hello hello";



    $pid = $_GET['pid'];
    $username = $_GET['username'];
    $tamt = $_GET['tAmt'];

    echo $pid;

    // end of fetching user data
    $total = $total + ($value['p_price']);
    $pname = $value['p_name'];

    // $sql = "INSERT INTO P_order(name,phone,email,address,pname,totalam,username,order_date) 
    // VALUES ('$name',' $phone','$email','$address','$pname','$tamt','$username','$date')";


    if (mysqli_query($conn, $sql)) {
        // Order successfully inserted, display a success message using JavaScript
        echo "<script>alert('Order placed successfully!'); window.location='index.php';</script>";
        exit(); // Stop further execution of the script
    } else {
        // Display an error message if insertion fails
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

?>





