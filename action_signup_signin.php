<?php
session_start();
include('admin/config.php');
?>

<?php
if(isset($_POST['submit1'])){
  $Fullname = $_POST['fullname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $number = $_POST['number'];
  $address =$_POST['address'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  $file_name=$_FILES['profileImage']['name'];
  $file_tmp=$_FILES['profileImage']['tmp_name'];
  $file_size=$_FILES['profileImage']['size'];
  $file_type=$_FILES['profileImage']['type'];

  $upload= move_uploaded_file($file_tmp,"user-image/".$file_name);

  if($password === $cpassword){
    $sql = "INSERT INTO User(name,username,email,phone,password,pro_image,address) Values('$Fullname','$username','$email','$number','$password', '$file_name','$address')";
    if(mysqli_query($conn,$sql)){
        header("Location: index.php");
    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }else{
    echo "<script>alert('password does't match!'); window.location='index.php';</script>";
  }
}

?>

<?php   
if(isset($_POST['submit'])){
  $username = $_POST['email'];
  $password = $_POST['password'];

  if(!empty($username) && !empty($password)){
      $sql = "SELECT * FROM user";
      $result = mysqli_query($conn, $sql);

      if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
              if($row['email'] == $username && $row['password'] == $password){
                  $_SESSION['username'] = $username;
                  echo "<script>alert('You are Login!'); window.location='index.php';</script>";
                  exit; // stop the script from continuing
              }
          }
          echo "<script>alert('wrong username or password!!'); window.location='index.php';</script>";
      } else {
          echo "<script>alert('No users found!'); window.location='index.php';</script>";
      }
  }
}
      
 ?>