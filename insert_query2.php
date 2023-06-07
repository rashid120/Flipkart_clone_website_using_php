<?php
    include 'connect.php';

    //product insert

$name = $_POST['name'];
$price = $_POST['price'];
$image = $_FILES['image'];
$category = $_POST['category'];
$about = $_POST['about'];

$quantity = $_POST['quantity'];

$img_name = $image['name'];
$img_tmp = $image['tmp_name'];

$s_id = $_POST['seller_id'];

    move_uploaded_file($img_tmp, "upload-image/".$img_name);

$insert = "INSERT INTO product2 (image, name, price, seller, category, p_quantity, p_about) VALUES 
('$img_name', '$name', '$price', '$s_id', '$category', '$quantity', '$about')";

$result = mysqli_query($conn, $insert);

if($result){
    ?>
    <script>
        alert('Your product has been inserted');
        window.history.back();
    </script>
    <?php
}else{
    echo "not inserted";
}
?>