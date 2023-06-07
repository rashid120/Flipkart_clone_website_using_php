

            <!-- User Login Form -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Form</title>
    <style>
        .lo_main{
            background-color: darkcyan;
            width: 25vw;
            height: 38vh;
            border-radius: 2px 3px;
            line-height: 50px;
            align-items: center;
            box-shadow: 10px 10px 5px gray;
            padding: 4vh 5vh;
            font-size: 22px;
            margin: auto;
            margin-top: 10vh;
            background-image: url("./images/break.jpg");
        }
        .lo_main input[type]{
            padding: 6px 6px;
            border-radius: 4px 7px;
            border: none;
            box-shadow: 0 2px #2874f0;
        }
        .lo_main input[type=submit]:hover{
            background-color: darkgreen;
            color: white;
            font-size: 18px;
        }
        .lo_main button:hover{
            background-color: maroon;
            color: white;
            font-size: 16px;
        }
        .lo_main input[type=text]:hover{
            background-color: #2874f0;
            color: white;
            font-size: 16px;
        }
        .lo_main input[type=password]:hover{
            background-color: #2874f0;
            color: white;
            font-size: 16px;
        }
        .lo_main .heading_text{
            color: #7972f0; 
            font-size:35px; 
            text-align:center; 
            margin-bottom:3vh; 
            text-shadow: 3px 3px 2px black;
        }
        .lo_main button{
            padding: 6px 6px;
            border-radius: 4px 7px;
            border: none;
            box-shadow: 0 2px #2874f0;
            text-decoration: none;
        }
        body{
            background-image: url(./images/heart-line.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    <form action="login_query.php" method="post" autocomplete="off">
        <div class="lo_main">
            <div class="heading_text">Login your account</div>

            <div><span style="color: white;">Number/Email :</span> <input type="text" name="contact" value="<?php if(isset($_POST['number'])){ echo $_POST['number'];} ?>" placeholder="Enter your number/email" required></div>
            <div><span style="color: white;">Password :</span> <input type="password" name="password" id="pass" placeholder="Enter your password" password></div>
            <div><input type="checkbox" onclick="show()"> <span style="color: white;">Show password</span></div>
            <div>
                <input type="submit" value="Login">
                <button style="margin-left:15vw; margin-top:20px;"><a href="signup_form.php">Sign Up</a></button>
            </div>
        </div>
    </form>
    <script>
        function show(){
            var s = document.getElementById("pass");
            if(s.type === "password"){
                s.type = "text";
            }else{
                s.type = "password";
            }
        }
    </script>
</body>
</html>