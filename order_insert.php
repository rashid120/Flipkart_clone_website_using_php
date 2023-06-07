<?php
    include("connect.php");

    $name = $_POST['name'];
    $number = $_POST['number'];
    $gmail = $_POST['gmail'];
    $pin = $_POST['pincode'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $landmark = $_POST['landmark'];
    $method = $_POST['method'];
    $p_id = $_POST['p_id'];
    $s_id = $_POST['s_id'];
    $tprice = $_POST['tprice'];
    $quantity = $_POST['quantity'];

    session_start();
    $u_id = $_SESSION['user_id'];

    $insert = "INSERT INTO orders
    (o_name, o_number, o_gmail, o_pincode, o_address, o_city, o_state, o_landmark, pay_method, o_status, user_id, p_id, o_delivered, o_seller_id, o_tprice, o_quantity, c_status) 
    VALUES ('$name','$number','$gmail','$pin','$address','$city','$state','$landmark','$method', 'Pending', '$u_id', '$p_id', '', '$s_id', '$tprice', '$quantity', 0)" or die("insert qeury failed");

    $result = mysqli_query($conn, $insert) or die("query failed");

    $update_quantity = "UPDATE product2 SET p_quantity = p_quantity - '$quantity' WHERE id = '$p_id'";
    mysqli_query($conn, $update_quantity);

    if($result){
        ?>
            <script>
                alert("Your order is inprosesing. Thank You❤️💕")
                window.location.assign("u_v_order.php");
            </script>
        <?php
    }
?>