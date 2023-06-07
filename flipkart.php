<?php
    include('connect.php');
    session_start();
    if(isset($_SESSION['u_number'])){
    $select = "SELECT * FROM users WHERE u_number='$_SESSION[u_number]' AND u_password='$_SESSION[u_password]'";

    $result = mysqli_query($conn,$select);

    $row = mysqli_fetch_assoc($result);
?>
    <?php 
        include('./mainu_after_login.php');
        include('login.php');
        include('./first_product.php');
        include('product.php'); //slider wala product table name scroll_product

        include('product2.php'); //table name product2
        include('./second_product.php');
    ?>
<?php 
    }else{
        echo "<h1 style='text-align:center; margin-top: 30vh;'>Please login your account.. <a href='login_form.php'>Login</a></h1>";
    } 
?>