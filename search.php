<?php
    include('connect.php');

    $search = $_GET['search'];

    $select = "SELECT * FROM product2 WHERE (category LIKE '%$search%' OR name LIKE '%$search%') AND status = 0" or die('false query');

    $result = mysqli_query($conn, $select) or die('Query failed');

    // $row = mysqli_fetch_assoc($result);
    session_start();
    if(isset($_SESSION['u_name'])){
        include('./mainu_after_login.php');
        include('./first_product.php');
    }else{
        include('./mainu.php');
        include('./first_product.php');
    }
    if(mysqli_num_rows($result) <= 0){
        echo "<h1 style='margin-top: 80px; text-align:center;'>No Data found</h1>";
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Searching</title>
    <style>
    ::-webkit-scrollbar{
        width: 0;
    } 
    .p_main{
        display: flex; 
        overflow: scroll;
        width:99vw; 
        height:100vh;
    }
       
    .items{
        width: 99vw;
        height: 550px;
        display: flex;
        align-items: center;
        padding: 0 40px;
        justify-content: space-evenly;
        flex-wrap: wrap;
        /* overflow-x: hidden; */
        /* overflow-y: auto;  */
        gap: 20px;
        margin-top: 25px;
        /* overflow: scroll; */
    }
    .cards{
        width: 250px;
        height: 360px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-radius: 15px;
        /* border: 2px solid green; */
        background-color: whitesmoke;
    }
    .cards:hover{
        /* border: 2px solid green; */
        box-shadow: 1px 4px 10px 6px #000;
    }
    .p2_img{
        width:250px; 
        height:230px;
        border-radius: 15px;
    }
    .p2_img:hover{
        width: 252px;
        height: 231px;
    }
    .buy_cart{
        color: while;
        background-color:dodgerblue;
        border: none;
        padding: 9px 8px;
        border-radius: 5px;
    }
    .buy_cart:hover{
        background-color: green;
        color: black;
    }
    </style>
</head>
<body>
    <div class="p_main">
        <div class="items">
        <hr style="background-color: #ddd; width:100%; height:2px;">
            <?php
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="cards">
                <div>
                    <a href="./show_detailsL.php?pid= <?php echo $row['id']; ?>" style="text-decoration: none; color:aliceblue;">
                    <img src="upload-image/<?php echo $row['image'] ?>" class="p2_img"></div>   
                <div style="overflow-x: scroll; height:38px; color:#000;"><p><?php echo $row['name'] ?></p></div>
                <div style="color: green; text-align:center;"><?php echo $row['price'] ?>.00 /-</div>
                <div style="margin-top: 10px;">
                    <button class="buy_cart">View Details</a></button>
                    <?php
                        if($row['p_quantity'] > 0){
                    ?>
                    <button class="buy_cart" style="margin-left: 3vw;"><a href="order_form.php ?s_id=<?php echo $row['seller']; ?> && p_id=<?php echo $row['id'] ?>" style="text-decoration: none; color:aliceblue;">Buy Now</a></button>
                    <?php
                        }else{                      
                            echo '<button class="buy_cart" style="margin-left: 3vw;"><a style="text-decoration: none; color:red; font-weight:700;">Out of Stock</a></button>';
                        }
                    ?>
                </div>
                
            </div>
            <?php 
                }
            ?>
            <hr style="background-color: #ddd; width:100%; height:2px;">
        </div>
    </div>
</body>
</html>
<?php
    include('./footer.php');
?>