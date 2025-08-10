<<<<<<< HEAD
<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    // Get existing data from DB
    $result = mysqli_query($conn, "SELECT * FROM product WHERE id = $id");
    $existing = mysqli_fetch_assoc($result);

    // Use new data if provided, otherwise keep old data
    $title     = !empty($_POST['product_title'])   ? $_POST['product_title']   : $existing['title'];
    $content   = !empty($_POST['product_contain']) ? $_POST['product_contain'] : $existing['dis'];
    $color     = !empty($_POST['product_color'])   ? $_POST['product_color']   : $existing['color'];
    $price     = !empty($_POST['product_price'])   ? $_POST['product_price']   : $existing['price'];
    $category  = !empty($_POST['Product_category'])? $_POST['Product_category']: $existing['category_id'];

    // Image handling
    if (!empty($_FILES['product_image']['name'])) {
        $file_name = $_FILES['product_image']['name'];
        $file_tmp  = $_FILES['product_image']['tmp_name'];
        $file_size = $_FILES['product_image']['size'];

        if ($file_size > 6458435) {
            echo "<h3>Image size too large!</h3>";
            exit;
        }

        move_uploaded_file($file_tmp, "images/" . $file_name);
        $imageToSave = $file_name;
    } else {
        $imageToSave = $existing['image'];
    }

    // Final update query
    $sql = "UPDATE product SET 
                title = '$title',
                category_id = '$category',
                dis = '$content',
                price = '$price',
                color = '$color',
                image = '$imageToSave'
            WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
=======
<?php
include 'config.php';



if(isset($_POST['submit'])){

       $id = $_POST['id'];

        $file_name=$_FILES['product_image']['name'];
        $file_tmp=$_FILES['product_image']['tmp_name'];
        $file_size=$_FILES['product_image']['size'];
        $file_type=$_FILES['product_image']['type'];

        $news_title= $_POST['product_title'];
        $news_contain= $_POST['product_contain'];
        $news_category= $_POST['product_color'];
        $news_price= $_POST['product_price'];
        $product_category= $_POST['Product_category'];

        if($file_size >  6458435){
            echo "<h1>Image size too large!!!</h1>";
        }else{
           //$sql="INSERT( INTO image(image) VALUES($$file_name)";
           //mysqli_query($db_conn,$sql);
    
           $upload=move_uploaded_file($file_tmp,"images/".$file_name);
           if($upload){
            $sql = "UPDATE product SET title='$news_title',category_id = '$product_category', dis='$news_contain', price='$news_price', color='$news_category', image='$file_name' WHERE id=$id";
              mysqli_query($conn,$sql);
              header("location:dashboard.php");
    
           }else{
            echo "file too large!!";
           }

        }
       
    }
    
?>
>>>>>>> 615142914cbe64c1c2aca4c11032e84f5060e909
