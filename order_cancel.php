<?php
    include('./connect.php');

    if(isset($_GET['p_id'])){
        session_start();
        $u_id = $_SESSION['user_id']; //User id.

        $p_id = $_GET['p_id'];  //Product id.
        $o_id = $_GET['o_id'];  //Order id (order table).

        //quantity ke liye.
        $select = "SELECT * FROM orders WHERE o_id = '$o_id'";
        $result = mysqli_query($conn, $select);
        $row = mysqli_fetch_assoc($result);

        $quantity = $row['o_quantity']; //total quantity

        $update_quantity = "UPDATE product2 SET p_quantity = p_quantity + '$quantity' WHERE id = '$p_id'";
        mysqli_query($conn, $update_quantity);

        $update = "UPDATE orders SET c_status = 1 WHERE o_id = '$o_id'";

        mysqli_query($conn, $update);
        ?>
        <script>
            window.location.assign("u_v_order.php");
        </script>
        <?php
    }
?>

<!-- user_id='$u_id' AND p_id='$p_id' AND  -->