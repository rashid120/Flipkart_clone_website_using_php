
<!DOCTYPE html>
<html>
<head>
    <title>For Sell</title>
    <style>

        .border{
            border-radius: 50%;
        }
        .topImg{
            /* color: #2874f0; */
            display: flex; 
            justify-content:space-around; 
            width:85%; 
            text-align:center; 
            padding-left: 16vh;
        }
        .topImg div:hover{
            color: #2874f0;
        }
    </style>
</head>
<body>
    <div style="background-color: whitesmoke; height: 11vh; padding: 2vh; margin-top:6vh;">
        <div class="topImg">
            <div><a href="search.php ?search=<?php echo 'Top Offers';?>" style="text-decoration: none;"><img src="./images/offers.webp" width="66px" class="border"><br>Top Offers</a></div>
            <div><a href="search.php ?search=<?php echo 'Mobiles & Tablets';?>" style="text-decoration: none;"><img src="./images/phone.png" width="66px" class="border"><br>Mobiles & Tablets</a></div>            
            <div><a href="search.php ?search=<?php echo 'Grocery';?>" style="text-decoration: none;"><img src="./images/grocery.webp" width="66px" class="border"><br>Grocery</a></div>
            <div><a href="search.php ?search=<?php echo 'Electronic';?>" style="text-decoration: none;"><img src="./images/tv.webp" width="66px" class="border"><br>Electronic</a></div>
            <div><a href="search.php ?search=<?php echo 'TVs & Appliance';?>" style="text-decoration: none;"><img src="./images/appliance.webp" width="66px" class="border"><br>TVs & Appliance</a></div>
            <div><a href="search.php ?search=<?php echo 'Fashion';?>" style="text-decoration: none;"><img src="./images/fashion.png" width="66px" class="border"><br>Fashion</a></div>
            <div><a href="search.php ?search=<?php echo 'Beauty';?>" style="text-decoration: none;"><img src="./images/beauty.webp" width="66px" class="border"><br>Beauty</a></div>
            <div><a href="search.php ?search=<?php echo 'Home & Furniture';?>" style="text-decoration: none;"><img src="./images/home.webp" width="66px" class="border"><br>Home & Furniture</a></div>
            <div><a href="search.php ?search=<?php echo 'Flights';?>" style="text-decoration: none;"><img src="./images/flights.webp" width="66px" class="border"><br>Flights</a></div>
        </div>
    </div>
</body>
</html>