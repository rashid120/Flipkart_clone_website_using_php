<!DOCTYPE html>
<html>
<head>
    <title>product2</title>
    <style>

        .main{
            background-color: rgba(28, 28, 28, 0.440);
            width: 500px;
            height: 760px;
            font-size: 28px;
            line-height: 38px;
            padding: 15px 0 0 40px;
            margin: auto;
        }
        .main input[type=text], input[type=number]{
            padding: 8px 50px 8px 5px;
        }
        .main input[type=submit]{
            padding: 2px 40px 2px 40px;
            font-size: 25px;
            margin-top: 25px;
        }
        .main input[type=submit]:hover{
            background-color: #777377;
            color: white;
            border: none;
        }
        .main input[type=file]{
            padding: 2px 40px 2px 0px;
            font-size: 25px;
        }
    </style>
</head>
<body style="background-color: rgba(20, 20, 27, 0.409);">
    <form action="insert_query2.php" method="post" enctype="multipart/form-data">
        <div class="main">
            <div><h2>TableName - product2</h2></div>
            <div>Image : <br><input type="file" name="image" required></div>
            <div>Name : <br><input type="text" name="name" placeholder="Product Name" required></div>
            <div>Price : <br><input type="number" name="price" placeholder="Enter product price" required></div>
            <div>Category : <br><input type="text" name="category" placeholder="Enter product category achha se" required></div>
            <div>Seller_id : <br><input type="number" name="seller_id" placeholder="Enter your id" value="<?php echo $_GET['s_id']; ?>" oninvalid="alert('You must fill out the seller_id!');" required></div>
            <div>Quantity : <br><input type="number" name="quantity" placeholder="How many products" oninvalid="alert('You must fill out the quantity!')" required></div>
            <div>About product : <br><textarea name="about" cols="30" rows="3" placeholder="write"></textarea></div>
            <input type="submit" value="save">
        </div>
    </form>
</body>
</html>