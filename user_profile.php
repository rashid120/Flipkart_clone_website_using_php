<?php
    include("./connect.php");

    session_start();
    $u_id = $_SESSION['user_id'];
    
    $sel = "SELECT * FROM users WHERE id = '$u_id'";
    $result = mysqli_query($conn, $sel);

    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>User profile</title>
    <style>
        ::-webkit-scrollbar{
            width: 0;
        }
        .u_main{
            width: 100%;
            display: flex;
            gap: 25px;
            margin-top: 10px;
        }
        .right{
            width: 25%;
            /* line-height: 50px; */
        }
        .u-1st{
            display: flex;
            gap: 20px;
            background-color: #ddd;
            margin-left: 100px;
        }
        .s-img{
            width: 90px;
            height: 90px;
            overflow: scroll;
            border-radius: 50%;
            border: 1px solid #28f;
            background-color: #28f5;
        }
        .left{
            width: 60%;
            background-color: #ddd;
            height: 500px;
            line-height: 40px;
        }
        .o-details{
            margin-left: 100px;
            background-color: #ddd;
            margin-top: 20px;
            padding-left: 20px;
            line-height: 40px;
            height: 300px;
        }
        .log{
            margin-top: 20px; 
            background-color:#ddd; 
            margin-left:100px;
            padding: 20px;
            font-size: 20px;
        }
        strong{
            margin-left: 12px;
            padding: 10px;
            color: #dd2ddd;
            border: 1px solid #dd2ddd;
        }
    </style>
</head>
<body>
    <?php include("./mainu_after_login.php"); include("./first_product.php");?>
    <div class="u_main">
        <div class="right"><!--right side-->
            <div class="u-1st">
                <div class="s-img"><img src="upload-image/<?php echo $row['u_image'] ?>" width="120px" height="120px"></div>
                <div><br>Hello 👋 <br> <?php echo $row['u_name'] ?></div>
            </div>

            <div class="o-details"> <!--ulta sida-->
                <h2 style="text-align: center;">Order details</h2>
                <hr>
                <div>
                    <h3>Pincode</h3>
                    <strong><?php echo $row['u_pincode'] ?></strong>
                </div>
                <div>
                    <h3>Address</h3>
                    <strong><?php echo $row['u_address'] ?></strong>
                </div>
                <div>
                    <h3>City</h3>
                    <strong><?php echo $row['u_city'] ?></strong>
                </div>
            </div>
            <div class="log"> <!-- logout button-->
                <a href="logout.php">LogOut <i class="fa-solid fa-right-from-bracket"></i></a>
            </div> 
        </div>

        <div class="left">   <!--left side-->
            <div style="display: flex; justify-content:space-evenly; padding-top:10px;">
                <div><h1>My information</h1></div>
                <div style="font-size: 20px;"><a href="./edit_user.php ?uid=<?php echo $row['id'] ?>">Edit <i class="fa-solid fa-user-pen"></i></a></div>
            </div>
            <div><hr></div>
            <div style="font-size: 20px; margin-top:25px; display:flex; justify-content:space-around;">
                <div><fieldset style=" width:300px; background-color:white;">Name - <?php echo $row['u_name']; ?></fieldset></div>
                <div><fieldset style=" width:300px; background-color:white;">Gender - <?php echo $row['gender']; ?></fieldset></div>
            </div><br>
            <div style="font-size: 20px; margin-top:15px; display:flex; justify-content:space-around;">
                <div><fieldset style=" width:300px; background-color:white;">Email - <?php echo $row['u_email']; ?></fieldset></div>
                <div><fieldset style=" width:300px; background-color:white;">Number - <?php echo $row['u_number']; ?></fieldset></div>
            </div><br>
            <div style="font-size: 20px; margin-top:15px; display:flex; justify-content:space-around;">
                <div><fieldset style=" width:300px; background-color:white;">Pincode - <?php echo $row['u_pincode']; ?></fieldset></div>
                <div><fieldset style=" width:300px; background-color:white;">Address - <?php echo $row['u_address']; ?></fieldset></div>
            </div><br>
            <div style="font-size: 20px; margin-top:15px; display:flex; justify-content:space-around;">
                <div><fieldset style=" width:300px; background-color:white;">City - <?php echo $row['u_city']; ?></fieldset></div>
            </div>
        </div> 
    </div>
</body>
</html>