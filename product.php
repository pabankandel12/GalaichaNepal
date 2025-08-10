<<<<<<< HEAD
<?php
session_start();
include('admin/config.php');
include_once('test.php');
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php echo $title."-Galaicha Nepal";?>
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-primiary" id="navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="images/logo1.png" alt="logo" id="logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="product.php">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About us</a>
          </li>
        </ul>
        <form class="search-form me-1" role="search">
          <div class="input-group">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-search"></i></button>
          </div>
        </form>
        <?php
         include ("signin-signup.php");
         ?>
      </div>
    </div>
  </nav>

  <!-- Main content -->
  <div class="container">
    <div class="row justify-content-evenly mt-5" id="card-container">
      <?php 
        $sql1 = "SELECT * FROM p_category WHERE c_id = 4";
        $result1 = mysqli_query($conn,$sql1);
        $row1 = mysqli_fetch_assoc($result1);
     echo' <h1 class="me-2"style="background-color:rgb(71, 165, 42) ;color: aliceblue; padding-left: 10px; text-align: center; font-size: 30px; width: 100%;height: 50px;">'
        .$row1['c_name'].'</h1>';
        ?>
        <?php
  $sql = "SELECT * FROM product WHERE category_id = 4";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
   while($row=mysqli_fetch_assoc($result)){

   ?>
     <div class="col-md-4" id="card">
       <div class="card" style="width: 22rem;">
         <img src="admin/images/<?php echo $row['image']; ?>" class="card-img-top" alt="...">
         <div class="card-body">
           <h5 class="card-title">
             <?php echo $row['title'];?>
           </h5>
           <p class="card-text">
             <?php echo substr($row['dis'], 0, 150);?><a href="#single.php">See more</a>
           </p>
         </div>
         <ul class="list-group list-group-flush">
           <li class="list-group-item">Price:
             <?php echo $row['price'];?>
           </li>
           <li class="list-group-item">Color:
             <?php echo $row['color'];?>
           </li>
         </ul>
         <div class="card-body">
           <input type="hidden" id="name<?php echo $row['id'];?>" value="<?php echo $row['title'];?>">
           <input type="hidden" id="price<?php echo $row['id'];?>" value="<?php echo $row['price'];?>">
           <?php 
             // Check if the user is logged in
             if (isset($_SESSION['Normal_username']) && $_SESSION['Normal_username'] == true) {
             echo '<button class="btn btn-success add" data-id="' . $row['id'] . '" id="add-to-cart-btn">Add to Cart</button>';
           } else {
           echo '<button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
           Add to Cart
         </button>';
         }
         ?>

         </div>
       </div>
     </div>
     <?php 
   }
   }
   ?>
    </div>
    <!-- Repeat the above code for other product cards -->
  </div>
  </div>

  <!-- Second part of the product -->
  <div class="container">
    <div class="row justify-content-evenly mt-5 mb-8">
    <?php 
        $sql1 = "SELECT * FROM p_category WHERE c_id = 5";
        $result1 = mysqli_query($conn,$sql1);
        $row1 = mysqli_fetch_assoc($result1);
     echo' <h1 class="me-2"style="background-color:rgb(71, 165, 42) ;color: aliceblue; padding-left: 10px; text-align: center; font-size: 30px; width: 100%;height: 50px;">'
        .$row1['c_name'].'</h1>';
        ?>
        <?php
  $sql = "SELECT * FROM product WHERE category_id = 5";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
   while($row=mysqli_fetch_assoc($result)){

   ?>
     <div class="col-md-4" id="card">
       <div class="card" style="width: 22rem;">
         <img src="admin/images/<?php echo $row['image']; ?>" class="card-img-top" alt="...">
         <div class="card-body">
           <h5 class="card-title">
             <?php echo $row['title'];?>
           </h5>
           <p class="card-text">
             <?php echo substr($row['dis'], 0, 150);?><a href="#single.php">See more</a>
           </p>
         </div>
         <ul class="list-group list-group-flush">
           <li class="list-group-item">Price:
             <?php echo $row['price'];?>
           </li>
           <li class="list-group-item">Color:
             <?php echo $row['color'];?>
           </li>
         </ul>
         <div class="card-body">
           <input type="hidden" id="name<?php echo $row['id'];?>" value="<?php echo $row['title'];?>">
           <input type="hidden" id="price<?php echo $row['id'];?>" value="<?php echo $row['price'];?>">
           <?php 
             // Check if the user is logged in
             if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
             echo '<button class="btn btn-success add" data-id="' . $row['id'] . '" id="add-to-cart-btn">Add to Cart</button>';
           } else {
           echo '<button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
           Add to Cart
         </button>';
         }
         ?>

         </div>
       </div>
     </div>
     <?php 
   }
   }
   ?>
    </div>
  </div>

    <!-- third part of the product -->
    <div class="container">
    <div class="row justify-content-evenly mt-5 mb-8">
    <?php 
        $sql1 = "SELECT * FROM p_category WHERE c_id = 7";
        $result1 = mysqli_query($conn,$sql1);
        $row1 = mysqli_fetch_assoc($result1);
     echo' <h1 class="me-2"style="background-color:rgb(71, 165, 42) ;color: aliceblue; padding-left: 10px; text-align: center; font-size: 30px; width: 100%;height: 50px;">'
        .$row1['c_name'].'</h1>';
        ?>
        <?php
  $sql = "SELECT * FROM product WHERE category_id = 7";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
   while($row=mysqli_fetch_assoc($result)){

   ?>
     <div class="col-md-4" id="card">
       <div class="card" style="width: 22rem;">
         <img src="admin/images/<?php echo $row['image']; ?>" class="card-img-top" alt="...">
         <div class="card-body">
           <h5 class="card-title">
             <?php echo $row['title'];?>
           </h5>
           <p class="card-text">
             <?php echo substr($row['dis'], 0, 150);?><a href="#single.php">See more</a>
           </p>
         </div>
         <ul class="list-group list-group-flush">
           <li class="list-group-item">Price:
             <?php echo $row['price'];?>
           </li>
           <li class="list-group-item">Color:
             <?php echo $row['color'];?>
           </li>
         </ul>
         <div class="card-body">
           <input type="hidden" id="name<?php echo $row['id'];?>" value="<?php echo $row['title'];?>">
           <input type="hidden" id="price<?php echo $row['id'];?>" value="<?php echo $row['price'];?>">
           <?php 
             // Check if the user is logged in
             if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
             echo '<button class="btn btn-success add" data-id="' . $row['id'] . '" id="add-to-cart-btn">Add to Cart</button>';
           } else {
           echo '<button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
           Add to Cart
         </button>';
         }
         ?>

         </div>
       </div>
     </div>
     <?php 
   }
   }
   ?>
    </div>
  </div>
  <!-- End of the third -->
  <!-- Footer -->
  <div class="container-fluid bg-denger justify-content-evenly" id="footer">
    <div class="row bg-denger justify-content-evenly">
      <div class="col-sm-3 mt-5">
        <img src="images/logo1.png" alt="" style="width: 300px;">
        <p class="text-denger">The Galaicha Nepal Of A New Generation.</p>
      </div>
      <div class="col-sm-3 mt-5">
        <h2>Connect with us</h2>
        <ul class="social-icons">
          <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
        </ul>
        <form class="mt-4">
          <div class="mb-3">
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Enter email">
          </div>
          <button type="submit" class="btn btn-primary">Subscribe</button>
        </form>
      </div>
      <div class="col-sm-3 mt-5">
        <h2>Contact us</h2>
        <p>Email: Galichanepal2020@gmail.com</p>
        <p>Phone: +977 9808837046</p>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.41883841602!2d85.30483066506201!3d27.70435163279316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18f8b5a16d43%3A0xb4f02f94e307d660!2sBasantapur%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1663908008513!5m2!1sen!2snp"
          width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
  </div>
  <div class="container-fluid" id="Last_footer">
    <div class="row justify-content-evenly">
      <div class="col-12" id="last-footer-contain">
        <p class="text-center pt-2">© २००६-२०२२ galaicha nepal.com</p>
      </div>
    </div>
  </div>
  <script src="JS/payment.js?v=20"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
