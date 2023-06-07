<?php

    include("connect.php");
    session_start();
    if(isset($_SESSION['u_number'])){

    $number = $_SESSION['u_number'];
    $password = $_SESSION['u_password'];

    //user details 
    $select = "SELECT * FROM users WHERE u_number='$number' AND u_password='$password'";
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($result);
    
    $s_id = $_GET['s_id']; // seller id
    
    $pid = $_GET['p_id']; // product id

    //product details
    $select1 = "SELECT * FROM product2 WHERE id = '$pid'";
    $result1 = mysqli_query($conn, $select1);
    $row1 = mysqli_fetch_assoc($result1);

    $quantity = $row1['p_quantity'];

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Order form</title>
    <style>
        .d_main{
            width: 52%;
            margin: auto;
            background-color: #ddd;
            height: 690px;
            line-height: 50px;
        }
        .sd_btn1{
            color: maroon;
            background-color: #878787;
            padding: 15px 15px;
            border: none;
            font-weight: bolder;
            border-radius: 3px 3px;
        }
        .sd_btn2{
            color: white;
            background-color: orangered;
            padding: 15px 15px;
            border: none;
            font-weight: bolder;
            border-radius: 3px 3px;
        }
        .sd_btn2:hover{
            color: black;
            background-color: green;
            padding: 15px 15px;
            border: none;
            font-weight: bolder;
            border-radius: 3px 3px;
        }
        .d_main input[type=text], input[type=number], textarea, select{
            padding: 8px 18px;
            border-radius: 8px 0;
            border: none;
        }
        .d_main input[type=text]:hover{
            border:2px greenyellow;
        }
        .img{
            margin-top: 20px;
            margin-left: 550px;
            position: absolute;
        }
        img{
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="d_main">
        <div style="background-color: #878787;"><button style="margin-left: 10px;">1</button> <span>DELIVERY ADDRESS</span></div>
        <div>
            <input type="radio" required style="margin-left: 10px;" checked> <span>ADD A NEW ADDERSS</span>
        </div>
        <div class="img">
            <img src="upload-image/<?php echo $row1['image'] ?>" width="160px" height="160px">
            <h4 style="width: 220px;"><marquee behavior="left" direction=""><?php echo $row1['name'] ?></marquee></h4>

            <!-- out of stock -->
            <?php
                if($quantity <= 10){
                    echo "<font color='red'>Only ".$quantity." items left</font>";
                }
            ?>

        </div>

        <!-- start figure tag -->

        <form action="order_insert.php" method="post">
                <!-- product id -->
            <div><input type="hidden" name="p_id" value="<?php echo $pid; ?>"></div>
                <!-- seller id -->
            <div><input type="hidden" name="s_id" value="<?php echo $_GET['s_id'] ?>"></div>



            <div><input type="hidden" class="iprice" value="<?php echo $row1['price'] ?>"></div>
            <figure>
                <!-- location button -->
                <div><button class="sd_btn1"><i class="fa-solid fa-location-crosshairs"></i> Use my current location</button></div>
                <div><input type="text" name="name" value="<?php echo $row['u_name'] ?>" placeholder="Name" required> <input type="number" name="number" value="<?php echo $row['u_number'] ?>" placeholder="l0 digit mobile number" required></div>
                <div><input type="number" name="pincode" value="<?php echo $row['u_pincode'] ?>" placeholder="Pincode" required> <input type="text" name="gmail" value="<?php echo $row['u_email'] ?>" placeholder="Gmail address" required></div>
                <div><textarea name="address" value="<?php echo $row['u_address'] ?>" cols="35" rows="5" placeholder="Address (Area and Street)" required></textarea></div>
                <div>
                    <input type="text" name="city" value="<?php echo $row['u_city'] ?>" placeholder="City/District/Town" required> 
                    <select name="state" value="<?php echo $row['u_state'] ?>" required>
                        <option value="">--Select State--</option>
                        <option value="Bihar">Bihar</option>
                        <option value="West Bengal">West Bengal</option>
                        <option value="Assam">Assam</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Dehli">Dehli</option>
                        <option value="Mumbai">Mumbai</option>
                        <option value="Madhyapardesh">Madhyapardesh</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Lakhnaur">Lakhnaur</option>
                        <option value="Haidrabad">Haidrabad</option>
                        <option value="Gujrat">Gujrat</option>
                        <option value="Jharkhand">Jharkhand</option>
                    </select>
                </div>
                <div>
                    <input type="text" name="landmark" placeholder="landmark (Optional)">
                    <input type="number" name="altr_phone" placeholder="Alternate Phone (Optional)">
                </div>

                <?php
                    //quantity
                 if($quantity <= 10){
                    echo 'Quantity <input class="iquantity" type="number" onchange="subTotal()" name="quantity" min="1" max="'.$quantity.'" value="1">';
                }else{
                    
                    echo 'Quantity <input class="iquantity" type="number" onchange="subTotal()" name="quantity" min="1" max="10" value="1">';
                 }
                ?>

                Total Price = 
                <span class="itotal"><input type="text" id="itotal" name="tprice" value="<?php echo $row1['price'];?>"></span>
                <div>
                </div>
                <!-- <div>Address type <br> <input type="radio" name="otype" checked>Home (All day delivery) <input type="radio" name="otype"> Work (delivery between 10 AM - 5 PM)</div> -->
                <div style="color: red;"><b>Payment Method : </b></div>
                <div><input type="radio" name="method" id="check" value="Cash On D"> Cash On Deleviry <input type="radio" id="check2" name="method" value="Online"> Online Payment</div>
                <div>
                    <input type="submit" value="Order Now" class="sd_btn2" onclick="return check1()">
                    <!-- <button class="sd_btn2" style="margin-left: 210px;"><a href="#" style="text-decoration: none; color:white;">PAY NOW</a></button> -->
                </div>
            </figure>
        </form>
    </div>

    <script>        
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');

        var total = document.getElementById("itotal");
        
        function subTotal(){
            for(i= 0; i<iprice.length; i++){
                total.value = (iprice[i].value)*(iquantity[i].value);
            }
        }

        function check1(){
            var c = document.getElementById("check");
            var c2 = document.getElementById("check2");
            if(c.checked == false){
                if(c2.checked == false){
                    alert('please choose payment Method');
                    return false;
                }else{
                    alert("Sorry this optin is not availabe, Coming Soon");
                    return false;
                    // window.open();
                }
            }else{
                return true;
            }
        }

    </script>
<?php 
}else{
    header('location:login_form.php');
} 
?>
</body>
</html>
