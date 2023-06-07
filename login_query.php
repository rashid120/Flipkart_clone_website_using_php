<?php
    include('connect.php');

    session_start();
    if(count($_POST) > 1){

    $contact = $_POST['contact'];//."<br>"."<br>"."<br>"        echo "<br>";
    $password = $_POST['password'];

    $read = "SELECT * FROM users WHERE u_number='$contact' AND u_password='$password'";

    $result = mysqli_query($conn, $read);

    $row = mysqli_fetch_assoc($result);

    if(is_array($row)){
        $_SESSION['u_number'] = $row['u_number'];
        $_SESSION['u_password'] = $row['u_password'];
        $_SESSION['u_name'] = $row['u_name'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['status'] = $row['status'];
    }

    // $condition = isset($row);//&&($contact == $row['u_number'])

    if(isset($row) && $_SESSION['u_number'] == $row['u_number'] && $_SESSION['u_password'] == $row['u_password']){
        if($_SESSION['status'] == 1){
            ?>
                <script>
                    alert("Your are bloked");
                    window.open("login_form.php", "_parent");
                </script>
            <?php
            die();
        }else{
           header('location:flipkart.php');
        }
    }else{
    ?>
        <script>
            alert('Wronge password');
            window.location.assign("login_form.php");
        </script>
    <?php
    
    }
    }
?>