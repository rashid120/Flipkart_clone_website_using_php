<?php 
    include('connect.php');
    // session_start();
    if(isset($_SESSION['user_id'])){

        $id = $_SESSION['user_id'];
        $select3 = "SELECT * FROM cart WHERE user_id = '$id'";
        $result3 = mysqli_query($conn, $select3);

        $items = mysqli_num_rows($result3);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>flipkart header</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    <style>
        *{
            padding: 0.10px;
            margin: 0px;
        }
        .header{
            background-color: #2874f0;
            height: 57px;
            color: white;
            position: fixed;

            width: 100%;
            z-index: 2;
            /* margin-bottom: 30px; */
        }
        .mainu{
            width: 78%;
            display: flex;
            justify-content: space-around;
            margin-left: 20vh;
            font-size: 18px;
            font-weight: bold;
        }
        .mainu input[type=search]{
            padding: 10px;
            padding-right: 22vw;
            /* text-align: right; */
            border: none;
            border-radius: 2px 2px;
            /* background: #2874f0 url("fa-sharp fa-solid fa-magnifying-glass") right no-repeat; */
        }
        .mainu button{
            padding: 0.60vh 4.50vh;
            font-size: 2.20vh;
            
            border: none;
            border-radius: 2px 2px;
        }
        .fa-angle-down:hover {
            transform: rotate(180deg);
            /* -webkit-transform: rotate(45deg); */
        }
        .header a{
            text-decoration: none;
            color: #2874f0;
            color: white;
        }
        .explore{
            color: white;
        }
        .explore:hover{
            text-decoration: underline white;
            
        }
        .top{
            margin-top: 2.10vh;
            /* margin-left: 1vh; */
        }
        .fa-magnifying-glass{
            position: absolute;
            /* margin-top: 1vh; */
            z-index: 1;
            color: #2874f0;
            transform: translate(-210%,50%);
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            line-height: 50px;
            min-width: 250px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            margin-top: 0.50vh;
            font-size: 2vh;
            /* padding-left: 3vh; */

        }
        .dropdown-content a {
            color: black;
            /* padding: 15px 20px; */
            text-decoration: none;
            /* display: block; */
        }
        .dropdown:hover .dropdown-content {display: block;}
        .dropdown:hover .dropbtn {background-color: #3e8e41;}
        .sign:hover{
            text-decoration: underline #2874f0;
        }
        .dropbg{
            padding-left: 3vh;
        }
        .dropbg:hover{
            background-color: #ddd;
        }
        .dropbg i{
            color: #2874f0;
            /* color: black; */
        }
        .dropdown2{
            position: relative;
            display: inline-block;
        }
        .dropdown-content2{
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            line-height: 50px;
            min-width: 250px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            margin-top: 0.50vh;
            font-size: 2vh;
            color: black;
        }
        .dropdown2:hover .dropdown-content2{
            display: block;
        }
    </style>
</head>
<body> <!--navigation bar-->
    <div class="header">
        <div class="mainu">
            <div style=" font-size:1.50vh; color:white; margin-top: 1vh;"><span style="font-size:2.80vh; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><b>Flipkart</b></span><br><i><a href="" class="explore" style="color:white;"> Explore <span style="color:yellow;">Pluse +</a></i></span></div>
            <div style="margin-top: 1.20vh;"><form action="search.php" role="search" method="get"><input type="search" name="search" placeholder="Search for products, brands and more" aria-label="Search"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></form></div>
          <!--dropdown login button-->
            <div class="dropdown">
                <div style="margin-top: 2.20vh;"><?php if(isset($_SESSION['u_name'])){echo $_SESSION['u_name'];}else{ ?><button onclick="show()"><a style="color: #2874f0;">Login</a></button><?php }?></div> <!--  id="login"-->
                
                <div class="dropdown-content">
                    <div class="dropbg"><a href="user_profile.php"><i class="fa-sharp fa-solid fa-circle-user"></i>&nbsp;&nbsp;&nbsp; My profile</a></div>
                    <!-- <div><hr></div>
                    <div class="dropbg"><a href="#"><i class="fa-thin fa-dollar"></i>&nbsp;&nbsp;&nbsp; SuperCoin Zone</a></div>
                    <div><hr></div>               
                    <div class="dropbg"><a href="#"><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;&nbsp; Flipkart Pluse Zone</a></div> -->
                    <div><hr></div>
                    <!-- order page link -->
                    <?php if(isset($_SESSION['u_name'])){echo '<div class="dropbg"><a href="u_v_order.php"><i class="fa-sharp fa-solid fa-wallet"></i>&nbsp;&nbsp;&nbsp; Orders</a></div>';}
                    else{ ?><div class="dropbg" onclick="open()"><a href="#"><i class="fa-sharp fa-solid fa-wallet"></i>&nbsp;&nbsp;&nbsp; Orders</a></div><?php }?>
                    
                    <div><hr></div>
                    <div class="dropbg"><a href="#"><i class="fa-solid fa-heart"></i>&nbsp;&nbsp;&nbsp;Wishlist</a> </div>
                    <div><hr></div>
                    <!-- <div class="dropbg"><a href="#"><i class="fa-sharp fa-solid fa-forward"></i>&nbsp;&nbsp;&nbsp; Rewards</a></div>
                    <div><hr></div>
                    <div class="dropbg"><a href="#"><i class="fa-solid fa-wallet"></i>&nbsp;&nbsp;&nbsp; Gift Cards</a></div>
                    <div><hr></div> -->
                    <?php if(isset($_SESSION['u_name'])){echo '<div class="dropbg"><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;&nbsp;&nbsp; LogOut</a></div>';}?>
                </div>
            </div>

            <div class="top"><a href="./seller/add_seller.php">Become a Seller</a></div>
            
         <!--second dropdonwn = more-->
            <!-- <div class="dropdown2">
                <div class="top">More <i class="fa-solid fa-angle-down"style="color: white;"></i></div>

                <div class="dropdown-content2">
                    <div class="dropbg"><i class="fa-solid fa-bell"></i>&nbsp;&nbsp;&nbsp; Notification Preferences</div>
                    <div><hr></div>
                    <div class="dropbg"><i class="fa-solid fa-question"></i>&nbsp;&nbsp;&nbsp;24x7 Customer Care</div>
                    <div><hr></div>
                    <div class="dropbg"><i class="fa-solid fa-arrow-trend-up"></i>&nbsp;&nbsp;&nbsp;Advertise</div>
                    <div><hr></div>
                    <div class="dropbg"><i class="fa-sharp fa-solid fa-download"></i>&nbsp;&nbsp;&nbsp; Download App</div>
                </div>
        </div> -->

            <div class="top"> <a href="my_cart.php" style="color: white; text-decoration:none;"><i class="fa-sharp fa-solid fa-cart-shopping" style="color: white;"></i> Cart (<?php if(isset($items)){ echo "<font color='red'>".$items."</font>";} ?>)</a></div>
        </div>
    </div>
    <?php include('login.php'); ?>
    <!-- <script>
        function open(){
            window.open("u_v_order.php","_blank");
        }
    </script> -->
</body>
</html>