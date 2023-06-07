<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        } */
        .main{
            width: 100%;
            height: 45vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ddd;
        }
        .slider{
            width: 204vh;
            height: 45vh;
            position: relative;
            padding-top: 9px;
            z-index: 1;
        }
        .slider img{
            /* margin-bottom: 40px; */
            margin-left: 1vh;
            width: 99%;
            height: 330px;
            transition: 1s;
        }
        .btn{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            /* padding: 10px; */
        }

        .btn button{
            outline: none;
            border: none;
            background-color: white;
            padding: 5vh 2vh;
            border-radius: 3px;
        }
        .btn button i{
            font-size: 18px;
        }
    </style>
</head>
<body>
    <!-- Images slider -->
    <div class="main">
        <div class="slider">
            <img src="./images/sssss.jpg" class="slideImg">
            <img src="./images/sssss1.jpg" class="slideImg">
            <img src="./images/ssssss2.jpg" class="slideImg">
            <img src="./images/sssss3.jpg" class="slideImg">
            <div class="btn">
                <button onclick="back()" class="btn1"><i class="fa-solid fa-less-than"></i></button>
                <button onclick="next()"><i class="fa-solid fa-greater-than"></i></button>
            </div>
        </div>
    </div>
        <!-- axis bank advitiesment -->
        
    <div style="text-align: center; background-color:white; padding:4px; width:98.50%; margin-left:1vh; height: 13.5vh;">
        <div><img src="./images/axis_add.png" width="57%"></div>
    </div>
            <!-- slider product -->
    <?php include('slider_product.php'); ?> <!--table name scroll_product-->
        <!-- 3 images -->
    <div style="width:100%; height:38vh; margin-top: 5px; display: flex; justify-content:space-between; text-align:center;">
        <div><img src="./images/iphone.png" width="97%"></div>
        <div><img src="./images/smart ac.png" width="98%"></div>
        <div><img src="./images/tv cycle.png" width="98%"></div>
    </div>

    <script> //Image slider arrow
        var mainimg = document.querySelector(".slideImg");    //<img> tag images show hoga.
            //images array
        var images = ["./images/maxresdefault.jpg","./images/maxresdefault (1).jpg","./images/Perfectbuy_banner.jpg"];
        var num = 0;

        function next(){
            num++;
            if(num>=images.length){
                num = 0;
                mainimg.src = images[num];
            }else{
                mainimg.src = images[num];
            }
        };

        function back(){
            num--;
            if(num<0){
                num=images.length-1;
                mainimg.src = images[num];
            }else{
                mainimg.src = images[num];
            }
        };
    </script>

    <script> //Script code for Image auto slide
        var myIndex = 0;
        carousel();

        function carousel(){
            var i;
            var x = document.getElementsByClassName("slideImg");
            for(i=0; i < x.length; i++){
                x[i].style.display = "none";
            }
            myIndex++;
            if(myIndex > x.length){myIndex = 1}
            x[myIndex-1].style.display = "block";
            setTimeout(carousel, 3000); //timing 3 second
        }
    </script>
</body>
</html>