<?php

        //User View Order Page

    include("./connect.php");
    session_start();
    $user_id = $_SESSION['user_id'];
    $select = "SELECT * FROM orders INNER JOIN product2 
    ON product2.id = orders.p_id INNER JOIN users 
    ON users.id = orders.user_id WHERE users.id = '$user_id' ORDER BY o_id DESC";

    $result = mysqli_query($conn, $select);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Order page</title>
    <style>
        ::-webkit-scrollbar{
            width: 0;
        }
        .omain{
            margin-top: 65px;
            width: 100%;
        }
        .fil-search{
            display: flex;
            width: 97%;
            margin: auto;
            gap: 30px;
        }
        .inpu{
            width: 63vw;
            height: 35px;
            border-radius: 7px 0 0 7px;
            border: none;
        }
        .sear{
            padding: 8px;
            background-color: #28f;
            border: none;
            box-shadow: #fff1ff 3px 3px 3px;
            color: white;
            border-radius: 0 7px 7px 0;
        }
        .fil{
            background-color: white;
            width: 17%;
            height: 45px;
            box-sizing: border-box;
            box-shadow: #28f 1px 1px 2px 1px;
            text-align: center;
        }
        .item{
            width: 97%;
            display: flex;
            margin: auto;
            gap: 30px;
        }
        .status{
            background-color: white;
            width: 17%;
            /* height: 45px; */
            box-sizing: border-box;
            box-shadow: #28f 1px 1px 2px 1px;
            /* text-align: center; */
            font-size: 18px;
            padding-left: 20px;
            line-height: 30px;
        }
        .prod{
            box-shadow: #28f 1px 1px 1px 1px;
            width: 75%;
            background-color: white;
            height: 450px;
            overflow-y: scroll;
        }
        .o-card{
            display: flex;
            border: 0.50px solid #28f;
            height: 120px;
            margin-top: 5px;
            align-items: center;
            gap: 20px;
        }
        .btns .btnpc{
            background-color: #28f;
            color: white;
            padding: 7px 15px 7px 15px;
            font-size: 20px;
            border: none;
        }
        .btns .btnd{
            background-color: green;
            color: white;
            padding: 7px 15px 7px 15px;
            font-size: 20px;
            border: none;
        }
        .btns{
            /* background-color: red;  */
            line-height: 40px;
        }
        .con{
            /* background-color: green; */
            width: 500px;
            overflow-x: scroll;
            /* text-align: center; */
        }
        .btns .cancel{
            border-color: red;  
            color: red;
            padding: 5px 8px 5px 8px;
            margin-left: 20px;
            border-radius: 3px;
        }
        .cancel a{
            color: red;
            text-decoration: none;
        }
        .btns .cancel:hover, .cancel a:hover{
            color: white;
            background-color: red;
        }
    </style>
</head>
<body style="background-color: #ddd;">
        <!-- main mainu is here -->
    <?php
        include("./mainu_after_login.php");
    ?>
    <div class="omain">
        <div class="fil-search">
            <div class="fil">
                <b><h3>Filters</h3></b>
            </div>
            <div style="width: 75%; gap:0;">
                <form action="#">
                    <input type="search" name="search" placeholder="Search your orders here" class="inpu">
                    <input type="submit" value="Serach Orders" class="sear">
                </form>
            </div>
        </div>
        <div class="item">
            <div class="status">
                <div><br><b>ORDER STATUS</b></div>
                <div><input type="checkbox" onclick="son()"> On the way</div>
                <div><input type="checkbox" onclick="sdel()"> Delivered</div>
                <div><input type="checkbox" onclick="scan()"> Cancelled</div>
                <div><input type="checkbox"> Returned</div>
                <hr>
                
                <div><br><b>ORDER TIME</b></div>
                <div><input type="checkbox"> Last 30 days</div>
                <div><input type="checkbox"> 2023</div>
                <div><input type="checkbox"> 2022</div>
                <div><input type="checkbox"> 2020</div>
                <div><input type="checkbox"> Older</div>
                <div><input type="checkbox" checked> All time</div>
            </div>
            <div class="prod">
                <?php 
                    if(mysqli_num_rows($result) <= 0 ){
                        echo "<h1 align='center'>No Orders available</h1>";
                    }
                    while($row = mysqli_fetch_assoc($result)){ 
                ?>
                <div class="o-card">
                    <div style="overflow: scroll; width:110px; height:110px;"><img src="upload-image/<?php echo $row['image'] ?>" width="110px" height="110px"></div>
                    <div style="line-height:25px; width:270px; height:110px; overflow:scroll;">
                        <?php echo $row['name'] ?><br>
                        Rs : - <?php echo $row['price'] ?><br>
                        Items = <?php echo $row['o_quantity'] ?><br>
                        <mark>Total price = <?php echo $row['o_tprice'] ?></mark>
                    </div>
                    <div class="con">
                        <?php
                            if($row['c_status'] == 0){ // this condition for cancel item
                                //Order status
                                if($row['o_delivered'] == ''){
                                    if($row['o_status'] == 'Conform'){
                                        echo "You can receive order in whithing <font color='red'>1 day</font>";
                                    }else if($row['o_status'] == 'Pending'){
                                        echo "Your order will be accepted soon. <font color='green'>Thank you for ordering on my site</font>";
                                    }
                                }else{
                                    echo "Your product has reached you. <font color='#28f'>Good Luck </font> <a href='product_review.php ?pid=".$row['p_id']." && uid=".$row['user_id']."'><font color='red'>Review</font></a>";
                                }
                                //end order status

                            }else{
                                echo "<font color='red' size='5px'>Your order has been canceled</font>";
                            }
                        ?>
                    </div>
                    <div class="btns">
                        <?php
                            if($row['c_status'] == 0){
                                //pending, confirm, delivered status 
                                if($row['o_delivered'] == ''){
                                    //pending , confirm
                                    echo '<button class="btnpc">'.$row['o_status'].'</button>'."<br>";
                                }else{
                                    //Delivered
                                    echo '<button class="btnd">'.$row['o_delivered'].'</button>'."<br>";
                                }
                                //Cancel button 
                                if($row['o_delivered'] == ''){
                                    echo '<button class="cancel" onclick="return cancel()"><a href="order_cancel.php ?p_id='.$row['p_id'].' && o_id='.$row['o_id'].'">Cancel</a></button>';
                                }
                            }
                        ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- footer page -->
        <div style="margin-top: 40px;"><?php include("footer.php") ?></div>
    </div>
                            <!-- "order_cancel.php ?u_id=<?php echo $row['user_id']; ?> && p_id=<?php echo $row['p_id'];?>" -->
    <script>
        function cancel(){
            var cl = prompt("Order cancel karne ki Wajah bataw ?");
            if(cl){
                alert("Thank you, problem batane ke liye");
                return true;
            }else{
                // alert("Please koi ek wajah bataye");
                return false;
            }
        }
        function scan(){
            window.location.assign("u_v_c_order.php");
        }
        function sdel(){
            window.location.assign("u_v_d_order.php");
        }
        function son(){
            window.location.assign("u_v_on_order.php");
        }
    </script>
</body>
</html>
