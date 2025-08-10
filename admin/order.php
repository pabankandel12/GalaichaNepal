<<<<<<< HEAD
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:signin.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galaicha Nepal</title>
    <!-- Favicon -->
    <link href="admin/img/favicon.ico" rel="icon">
    <link rel="stylesheet" href="../css/home.css?v=34">
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>

<body>
    <?php
    include('SucessToastMessage.php');
    ?>
    <div class="container">
        <div class="row">
            <div class="nav-bar">
                <div class="top-nav-bar">
                    <h1>Galaicha Nepal</h1>
                    <img src="" alt="">
                </div>
                <div class="main-nav-bar">
                    <ul>
                        <li><a href="index.php">DashBoard</a></li>
                        <li><a href="product.php">Product</a></li>
                        <li><a href="post.php">Add Product</a></li>
                        <li><a href="category.php">Category</a></li>
                        <li><a href="feedback.php">FeedBack</a></li>
                        <li><a href="user.php">Users</a></li>
                        <li><a href="order.php">Order</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </div>
                <div class="main-contain">
                    <h2>Order Record</h2>
                    <table border="1">
                        <thead>
                            <th>Name</th>
                            <th>Prodrout Name</th>
                            <th>Contact Number</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            <?php
                            include "config.php";

                            $sql = "SELECT * FROM P_order";
                            $result = mysqli_query($conn, $sql);

                            if ($result1 = mysqli_num_rows($result) > 0) {

                                while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['pname']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['totalam']; ?></td>
                                    <!-- <td><a href="function.php?c_id=<?php echo $row['id']; ?>" class="btn-link">Deliver</a></td -->
                                    <td class="p-4">
                                        <form action="function.php" method="post">
                                            <!-- Hidden input to send order ID -->
                                            <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">

                                            <select name="newStatus"
                                                class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                                <option value="Pending" <?php if ($row['p_status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                                                <option value="Processing" <?php if ($row['p_status'] == 'Processing') echo 'selected'; ?>>Processing</option>
                                                <option value="Shipped" <?php if ($row['p_status'] == 'Shipped') echo 'selected'; ?>>Shipped</option>
                                                <option value="Delivered" <?php if ($row['p_status'] == 'Delivered') echo 'selected'; ?>>Delivered</option>
                                                <option value="Cancelled" <?php if ($row['p_status'] == 'Cancelled') echo 'selected'; ?>>Cancelled</option>
                                            </select>

                                            <button type="submit" name="update_status"
                                                class="mt-2 bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Update</button>
                                        </form>
                                    </td>
                        </tbody>
                <?php
                                }
                            }
                ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
=======
<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:signin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galaicha Nepal</title>
     <!-- Favicon -->
    <link href="admin/img/favicon.ico" rel="icon">
    <link rel="stylesheet" href="../css/home.css?v=34">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="nav-bar">
                <div class="top-nav-bar">
                    <h1>Galaicha Nepal</h1>
                    <img src="" alt="">
                </div>
                <div class="main-nav-bar">
                <ul>
                    <li><a href="dashboard.php">DashBoard</a></li>
                    <li><a href="product.php">Product</a></li>
                    <li><a href="post.php">Add Product</a></li>
                    <li><a href="category.php">Category</a></li>
                    <li><a href="feedback.php">FeedBack</a></li>
                    <li><a href="user.php">Users</a></li>
                    <li><a href="order.php">Order</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
               </div>
               <div class="main-contain">
                <h2>Order Record</h2>
                <table border="1">
                 <thead>
                  <th>Name</th>
                  <th>Prodrout Name</th>
                  <th>Contact Number</th>
                  <th>Amount</th>
                  <th>Status</th>
                  </thead>
                  <tbody>
                    <?php 
                    include "config.php";

                    $sql= "SELECT * FROM P_order";
                    $result = mysqli_query($conn,$sql);
                    
                    if ($result1 = mysqli_num_rows($result)>0) {
                        
                    while($row=mysqli_fetch_assoc($result)){

                      ?>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['pname'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['totalam'];?></td>
                    <td><button type="button">Deliver</button><button type="button">Pending</button></td>
                </tbody>
                <?php
                     }
                 }
                  ?>
                </table>
               </div>
            </div>
        </div>
    </div>
</body>
>>>>>>> 615142914cbe64c1c2aca4c11032e84f5060e909
</html>