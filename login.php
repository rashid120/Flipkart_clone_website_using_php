<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <style>
        /* login page */
        .login_page{
            font-family: Roboto,Arial,sans-serif;
            letter-spacing: 0;
            padding: 8px 10px 10px 0;
            width: 80%;
            color: #000;
            font-size: inherit;
            background: #fff;
            border: none;
            /* border-bottom: 1px solid #e0e0e0; */
            pointer-events: auto;
            box-shadow: 0 1px #2874f0;
        }
        #login{
            position: absolute;
            z-index: 2;
            margin-top: 15vh;
            margin-left: 25vw;
            display: none;
            box-shadow: 1px 2px 20px 2px black;
        }
        #signUp{
            position: absolute;
            z-index: 2;
            margin-top: 15vh;
            margin-left: 25vw;
            display: none;
            box-shadow: 1px 2px 20px 4px black;
        }
    </style>
</head>
<body>

        <!-- Fake login or sign up form -->

<form action="login_form.php" method="post" id="login"> <!--Login page-->
    <div style="display: flex; width: 45vw; height:540px;">
        <div style="color:white; background-color: #2874f0; padding:6vh 4vh; font-size:18px; line-height: 1.6vw">
            <h1>Login</h1><br>
            <p>Get access to your</p>
            <p>Orders, Wishlist and</p>
            <p>Recommendation</p>
            <div style="margin-top:13vh"><img src="./images/login_img_c4a81e.png"></div>
        </div>
        <div style="background-color: white; padding:6vh 4vh;">
            <input type="text" class="login_page" name="number" placeholder="Enter Email/Moblie number"><br><br><br>
            <p style="color: #878787; font-size:13px">By continuing, you agree to Flipkart's <a href="#"> Terms of Use</a> and <a href="#"> Privacy<br> Policy.</a></p><br>
            <div><input type="submit" value="Request OTP" style="width: 22vw; padding: 15px; background-color:orangered; border:none; border-radius: 3px 3px; color:white;"/></div>
            <div onclick="sShow()" style="color: #2874f0;margin-top: 29vh; text-align:center;"><b>New to Flipkart? Create an account</b></div>
        </div>
        <div onclick="hide()" style="border: none; font-size: 30px; color:red; height:30px; margin-left: 10px;"> X </div>
    </div>
    </form>

            <!-- Sign Up page -->

<form action="./signup_form.php" method="post" id="signUp"> <!--Sign Up page-->
    <div style="display: flex; width: 45vw; height:540px;">
        <div style="color:white; background-color: #2874f0; padding:4vh 4vh; font-size:18px;">
            <h2>Looks likes you're new here</h2>
            <p>Sign up with your moblie <br> number to get started</p>
            <div style="margin-top:18vh"><img src="./images/login_img_c4a81e.png"></div>
        </div>
        <!-- second part -->
        <div style="background-color: white; padding:6vh 4vh;">
            <input type="text" class="login_page" name="number" placeholder="Enter Email/Moblie number" required><br><br>
            <p style="color: #878787; font-size:13px">By continuing, you agree to Flipkart's <a href="#"> Terms of Use</a> and <a href="#"> Privacy<br> Policy.</a></p><br>
            <div><input type="submit" value="CONTINUE" style="width: 22vw; padding: 15px; background-color:orangered; border:none; border-radius: 3px 3px; color:white;"/></div>
            <div onclick="lShow()" style="color: #2874f0; width: 37.50vh; text-align:center; padding:2vh; box-shadow: 2px 2px 2px 2px gray; margin-top:10px;"><b>Existing User? Log in</b></div>
        </div>
        <div onclick="hide()" style="border: none; font-size: 30px; color:red; height:30px; margin-left: 10px;"> X </div>
    </div>
    </form>
    <script>
        function hide(){
            document.getElementById("login").style.display = "none";
            document.getElementById("signUp").style.display = "none";
        }
        function show(){
            document.getElementById("login").style.display = "block";
        }
        function sShow(){
            document.getElementById("signUp").style.display = "block";
            document.getElementById("login").style.display = "none";
            document.getElementById("signUp").style.position = "fixed";
        }
        function lShow(){
            document.getElementById("login").style.display = "block";
            document.getElementById("signUp").style.display = "none";
        }
    </script>
</body>
</html>