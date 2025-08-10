<<<<<<< HEAD
<?php
session_start();
// Database Connection
include 'config.php';
// Database Connection End

// Post the category data
if (isset($_POST['submit1'])) {

  $Category_name = $_POST['category_name'];
  $Category_Disc = $_POST['product_contain'];

  $sql = "INSERT INTO p_category(c_name) VALUES('$Category_name')";
  mysqli_query($conn, $sql);
  header("location:category.php");
}

// Post the category data

// category delete form
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "DELETE  FROM p_category WHERE c_id ='$id'";

  if ($result = mysqli_query($conn, $sql)) {
    header("location:category.php");
  } else {
    echo "error occer";
  }
}
// End of Category delete form

//category update data
if (isset($_POST['submit_update'])) {
  $id = $_POST['id'];
  $name = $_POST['category_name'];

  $sql = "UPDATE p_category SET c_name = '$name'  WHERE c_id ='$id'";

  if ($result = mysqli_query($conn, $sql)) {
    header("location:category.php");
  } else {
    echo "error occer";
  }
}
// End of update category
// add the new user
if (isset($_POST['submit_user'])) {
  $name = $_POST['user_name'];
  $password = $_POST['user_password'];
  $role = $_POST['user_role'];

  $sql = "INSERT INTO admin(username,password,role) VALUES ('$name','$password','$role')";
  $result = mysqli_query($conn, $sql);
  if ($result) {

    header("location:user.php?sucess = New User Created.");
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}

// delete the User 
if (isset($_GET['u_id'])) {
  $id = $_GET['u_id'];

  $sql = "DELETE  FROM admin WHERE u_id ='$id'";

  if ($result = mysqli_query($conn, $sql)) {
    header("location:user.php");
  } else {
    echo "error occer";
  }
}


// Add the feature image
if (isset($_POST['submit_featureImage'])) {

  $file_name = $_FILES['image']['name'];
  $file_tmp = $_FILES['image']['tmp_name'];
  $file_size = $_FILES['image']['size'];
  $file_type = $_FILES['image']['type'];

  $Image_title = $_POST['image_name'];

  if ($file_size >  6458435) {
    echo "<h1>Image size too large!!!</h1>";
  } else {

    $upload = move_uploaded_file($file_tmp, "feature_image/" . $file_name);
    if ($upload) {
      $sql = "INSERT INTO features(image_title,feature_image) VALUES('$Image_title','$file_name')";
      mysqli_query($conn, $sql);
      header("location:index.php");
    }
  }
}

//product status 
if (isset($_GET['c_id'])) {  // Change 'nane' to 'name'
  $c_id = $_GET['c_id'];  // Correct variable name

  $sql = "UPDATE p_order SET p_status = 'Delivery' WHERE id = '$c_id'";

  if ($result = mysqli_query($conn, $sql)) {
    header("location: index.php");
    exit;  // Always good practice to exit after a header redirect
  } else {
    echo "error occurred";  // Corrected spelling
  }
}

// update the product status 

if (isset($_POST['update_status'])) {
  $order_id = $_POST['order_id'];
  $new_status = $_POST['newStatus'];

  $update_sql = "UPDATE P_order SET p_status='$new_status' WHERE id=$order_id";
  if (mysqli_query($conn, $update_sql)) {
    // Optional: success message or redirect
    $_SESSION['status_updated'] = "Product status updated successfully!";
    header("Location: order.php");
    exit();
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}
=======
<?php
// Database Connection
include 'config.php';
// Database Connection End

// Post the category data
if(isset($_POST['submit1'])){

        $Category_name= $_POST['category_name'];
        $Category_Disc= $_POST['product_contain'];
       
            $sql="INSERT INTO p_category(c_name) VALUES('$Category_name')";
              mysqli_query($conn,$sql);
              header("location:category.php");
    
           }
  
// Post the category data

// category delete form
if(isset($_GET['id'])){
  $id = $_GET['id'] ;

  $sql= "DELETE  FROM p_category WHERE c_id ='$id'";
 
  if($result = mysqli_query($conn,$sql)){
    header("location:category.php");
  }else{
    echo "error occer";
  }
}
// End of Category delete form

//category update data
if(isset($_POST['submit_update'])){
  $id = $_POST['id'];
  $name = $_POST['category_name'];

  $sql= "UPDATE p_category SET c_name = '$name'  WHERE c_id ='$id'";
 
  if($result = mysqli_query($conn,$sql)){
    header("location:category.php");
  }else{
    echo "error occer";
  }
}
// End of update category
// add the new user
if(isset($_POST['submit_user'])){
  $name = $_POST['user_name'];
  $password = $_POST['user_password'];
  $role = $_POST['user_role'];
 
  $sql = "INSERT INTO admin(username,password,role) VALUES ('$name','$password','$role')";
  $result = mysqli_query($conn,$sql);
  if ($result) {
    
    header("location:user.php?sucess = New User Created.");
  }else{
    echo "Error: " . mysqli_error($conn);
  }
}

// delete the User 
if(isset($_GET['u_id'])){
  $id = $_GET['u_id'] ;

  $sql= "DELETE  FROM admin WHERE u_id ='$id'";
 
  if($result = mysqli_query($conn,$sql)){
    header("location:user.php");
  }else{
    echo "error occer";
  }
}
// Add the feature image
if(isset($_POST['submit_featureImage'])){
    
  $file_name=$_FILES['image']['name'];
  $file_tmp=$_FILES['image']['tmp_name'];
  $file_size=$_FILES['image']['size'];
  $file_type=$_FILES['image']['type'];

  $Image_title= $_POST['image_name'];

  if($file_size >  6458435){
      echo "<h1>Image size too large!!!</h1>";
  }else{

     $upload=move_uploaded_file($file_tmp,"feature_image/".$file_name);
     if($upload){
      $sql="INSERT INTO features(image_title,feature_image) VALUES('$Image_title','$file_name')";
        mysqli_query($conn,$sql);
        header("location:dashboard.php");

     }
  }
 
 }
?>
>>>>>>> 615142914cbe64c1c2aca4c11032e84f5060e909
