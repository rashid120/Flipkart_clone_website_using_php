<?php

    // user update form

    include('./connect.php');

    $id = $_POST['id'];

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $image = $_FILES['image'];

    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $city = $_POST['city'];

    $img_name = $image['name'];
    $img_tmp = $image['tmp_name'];

        move_uploaded_file($img_tmp, "../upload-image/".$img_name);
    if($img_name == ""){
        $upadte = "UPDATE users SET u_name='$name', 
        gender='$gender', u_email='$email', u_number='$number', 
        u_password='$password', u_address='$address', 
        u_pincode='$pincode', u_city='$city' WHERE id='$id'";
    }else{
        $upadte = "UPDATE users SET u_name='$name', gender='$gender', 
        u_email='$email', u_number='$number', u_password='$password', 
        u_image='$img_name', u_address='$address', u_pincode='$pincode', 
        u_city='$city' WHERE id='$id'";
    }

    $result = mysqli_query($conn, $upadte);

    if($result){
        ?>
            <script>
                window.history.go(-2);
            </script>
        <?php
        // header("location:user_profile.php");
    }else{
        echo "Failed";
    }
?>