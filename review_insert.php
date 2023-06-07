<?php

include('./connect.php');

    if(isset($_POST['desc'])){

        $pId = $_POST['productId'];
        $uId = $_POST['userId'];
        $image = $_FILES['image'];
        $desc = $_POST['desc'];
        $stars = $_POST['star'];

        $img_name = $image['name'];
        $img_tmp = $image['tmp_name'];

            move_uploaded_file($img_tmp, "ratting-images/".$img_name);

        $insert = "INSERT INTO review(descreption, r_image, product_id, user_id, star) 
        VALUES ('$desc', '$img_name', '$pId', '$uId', '$stars')";

        $r_insert = mysqli_query($conn, $insert);

        if($r_insert){
            ?>
                <script>
                    alert("Thank you for ratting");
                    window.history.go(-1);
                </script>
            <?php
        }

    }
?>