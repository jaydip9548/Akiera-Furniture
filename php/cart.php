<?php

session_start();
$order = true;
$order_text = false;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../css/cart.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <style>
        .box2 #order {
        margin-bottom: 8px;
        /* height: 20px; */
    }
    .container1{
        height: 260px;
    }
    
        .box1 #boxbox #remove1 {
            cursor: pointer;
            border-radius: 5.5px;
            background-color: #f8f9fa;
        }
        
        .box1 #boxbox #remove1:hover {
            background-color: #ff0013bd;
        }
        
        .container1 form .box2 {
            margin-left: 10px;
            padding-left: 12px;
        }
        
        .container1 form {
            margin-top: 30px;
        }
        .jaydip{
            display: flex;
            flex-wrap: wrap;
        }
        </style>
    <script>
        function page(str) {
            window.location.href = str;
        }
        </script>
    <link rel="stylesheet" media="screen and (max-width:1189px)" href="../responsive/cart.css">
    <?php

    include('a_itemValue.php');
    include('_dbconnect.php');
    ?>
</head>

<body>
    <?php include('../html/navBar1.php') ?>

    <div class="jaydip">

        <?php
        if (isset($_POST['remove'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['product_id'] == $_POST['id']) {
                    unset($_SESSION['cart'][$key]);
                }
                $count3 = count($_SESSION['cart']);
                if ($count3 == 0) {
                    echo "<script>page('index.php')</script>";
                }
            }
        }
        if (isset($_POST['ORDER'])) {
            $o = "<h3>We Have Received Your Order.</h3>"."We Free of Codt";
         
                $order = false;
                $to_email = $_SESSION['email'];
                $subject = "We have received Your Order";
                $body =  "Actually, This is not Fully accepted E_Commerce website. So whatever you order won't be Delivered ";
                $headers = "From: jaydipmakwana654@gmail.com";
                
                if (mail($to_email, $subject, $body, $headers)) {
                }   else{
                    echo '<script>alert("Try Again")</script>';
                }
        }
        if (isset($_POST['Cancle_order'])) {
            $order_text = true;
            $order = true;
            $to_email = $_SESSION['email'];
            
            $subject = "Cancled Order";
            $body = "We have Cancled Your Order";
            $headers = "From: jaydipmakwana654@gmail.com";
            
            if (mail($to_email, $subject, $body, $headers)) {
            }   else{
                echo '<script>alert("Try Again")</script>';
            }
        }
        ?>

        <div class="container" style="border: none;">
            <div class="box">

                <?php
                $total = 0;
                //
                if (isset($_SESSION['cart'])) {

                    $product_id = array_column($_SESSION['cart'], 'product_id');

                    $sql = "SELECT * FROM `sofa`";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        foreach ($product_id as $id) {
                            if ($row['id'] == $id) {
                                $total += $row['price'];
                                cartElement($row['image'], $row['price'], $row['id'], "Akiera Sofa Center");
                            }
                        }
                    }
                    $sql = "SELECT * FROM `bed`";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        foreach ($product_id as $id) {
                            if ($row['id'] == $id) {
                                $total += $row['price'];
                                cartElement($row['image'], $row['price'], $row['id'], $row['name']);
                            }
                        }
                    }

                    $sql = "SELECT * FROM `tvu`";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        foreach ($product_id as $id) {
                            if ($row['id'] == $id) {
                                $total += $row['price'];
                                cartElement($row['image'], $row['price'], $row['id'], $row['name']);
                            }
                        }
                    }
                    $sql = "SELECT * FROM `dinningtb`";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        foreach ($product_id as $id) {
                            if ($row['id'] == $id) {
                                $total += $row['price'];
                                cartElement($row['image'], $row['price'], $row['id'], $row['name']);
                            }
                        }
                    }
                    $sql = "SELECT * FROM `coffet`";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        foreach ($product_id as $id) {
                            if ($row['id'] == $id) {
                                $total += $row['price'];
                                cartElement($row['image'], $row['price'], $row['id'], $row['name']);
                            }
                        }
                    }
                    $sql = "SELECT * FROM `bookshelve`";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        foreach ($product_id as $id) {
                            if ($row['id'] == $id) {
                                $total += $row['price'];
                                cartElement($row['image'], $row['price'], $row['id'], $row['name']);
                            }
                        }
                    }
                } else {
                    echo "<script>alert('Cart is Empty')</script>";
                    echo "<script>window.history.back()</script>";
                    // print_r($_SESSION['cart']);
                    // echo "Session is not set";
                } ?>
            </div>
        </div>
        <div class="container1">
            <form action="cart.php" method="POST">
                <div class="box2" style="height: 150px;">
                    <p><b>Price Details</b></p>
                    <hr><br>
                    <p>
                        <h3>Total Items : <?php echo count($_SESSION['cart']); ?></h3>
                        <p><b>Delivery &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<var style="color: green;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FREE</var></b></p>
                    </p> <br>
                    <hr>
                    <p>
                        <h3 style="font-size:24px;">Amount Payable : <?php echo  $total; ?></h3>
                    </p> <br>
                    <hr><br>
                    <?php
                    if ($order) {

                        echo '<p id="p"><button type="submit" id="order" name="ORDER" onclick="conform("Are you want")">Order</button></p>';
                        if ($order_text) {

                            echo "<p ><span style='font-size:23px;color:red;'>Order Successfuly Cancled !</span></p>";
                        }
                    } else {
                        echo ' <p id="p"><button type="submit" id="order" name="Cancle_order">Cancle Order</button></p><br><br>';
                        if (!$order_text) {

                            echo "<p ><span style='font-size:23px;color:green;'>Order Successfuly received !</span></p>";
                        }
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <?php
    if (isset($_POST["ORDER"])) {
        echo '<script>
            var x= document.querySelectorAll("#remove1");
     for (i = 0; i < x.length; i++) {
       x[i].setAttribute("type","hidden")
     }
           </script> ';
    }
    ?>
</body>

</html>