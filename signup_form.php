

        <!-- User sign-Up Form -->
<!DOCTYPE html>
<html>
<head>
    <title>SignUp page</title>
    <style>
        .s_main{
            background-color: darkcyan;
            width: 25vw;
            height: 47vh;
            border-radius: 2px 3px;
            line-height: 43px;
            align-items: center;
            box-shadow: 10px 10px 5px gray;
            padding: 4vh 5vh;
            font-size: 22px;
            margin: auto;
            margin-top: 10vh;
            background-image: url("./images/cat.jpeg");
            color: white;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .s_main input[type]{
            padding: 6px 6px;
            border-radius: 4px 7px;
            border: none;
            box-shadow: 0 2px #2874f0;
        }
        .s_main input[type=submit]:hover{
            background-color: darkgreen;
            color: white;
            font-size: 18px;
        }
        .s_main input[type=reset]:hover{
            background-color: maroon;
            color: white;
            font-size: 16px;
        }
        .s_main input[type=text]:hover{
            background-color: #2874f0;
            color: white;
            font-size: 16px;
        }
        .s_main input[type=password]:hover{
            background-color: #2874f0;
            color: white;
            font-size: 16px;
        }
        .s_main input[type=number]:hover{
            background-color: #2874f0;
            color: white;
            font-size: 16px;
        }
        body{
            background-image: url(./images/dark.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    <form action="signup_query.php" method="post" enctype="multipart/form-data">
        <div class="s_main">
            <div style="color: #7972f0; font-size:35px; text-align:center; margin-bottom:3vh; text-shadow: 3px 3px 2px white;">Create your account</div>
            <div>Full Name : <input type="text" name="name" placeholder="Enter your name"></div>
            <div>Gender : <input type="radio" name="gender" value="male"> Male <input type="radio" name="gender" value="female"> Female</div>
            <div>Email : <input type="text" name="email" placeholder="Enter your email address"></div>
            <div>Number : <input type="number" name="number" placeholder="Enter your number" value="<?php if(isset($_POST['number'])){ echo $_POST['number'];} ?>" required></div>
            <div>Password : <input type="password" name="password" placeholder="Create a password" required></div>
            <div>Image : <input type="file" name="image"></div>
            <div>
                <input type="submit" value="Save" style="margin-top: 20px;">
                <input type="reset" value="Cancel" style="margin-left:15vw; margin-top:20px;">   <!--float: right;-->
            </div>
        </div>
    </form>
</body>
</html>