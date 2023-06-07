<?php
    include("./connect.php");
 
    $p_id = $_GET['p_id'];    
    $user_id = $_GET['u_id'];

    
    $insert = "INSERT INTO cart(user_id, p_id) VALUES 
    ('$user_id', '$p_id')";

    $result = mysqli_query($conn, $insert);

    if($result){
        // session_start();
        // $_SESSION['p_id'] = $p_id;
        header('location:my_cart.php');
    }else{
        echo "Somthing wronge";
    }
?>