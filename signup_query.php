<?php
    include('connect.php');

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $image = $_FILES['image'];

    $img_name = $image['name'];
    $img_tmp = $image['tmp_name'];

        move_uploaded_file($img_tmp, "upload-image/".$img_name);

    $insert = "INSERT INTO users(u_name, gender, u_email, u_number, u_password, u_image) VALUES 
    ('$name', '$gender', '$email', '$number', '$password', '$img_name')";

    $result = mysqli_query($conn, $insert);

    if($result){
        header('location:login_form.php');
    }else{
        echo "Data not inserted";
    }
?>