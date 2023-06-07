
<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* nichlasite.php ka css */
        .nichla div{
            font-size: 13px;
            color: #ffffff;
        } 
        .nhover div:hover{
            text-decoration: underline white;
        }
        .nichla_i i{
            color:goldenrod;
        }

    </style>
</head>
<body style="background-color: #ddd; width:100%;">
    <?php       //php include 
        include('mainu.php'); //page line no 1
        // include('login.php'); // login & signUp page
        include('first_product.php');   //page line no 2
        include('second_product.php'); //page line no 3, 4, 5, 6
        include('description.php'); // faltu wala text
        include('nichlasite.php');  //footer niche ka 
    ?>
</body>
</html>