<?php
    include('connect.php');
    session_start();

    $u_id = $_SESSION['user_id'];
    $p_id = $_GET['p_id'];

    $remove = "DELETE FROM cart WHERE user_id='$u_id' AND p_id='$p_id'" or die('Delete query failed');

    mysqli_query($conn, $remove) or die('Somthing Wroge');
    header('location:my_cart.php');

    // $result = mysqli_query($conn, $remove);
    // if($result){
    //     header('location:my_cart.php');
    // }else{
    //     echo "Somthing wronge";
    // }
?>