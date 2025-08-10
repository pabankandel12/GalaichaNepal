<<<<<<< HEAD
<?php
  include "config.php";
  if(isset($_GET['id'])){
  $id = $_GET['id'] ;
  $sql= "DELETE  FROM product WHERE id ='$id'";
 
  if($result = mysqli_query($conn,$sql)){
    header("location:home.php");
  }
}
=======
<?php
  include "config.php";
  if(isset($_GET['id'])){
  $id = $_GET['id'] ;
  $sql= "DELETE  FROM product WHERE id ='$id'";
 
  if($result = mysqli_query($conn,$sql)){
    header("location:home.php");
  }
}
>>>>>>> 615142914cbe64c1c2aca4c11032e84f5060e909
?>