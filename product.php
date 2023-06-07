<?php 
include 'connect.php';

    $select = "SELECT * FROM product2 WHERE status = 0 LIMIT 15";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result)>0){          
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        ::-webkit-scrollbar{
            width: 0;
        }
        .imgSlider{
            display: flex;
            overflow: scroll;
            gap: 40px;
            height:44vh; 
            align-items: center;
            background-color: white;
        }
        .pro img:hover{
            width: 167px;
            height: 177px;
        }
        .pro button:hover{
            background-color: green;
            color: #2854f0;
        }
        .pro button{
            color:white; 
            background-color:#687f65;
            border:none; 
            padding:8px 8px; 
            border-radius:3px
        }
        .pro{
            color: black;
        }
    </style>
 
</head>
<body>
<div style="display: flex; margin-top:1vh; width:99%; margin-left: 9px; height:360px">
    <div style="background-color:white; height:35vh;"><!-- top offers add -->
        <div style="margin-left: 3vw; margin-top: 15vh; font-size: 30px;">Top offers</div>
        <div style="margin-left: 4vw; margin-top: 5vh;"><button style="color: white; background-color:#2874f0; padding:1vh 2vh; border:none;">VIEW ALL</button></div>
        <div style="background-color: skyblue; width: 15vw; height:14vh; margin-top:2vh;"></div>
    </div>

    <div class="imgSlider"> <!--product -->
    <?php  while($row = mysqli_fetch_assoc($result)){  
        ?>
        <div class="pro" style="flex-direction:column; text-align:center; padding:0 9px;">
            <div><a href="show_detailsL.php?pid= <?php echo $row['id']; ?>" style="text-decoration: none; color:azure;"><img src="upload-image/<?php echo $row['image']; ?>" width="165px" height="175px"></div>
            <div  style="overflow-x: scroll; height:38px; color: black;"><h4><?php echo $row['name']; ?></h4></div>
            <div style="margin-bottom: 3vh; color:green;">Price Rs: <?php echo $row['price']; ?>/-</div>
            <div>
                <button>View Details</a></button>
                <?php
                    if($row['p_quantity'] > 0){
                ?>
                <button style="margin-left: 4px;" onclick=""><a href="order_form.php ?p_id=<?php echo $row['id'] ?> && s_id=<?php echo $row['seller'] ?>" style="text-decoration: none; color:azure;">Buy now</a></button>
                <?php
                    }else{                      
                        echo '<button style="margin-left: 0px;"><a style="text-decoration: none; color:red; font-weight:700;">Out</a></button>';
                    }
                ?>
            </div>
        </div>
        <?php         
        } }
    ?>
    </div>
</div>
</body>
</html>
