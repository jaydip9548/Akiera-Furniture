<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Table</title>
    <link rel="stylesheet" href="../css/category.css">
    <link rel="stylesheet" href="../css/top.css">
    <link rel="stylesheet" href="../css/cofeeT.css">
    <link rel="stylesheet" href="../css/aaa.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <?php 
    session_start();
  include('a_itemValue.php');
  include('_dbconnect.php')

  ?>
  
<style>
       .con .p1 {
    margin-left: 10%;
    border-radius: 7px;
}
.box .con{
    width: 324px;
}
</style>
</head>

<body onclick="click1()">
<?php  include('../html/navBar1.php'); ?>

    <button onclick="topFunction()" id="myBtn" title="Go to top"> &#8593;</button>
    <script src="../java_script/top.js"></script>
    <div class="title" style=" font-family: 'Ubuntu', sans-serif;">
        <h2>COFFEE TABLE</h2>
    </div>
    <div class="photo" style=" font-family: 'Ubuntu', sans-serif;">
    <?php  
 $sql = "SELECT * FROM `coffet`";
 $result = mysqli_query($conn, $sql);
 while ($row = mysqli_fetch_assoc($result)) {
     assignbed($row['id'], $row['name'], $row['image'], $row['price'], $row['del'], $row['save'],"coffeeT.php");
 }
    ?>
<!-- <script>
    var x = document.getElementsByClassName("con");
    // console.log(x);
    x.style.width = "130px"
</script> -->
<?php

if (isset($_POST['XXX'])) {
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    
        echo '<script>alert("Login Is Required..!")</script>';
        echo '<script>window.location.href = "../html/Login.php";</script>';
        }else{
    if (((isset($_SESSION['cart'])))) {
        $array_id = array_column($_SESSION['cart'], 'product_id');

        if ((in_array($_POST['pid'],$array_id) )) {
            echo "<script>alert('You have Already Selected this Product !')</script>";
        }
        else{
            $count1 = count($_SESSION['cart']);

            $array_item = array(
                'product_id' => $_POST['pid']
            );
            $_SESSION['cart'][$count1] = $array_item;
        }
    } else {

        $array_item = array(
            'product_id' => $_POST['pid'],
        );
        $_SESSION['cart'][0] = $array_item;
    }
}
}
?>
  <?php
if(isset($_SESSION['cart']))
{
    $count = count($_SESSION['cart']);

    echo "
    <script>
   document.getElementById('span').innerHTML = '$count';
    </script>
    
    ";
}
?>
    </div>

</body>

</html>