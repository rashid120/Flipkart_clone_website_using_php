<?php
include('./connect.php');

$user_id = $_GET['uid'];
$product_id = $_GET['pid'];

session_start();
include('./mainu_after_login.php');

$product = "SELECT * FROM product2 WHERE id = '$product_id'";
$result = mysqli_query($conn, $product);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Give us review</title>
    <style>
        .produ {
            margin: 90px 0px 0 20px;
            display: flex;
        }

        .det {
            font-size: 20px;
            margin: 30px;
            line-height: 35px;
        }

        .form {
            margin: 20px 0 0 20px;
            background-color: green;
            width: 20vw;
            height: 30vh;
            padding: 30px;
            font-size: 20px;
        }
        .ratting-show{
            display: flex;
            justify-content: space-around;
        }
        .r_img {
            display: flex;
            background-color: #F3B9B9;
            margin-top: 20px;            
            overflow-x: auto;
            width: 60vw;
            gap: 5px;
        }
        .u-name{
            background-color: #B8AFAF;
            height: 50vh;
            padding-left: 20px;
            overflow-y: auto;
        }
        .star2{
            color: green;
            font-weight: 600;
        }
        .review{
            background-color: #F3D0D0;
            width: 60vw;
            height: 50vh;
            padding: 15px;
        }
        .star{
            font-size: 20px;
            font-weight: 800;
            color: darkgreen;
            padding: 15px;
        }
    </style>
</head>

<body>
    <div class="produ">
        <div><img src="upload-image/<?php echo $row['image'] ?>" width="260px" height="260px"></div>
        <div class="det">
            <div><?php echo $row['name'] ?></div>
            <div style="color: green;">Price : &#8377 <?php echo $row['price'] ?></div>
            <div style="color: maroon;">Description : <br><?php echo $row['p_about'] ?></div>
        </div>
    </div>
    <div class="ratting-show">
        <!-- add ratting -->
        <div class="form">
            <form action="review_insert.php" method="post" enctype="multipart/form-data">
                <div><input type="hidden" name="userId" value="<?php echo $user_id ?>"></div>
                <div><input type="hidden" name="productId" value="<?php echo $product_id ?>"></div>
                <div>Upload your product image</div>
                <div><input type="file" name="image" required></div>
                <div>Description</div>
                <div><textarea name="desc" cols="30" rows="5" placeholder="Tell us About product" required></textarea></div>
                <div>Give star</div>
                <div><input type="number" name="star" min="1" max="5" value="5" required></div>
                <div><input type="submit" value="Save"></div>
            </form>
        </div>

        <div class="review">
            <?php
            //show ratting
            $view = "SELECT * FROM review WHERE product_id = '$product_id'";
            $result2 = mysqli_query($conn, $view);

            if (mysqli_num_rows($result2) > 0) {

                $star = 0; //ratting star
                echo '<div class="r_img">';

                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $star = $star + $row2['star']; //total star
            ?>
                    <div><img src="ratting-images/<?php echo $row2['r_image'] ?>" width="80px" height="80px"></div>
                <?php
                }
                echo '</div>';
                echo "<div class='star'>Got total " . $star . " stars</div>";
            }

            #users table, product2 table, review table
            $select9 = "SELECT u_name, star, descreption, r_image FROM review JOIN
            users ON review.user_id = users.id JOIN 
            product2 ON review.product_id = product2.id 
            WHERE review.product_id = '$product_id'";

            $result9 = mysqli_query($conn, $select9);

            if (mysqli_num_rows($result9) > 0) {
                echo '<div class="u-name">';
                while ($row9 = mysqli_fetch_assoc($result9)) {
                ?>
                    <div style="font-size: 20px;"><br><b><?php echo $row9['u_name'] ?></b></div>
                    <div class="star2">Star <?php echo $row9['star'] ?></div>
                    <div style="margin-top: 5px;"><?php echo $row9['descreption'] ?></div>
                    <div><img src="ratting-images/<?php echo $row9['r_image'] ?>" width="80px" height="70px"></div>
                <?php
                }
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>

</html>