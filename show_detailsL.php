<?php

include('connect.php');
session_start();

if (isset($_SESSION['u_number']) && isset($_SESSION['u_password'])) {
    $select = "SELECT * FROM users WHERE u_number='$_SESSION[u_number]' AND u_password='$_SESSION[u_password]'";
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($result);
    include('./mainu_after_login.php');
} else {
    include('./mainu.php');
}

$id = $_GET['pid']; //product id
$select2 = "SELECT * FROM product2 WHERE id = '$id'";
$result2 = mysqli_query($conn, $select2);
$data = mysqli_fetch_assoc($result2);

$category = $data['category'];
$name = $data['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Product Details</title>
    <style>
        .s_btn {
            color: while;
            background-color: dodgerblue;
            border: none;
            padding: 9px 60px;
            border-radius: 5px;
        }
        .s_btn a{
            text-decoration: none;
            color:white;
        }

        .s_btn:hover {
            background-color: green;
            color: black;
        }

        .checked {
            color: orange;
        }

        ::-webkit-scrollbar {
            width: 0;
        }

        .p_main {
            display: flex;
            overflow: scroll;
            width: 99vw;
            height: 70vh;
        }

        .items {
            width: 99vw;
            height: 550px;
            display: flex;
            align-items: center;
            padding: 0 40px;
            justify-content: space-evenly;
            flex-wrap: wrap;
            /* overflow-x: hidden; */
            /* overflow-y: auto;  */
            gap: 20px;
            margin-top: 25px;
            /* overflow: scroll; */
        }
        .cards { 
            width: 250px;
            height: 360px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 15px;
            /* border: 2px solid green; */
            background-color: whitesmoke;
        }

        .cards:hover {
            /* border: 2px solid green; */
            box-shadow: 1px 4px 10px 6px #000;
        }

        .p2_img {
            width: 250px;
            height: 230px;
            border-radius: 15px;
        }

        .p2_img:hover {
            width: 252px;
            height: 231px;
        }

        .buy_cart {
            color: while;
            background-color: dodgerblue;
            border: none;
            padding: 9px 8px;
            border-radius: 5px;
        }

        .buy_cart:hover {
            background-color: green;
            color: black;
        }
        /* ratting code */
        .review{
            background-color: #F3D0D0;
            width: 60vw;
            height: 50vh;
            padding: 15px;
            margin-left: 300px;
        }
        .r_img {
            display: flex;
            background-color: #F3B9B9;
            margin-top: 20px;            
            overflow-x: auto;
            width: 60vw;
            gap: 5px;
        }
        .star{
            font-size: 20px;
            font-weight: 800;
            color: darkgreen;
            padding: 15px;
        }
        .u-name{
            background-color: #B8AFAF;
            height: 50vh;
            padding-left: 20px;
            overflow-y: auto;
        }
        .star2{
            color: green;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div>
        <?php include('./first_product.php') ?>
    </div>
    <!-- ratting -->
    
    <div style="width:99%; margin-top:10px; display:flex; height:375px; border: 2px solid #ddd; margin-left:6px;">
        <!-- right side -->
        <div style="width:30%;height:375px; align-items:center;">
            <img src="upload-image/<?php echo $data['image'] ?>" width="450px" height="370px" style="margin-left: 4px; border-radius:15px;">
        </div>
        <!-- left side -->
        <div style="width: 68%; background-color:#ddd; height:353px; padding:10px 30px;">
            <h2 style="margin-top: 4vh;">Original stylish <?php echo $data['name']; ?> feku item Puspa Brand products...</h2><br><br>
            <p style="color: green; font-size:20px;">Special price</p>
            <p style="font-size: 24px;">Rs <?php echo $data['price']; ?> <s style="color: maroon;">Rs 1,00,000</s> <span style="color: green;">80% off</span></p><br>
            <p style="margin-bottom: 10px;">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
            </p>
            <ul style="margin-left: 3vw;">
                <li>Special PriceGet extra 16% off(price inclusive of discount)T&C</li>
                <li>Bank Offer 10% Instant Discount* with Axis Bank Credit and Debit CardsT&C</li>
                <li>Bank Offer 10% Instant Discount on Mastercard on Fashion for First 3 prepaid PaymentsT&C</li>
                <li>Bank offer 10% Instant Discount on ICICI Bank Credit Cards.T&C</li>
            </ul><br><br>
            <div>
                <?php
                if (isset($_SESSION['u_number']) && isset($_SESSION['u_password'])) {
                    ?>
                    <!-- user ka id OR product ka id add to cart ke liye  -->
                    <button class="s_btn" style="margin-left: 4vw;"><a href="cart_query.php ?p_id=<?php echo $data['id']; ?>&& u_id=<?php echo $row['id']; ?>" style="text-decoration: none; color:white;">Add To Cart</a></button>
                    <!-- seller ka id or product ka id order table me insert ke liye -->
                    <?php
                    if($data['p_quantity'] > 0){ // stock
                        ?>
                        <button class="s_btn" style="margin-left: 10vw;"><a href="order_form.php ?p_id=<?php echo $data['id']; ?> && s_id=<?php echo $data['seller'] ?>">Buy Now</a></button>
                        <?php
                    }else{
                        
                        echo '<button class="s_btn" style="margin-left: 10vw;"><a style="color:red; font-weight:700;">Out Of Stock</a></button>';
                    }
                    ?>
                <?php
                } else {
                    ?>
                    <button class="s_btn"><a href="login_form.php" style="font-size:18px;">Login</a></button>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <?php 

        $sel = "SELECT * FROM product2 WHERE (category LIKE '%$category%' OR name LIKE '%$name%') AND (id != '$id' AND status = 0)";
        $res = mysqli_query($conn, $sel);
        
        if(mysqli_num_rows($res) > 0){ 
            
    ?>
        <!-- extra wala -->
        <div class="p_main">
            <div class="items">
                <!-- <hr style="background-color: #ddd; width:100%; height:1px;"> -->
                <?php
                    while ($extra = mysqli_fetch_assoc($res)) {
                        ?>
                        <div class="cards">
                            <div>
                                <a href="./show_detailsL.php?pid= <?php echo $extra['id']; ?>" style="text-decoration: none; color:aliceblue;">
                                    <img src="upload-image/<?php echo $extra['image'] ?>" class="p2_img">
                            </div>
                            <div style="overflow-x: scroll; height:38px; color:#000;">
                                <p><?php echo $extra['name'] ?></p>
                            </div>
                            <div style="color: green;text-align:center;"><?php echo $extra['price'] ?>.00 /-</div>
                            <div style="margin-top: 10px;">
                                
                            <button class="buy_cart">View Details</a></button>
                            
                            <?php
                                    if($extra['p_quantity'] > 0){ // stock
                                        ?>
                                    <button class="buy_cart" style="margin-left: 3vw;"><a href="order_form.php?p_id=<?php echo $extra['id'] ?> && s_id=<?php echo $extra['seller'] ?>" style="text-decoration: none; color:aliceblue;">Buy Now</a></button>
                                    <?php
                                    }else{
                                        echo '<button class="buy_cart" style="margin-left: 2.50vw;"><a style="color:red; font-weight:700;">Out Of Stock</a></button>';
                                    }
                                ?>
                            </div>
                            
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        
        <?php
            $view = "SELECT * FROM review WHERE product_id = '$id'";
            $result2 = mysqli_query($conn, $view);

            if (mysqli_num_rows($result2) > 0) {
        ?>
        <div class="review">
            <?php
            //show ratting
    
                $star = 0; //ratting star
                echo '<div class="r_img">';
    
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $star = $star + $row2['star']; //total star
            ?>
                    <div><img src="ratting-images/<?php echo $row2['r_image'] ?>" width="80px" height="80px"></div>
                <?php
                }
                echo '</div>';
                echo "<div class='star'>Got total " . $star . " stars</div>";
            }
    
            #users table, product2 table, review table
            $select9 = "SELECT u_name, star, descreption, r_image FROM review JOIN
            users ON review.user_id = users.id JOIN 
            product2 ON review.product_id = product2.id 
            WHERE review.product_id = '$id'";
    
            $result9 = mysqli_query($conn, $select9);
    
            if (mysqli_num_rows($result9) > 0) {
                echo '<div class="u-name">';
                while ($row9 = mysqli_fetch_assoc($result9)) {
                ?>
                    <div style="font-size: 20px;"><br><b><?php echo $row9['u_name'] ?></b></div>
                    <div class="star2">Star <?php echo $row9['star'] ?></div>
                    <div style="margin-top: 5px;"><?php echo $row9['descreption'] ?></div>
                    <div><img src="ratting-images/<?php echo $row9['r_image'] ?>" width="80px" height="70px"></div>
                <?php
                }
                echo '</div>';
            }
            ?>
        </div>

        <div style="margin-top: 150px;">
        <?php
            include('./footer.php');
        ?>
        </div>
</body>

</html>