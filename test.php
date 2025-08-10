<<<<<<< HEAD
<?php
$version= time();
?>
<?php
$page = basename($_SERVER['PHP_SELF']);

$url = basename($_SERVER['REQUEST_URI']);
switch ($page) {
  case 'index.php':
    $title= "Home";
    break;
  
  case 'product.php':
    $title="product";
    break;
  
   case 'cantact.php':
    $title= "contact";
    break;

  case 'about.php':
    $title = "About";
    break;

    case 'other.php':
     $title = "Others";
    break;

    case 'user_signup.php':
     $title = "user";
    break;

    case 'addcart.php':
     $title = "Addcart";
    break;

}
=======
<?php
$version= time();
?>
<?php
$page = basename($_SERVER['PHP_SELF']);

$url = basename($_SERVER['REQUEST_URI']);
switch ($page) {
  case 'index.php':
    $title= "Home";
    break;
  
  case 'product.php':
    $title="product";
    break;
  
   case 'cantact.php':
    $title= "contact";
    break;

  case 'about.php':
    $title = "About";
    break;

    case 'other.php':
     $title = "Others";
    break;

    case 'user_signup.php':
     $title = "user";
    break;

    case 'addcart.php':
     $title = "Addcart";
    break;

}
>>>>>>> 615142914cbe64c1c2aca4c11032e84f5060e909
?>