</body>

=======
<?php
session_start();
include('admin/config.php');
include_once('test.php');
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php echo $title."-Galaicha Nepal";?>
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-primiary" id="navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="images/logo1.png" alt="logo" id="logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="product.php">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About us</a>
          </li>
        </ul>
        <form class="search-form me-1" role="search">
          <div class="input-group">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-search"></i></button>
          </div>
        </form>
        <?php
         include ("signin-signup.php");
         ?>
      </div>
    </div>
  </nav>

  <!-- Main content -->
  <div class="container">
    <div class="row justify-content-evenly mt-5" id="card-container">
      <?php 
        $sql1 = "SELECT * FROM p_category WHERE c_id = 4";
        $result1 = mysqli_query($conn,$sql1);
        $row1 = mysqli_fetch_assoc($result1);
     echo' <h1 class="me-2"style="background-color:rgb(71, 165, 42) ;color: aliceblue; padding-left: 10px; text-align: center; font-size: 30px; width: 100%;height: 50px;">'
        .$row1['c_name'].'</h1>';
        ?>
        <?php
  $sql = "SELECT * FROM product WHERE category_id = 4";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
   while($row=mysqli_fetch_assoc($result)){

   ?>
     <div class="col-md-4" id="card">
       <div class="card" style="width: 22rem;">
         <img src="admin/images/<?php echo $row['image']; ?>" class="card-img-top" alt="...">
         <div class="card-body">
           <h5 class="card-title">
             <?php echo $row['title'];?>
           </h5>
           <p class="card-text">
             <?php echo substr($row['dis'], 0, 150);?><a href="#single.php">See more</a>
           </p>
         </div>
         <ul class="list-group list-group-flush">
           <li class="list-group-item">Price:
             <?php echo $row['price'];?>
           </li>
           <li class="list-group-item">Color:
             <?php echo $row['color'];?>
           </li>
         </ul>
         <div class="card-body">
           <input type="hidden" id="name<?php echo $row['id'];?>" value="<?php echo $row['title'];?>">
           <input type="hidden" id="price<?php echo $row['id'];?>" value="<?php echo $row['price'];?>">
           <?php 
             // Check if the user is logged in
             if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
             echo '<button class="btn btn-success add" data-id="' . $row['id'] . '" id="add-to-cart-btn">Add to Cart</button>';
           } else {
           echo '<button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
           Add to Cart
         </button>';
         }
         ?>

         </div>
       </div>
     </div>
     <?php 
   }
   }
   ?>
    </div>
    <!-- Repeat the above code for other product cards -->
  </div>
  </div>

  <!-- Second part of the product -->
  <div class="container">
    <div class="row justify-content-evenly mt-5 mb-8">
    <?php 
        $sql1 = "SELECT * FROM p_category WHERE c_id = 5";
        $result1 = mysqli_query($conn,$sql1);
        $row1 = mysqli_fetch_assoc($result1);
     echo' <h1 class="me-2"style="background-color:rgb(71, 165, 42) ;color: aliceblue; padding-left: 10px; text-align: center; font-size: 30px; width: 100%;height: 50px;">'
        .$row1['c_name'].'</h1>';
        ?>
        <?php
  $sql = "SELECT * FROM product WHERE category_id = 5";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
   while($row=mysqli_fetch_assoc($result)){

   ?>
     <div class="col-md-4" id="card">
       <div class="card" style="width: 22rem;">
         <img src="admin/images/<?php echo $row['image']; ?>" class="card-img-top" alt="...">
         <div class="card-body">
           <h5 class="card-title">
             <?php echo $row['title'];?>
           </h5>
           <p class="card-text">
             <?php echo substr($row['dis'], 0, 150);?><a href="#single.php">See more</a>
           </p>
         </div>
         <ul class="list-group list-group-flush">
           <li class="list-group-item">Price:
             <?php echo $row['price'];?>
           </li>
           <li class="list-group-item">Color:
             <?php echo $row['color'];?>
           </li>
         </ul>
         <div class="card-body">
           <input type="hidden" id="name<?php echo $row['id'];?>" value="<?php echo $row['title'];?>">
           <input type="hidden" id="price<?php echo $row['id'];?>" value="<?php echo $row['price'];?>">
           <?php 
             // Check if the user is logged in
             if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
             echo '<button class="btn btn-success add" data-id="' . $row['id'] . '" id="add-to-cart-btn">Add to Cart</button>';
           } else {
           echo '<button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
           Add to Cart
         </button>';
         }
         ?>

         </div>
       </div>
     </div>
     <?php 
   }
   }
   ?>
    </div>
  </div>

    <!-- third part of the product -->
    <div class="container">
    <div class="row justify-content-evenly mt-5 mb-8">
    <?php 
        $sql1 = "SELECT * FROM p_category WHERE c_id = 7";
        $result1 = mysqli_query($conn,$sql1);
        $row1 = mysqli_fetch_assoc($result1);
     echo' <h1 class="me-2"style="background-color:rgb(71, 165, 42) ;color: aliceblue; padding-left: 10px; text-align: center; font-size: 30px; width: 100%;height: 50px;">'
        .$row1['c_name'].'</h1>';
        ?>
        <?php
  $sql = "SELECT * FROM product WHERE category_id = 7";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
   while($row=mysqli_fetch_assoc($result)){

   ?>
     <div class="col-md-4" id="card">
       <div class="card" style="width: 22rem;">
         <img src="admin/images/<?php echo $row['image']; ?>" class="card-img-top" alt="...">
         <div class="card-body">
           <h5 class="card-title">
             <?php echo $row['title'];?>
           </h5>
           <p class="card-text">
             <?php echo substr($row['dis'], 0, 150);?><a href="#single.php">See more</a>
           </p>
         </div>
         <ul class="list-group list-group-flush">
           <li class="list-group-item">Price:
             <?php echo $row['price'];?>
           </li>
           <li class="list-group-item">Color:
             <?php echo $row['color'];?>
           </li>
         </ul>
         <div class="card-body">
           <input type="hidden" id="name<?php echo $row['id'];?>" value="<?php echo $row['title'];?>">
           <input type="hidden" id="price<?php echo $row['id'];?>" value="<?php echo $row['price'];?>">
           <?php 
             // Check if the user is logged in
             if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
             echo '<button class="btn btn-success add" data-id="' . $row['id'] . '" id="add-to-cart-btn">Add to Cart</button>';
           } else {
           echo '<button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
           Add to Cart
         </button>';
         }
         ?>

         </div>
       </div>
     </div>
     <?php 
   }
   }
   ?>
    </div>
  </div>
  <!-- End of the third -->
  <!-- Footer -->
  <div class="container-fluid bg-denger justify-content-evenly" id="footer">
    <div class="row bg-denger justify-content-evenly">
      <div class="col-sm-3 mt-5">
        <img src="images/logo1.png" alt="" style="width: 300px;">
        <p class="text-denger">The Galaicha Nepal Of A New Generation.</p>
      </div>
      <div class="col-sm-3 mt-5">
        <h2>Connect with us</h2>
        <ul class="social-icons">
          <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
        </ul>
        <form class="mt-4">
          <div class="mb-3">
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Enter email">
          </div>
          <button type="submit" class="btn btn-primary">Subscribe</button>
        </form>
      </div>
      <div class="col-sm-3 mt-5">
        <h2>Contact us</h2>
        <p>Email: Galichanepal2020@gmail.com</p>
        <p>Phone: +977 9808837046</p>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.41883841602!2d85.30483066506201!3d27.70435163279316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18f8b5a16d43%3A0xb4f02f94e307d660!2sBasantapur%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1663908008513!5m2!1sen!2snp"
          width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
  </div>
  <div class="container-fluid" id="Last_footer">
    <div class="row justify-content-evenly">
      <div class="col-12" id="last-footer-contain">
        <p class="text-center pt-2">© २००६-२०२२ galaicha nepal.com</p>
      </div>
    </div>
  </div>
  <script src="JS/payment.js?v=20"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
</body>

>>>>>>> 615142914cbe64c1c2aca4c11032e84f5060e909
</html>