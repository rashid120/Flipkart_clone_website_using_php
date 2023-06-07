<?php

    include('connect.php');
    session_start();
    include('./mainu_after_login.php');

    $user_id = $_SESSION['user_id'];
    // $p_id = $_SESSION['p_id'];

    $select = "SELECT * FROM `cart` INNER JOIN product2 ON product2.id = cart.p_id 
    AND cart.user_id='$user_id'";

    $result = mysqli_query($conn, $select) or die("Query falied");

    $total_items = 0;
    $total_price = 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        .cart{
            width: 100%;
            margin-top: 100px;
            text-align: center;
            /* overflow: scroll; */
        }
        .cart1{
            width: 60vw;
            height: 40px;
            background-color: #ddd;
            /* margin-left: 15vw; */
            margin: auto;
        }
        .cart2{
            width: 60vw;
            /* height: 40px; */
            /* background-color: #ddd; */
            /* margin-left: 14vw; */
            margin: auto;
            display: flex;
            margin-top: 20px;
        }
        .prod{
            font-size: 18px;
            /* margin-left: 10px; */
            width: 15vw;
            text-align: center;
            line-height: 35px;
        }
        .cbtn button{
            background-color: orangered;
            padding: 11px 15px;
            border: none;
            border-radius: 3px 3px;
            /* margin-left: 30px; */
            /* margin-top: 100px; */
        }
        /* .cbtn{
            width: 15vw;
            margin-left: 35vw;
        } */
        .total{
            width: 15vw;
            height: 80px;
            background-color: #ddd;
        }
        .c-img{
            width: 15vw;
        }
        .grand{
            position: fixed;
            /* margin-left: 1100px; */
            /* margin-top: -500px; */
            background-color: #282828;
            color: white;
            width: 280px;
            height: 80px;
            /* z-index: 2; */
            left: 0;
            top: 100px;
        }
    </style>
</head>
<body>
    <div class="cart">
        <div class="cart1">
            <h1>My Cart Page</h1>
        </div>
        <?php while($row = mysqli_fetch_assoc($result)){ 

            $total_price = $total_price + $row['price']; // total price

            $total_items++; //
        ?>
        <div class="cart2">
            <div class="c-img"><img src="upload-image/<?php echo $row['image']; ?>" width="160px" height="160px"></div><!--Image-->
            
            <div class="prod">
                <p><b>Name <?php echo $row['name'] ?></b></p>
                <p><b>Price : Rs - <?php echo $row['price'] ?>/-<input type="hidden" class="iprice" value="<?php echo $row['price'] ?>"></b></p>
                <p>Add date : <?php echo $row['add_time'] ?></p>
                <!-- value="<?php echo $row['quantity'] ?>" -->
                <p>Quantity <input class="iquantity" type="number" value="1" onchange="subTotal()" name="quantity" min='1' max="10"></p>
            </div>
            <div class="total">
                <h2>Total Price</h2>
                <hr>
                <div>Rs : - <span class="itotal"><?php echo $row['price'] ?></span></div> 
                
            </div>
        </div>
        <div class="cbtn">
            <button><a href="cart_remove.php ?p_id=<?php echo $row['p_id']; ?>" style="text-decoration: none; color:white">Remove</a></button>

            <?php if($row['p_quantity'] > 0){ ?>
                <button style="margin-left: 70px;"><a href="order_form.php ?p_id=<?php echo $row['p_id'] ?> && s_id=<?php echo $row['seller'] ?>" style="text-decoration: none;">Buy Now</a></button>
            <?php 
                }else{
                    
                    echo '<button style="margin-left: 70px;"><a  style="color:black; font-weight:700;">Out Of Stock</a></button>';
                } 
                ?>
        </div>
            <br>
            <hr>
            <?php } ?>
        <!-- grand total -->
        <div class="grand">
            <h2 style="background-color: maroon;">Grand Total </h2>
            <hr>
            <h4>Total Items = <?php echo $total_items; ?></h4>
            <h2>&#8377; <span id="gtotal"><?php echo $total_price; ?></span></h2>
        </div>
    </div>

    <script>
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        
        var gtotal = document.getElementById('gtotal');
        
        function subTotal(){
            var gt=0; //grand total
            for(i= 0; i<iprice.length; i++){
                
                itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);

                gt = gt+(iprice[i].value)*(iquantity[i].value);
            }
            gtotal.innerText=gt;
        }
    </script>
</body>
</html>

<?php  
    if(mysqli_num_rows($result) <= 0){
        echo "<br><h1 style='text-align:center;'>Your Cart Is Empty</h1>";
    }
?>