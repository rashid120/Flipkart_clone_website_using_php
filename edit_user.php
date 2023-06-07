
<?php
    include("./connect.php");

    session_start();

    $id = $_GET['uid'];
    $sel = "SELECT * FROM users WHERE id = '$id'";
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
        }
        .u-1st{
            display: flex;
            gap: 20px;
            background-color: #ddd;
            margin-left: 100px;
            height: 150px;
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
            height: 530px;
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
        /* input[value]{
            font-size: 14px;
        } */
        input[type=text], input[type=password], input[type=number]{
            background-color: transparent;
            border: none;
            width: 200px;
            outline: 0;
            font-weight: 580;
            font-size: 18px;
        }
        input[type=text]:hover, input[type=password]:hover, input[type=number]:hover{
            border-bottom: 2px solid #dd2ddd;
        }
        input[type=submit]{
            font-size: 18px;
            color: #28f;
            border: 1px solid #dd2ddd;
            padding: 7px 10px 7px 10px;
        }
        input[type=submit]:hover{
            font-size: 18px;
            color: #dd2ddd;
            border: 1px solid #28f;
            padding: 7px 10px 7px 10px;
            background-color: #ddd;
            /* animation: all ease 1s ease-in-out 1s; */
        }
        ::-webkit-file-upload-button{
            font-weight: 600;
            color: red;
        }
    </style>
</head>
<body>
    <?php include("./mainu_after_login.php"); include("./first_product.php");?>
    <form action="edit_uquery.php" method="post" enctype="multipart/form-data">
        <div class="u_main">
            <div><input type="hidden" name="id" value="<?php echo $row['id']; ?>"></div>
            <div class="right"><!--right side-->
                <div class="u-1st">
                    <div class="s-img"><img src="upload-image/<?php echo $row['u_image'] ?>" width="120px" height="120px"></div>
                    <div><br>Hello 👋 <br> <?php echo $row['u_name'] ?></div>
                </div>
                <!-- Image -->
                <div style="position: absolute; z-index: 1; top:290px;left:160px;">Image : <input type="file" name="image"></div>

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
                <!-- logout button-->
                <!-- <div class="log">
                    <a href="">LogOut <i class="fa-solid fa-right-from-bracket"></i></a>
                </div>  -->
            </div>

            <div class="left">   <!--left side-->
                <div style="display: flex; justify-content:space-evenly; padding-top:10px;">
                    <div><h1>My information</h1></div>
                    <!-- <div style="font-size: 20px;"><a href="./edit_user.php ?uid=<?php echo $row['id'] ?>">Edit <i class="fa-solid fa-user-pen"></i></a></div> -->
                </div>
                <div><hr></div>
                <div style="font-size: 20px; margin-top:25px; display:flex; justify-content:space-around;">
                    <div><fieldset style=" width:300px; background-color:white;">Name - <input type="text" name="name" value="<?php echo $row['u_name']; ?>"></fieldset></div>
                    <div><fieldset style=" width:300px; background-color:white;">Gender - <input type="text" name="gender" value="<?php echo $row['gender']; ?>"></fieldset></div>
                </div><br>
                <div style="font-size: 20px; margin-top:15px; display:flex; justify-content:space-around;">
                    <div><fieldset style=" width:300px; background-color:white;">Email - <input type="text" name="email"  value="<?php echo $row['u_email']; ?>"></fieldset></div>
                    <div><fieldset style=" width:300px; background-color:white;">Number - <input type="number" name="number"  value="<?php echo $row['u_number']; ?>"></fieldset></div>
                </div><br>
                <div style="font-size: 20px; margin-top:15px; display:flex; justify-content:space-around;">
                    <div><fieldset style=" width:300px; background-color:white;">Pincode - <input type="number" name="pincode" value="<?php echo $row['u_pincode'] ?>"></fieldset></div>
                    <div><fieldset style=" width:300px; background-color:white;">Address - <input type="text" name="address" value="<?php echo $row['u_address'] ?>"></fieldset></div>
                </div><br>
                <div style="font-size: 20px; margin-top:15px; display:flex; justify-content:space-around;">
                    <div><fieldset style=" width:300px; background-color:white;">City - <input type="text" name="city" value="<?php echo $row['u_city'] ?>"></fieldset></div>
                    <div><fieldset style=" width:300px; background-color:white;">Password - <input type="text" name="password"  value="<?php echo $row['u_password']; ?>"></fieldset></div>
                </div><br>
                <div style="text-align: center;"><input type="submit" value="Update"></div>
            </div> 
        </div>
    </form>
</body>
</html>