<?php 
session_start();
$thank = false;

include('_dbconnect.php');

if(isset($_POST['feedbtn'])){
$feedmail = $_POST['feedemail'];
$feedname = $_POST['feedname'];
$feedbody = $_POST['feedtextarea'];

$sql = "INSERT INTO `feedback` (`name`, `email`, `body`) VALUES ('$feedname', '$feedmail', '$feedbody');";
$result = mysqli_query($conn,$sql);

    $to_email = $_POST['feedemail'];
    $subject = "Thank You";
    $body = "We have received your Feedback.";
    $headers = "From:jaydipmakwana654@gmail.com";
    if (mail($to_email, $subject, $body, $headers)) {
        $thank = true;
        // echo "Email successfully ";
        // echo "<script>window.location.href='index.php'</script>";
    }   else{
        echo '<script>alert("Try Again")</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akiera Furniture</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- For Font -->
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="../css/navBar.css">
    <link rel="stylesheet" href="../css/imageSlider.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="../css/top.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- <link rel="stylesheet" href="css/feedpop.css"> -->
<style>

    .pcart{
        /* border: 2px solid black; */
            padding-top: 6px;
        }
        .pcart a{
            text-decoration: none;
            color: white;
        }
        .pcart a:hover{
            color: blue;
            border-bottom: 3.5px solid blue;
        }
        .pcart a i{
            color: blue;
            padding-right:4px ;
        }
        #overlay {
     position: fixed;
     display: block;
     width: 100%;
     height: 100%;
     background-color: rgb(112 111 111 / 50%);
     z-index: 2;
     cursor: pointer;
     border: 1px solid black;
 }
 .thank {
     display: inline-block;
     border: 1px solid blue;
     padding: 10px;
     width: 250px;
     border-radius: 4px;
     position: relative;
     top: 34%;
     left: 38%;
     background: #a9ecffb5;
 }
 .thank .overbtn {
     padding: 6px;
     background-color: #2727ff75;
     border-radius: 4px;
     border: 1px solid #5599a6;
 }
 
 .thank .overbtn:hover {
     cursor: pointer;
 }
 .ele img{
    width:500px;
 }
        </style>
        <link rel="stylesheet" media="screen and (max-width:1189px)" href="../responsive/tablet.css">
</head>

<body onclick="click1()">
<?php

if($thank){
    echo '<div id="overlay">
    <div class="thank">
        <h3>Thanks For Feedback</h3>
        <button class="overbtn" onclick="off()">Close</button>
        <script>
            
    function off() {
        document.getElementById("overlay").style.display = "none";
    }
        </script>
    </div>

</div>';
}
?>


    <button onclick="topFunction()" id="myBtn" title="Go to top"> &#8593;</button>
    <script src="../java_script/top.js"></script>
    <header>
        <nav class="navBar">
            <ul>
                <div class="logo">
                    <img src="../image/logo.png" alt="">
                </div>
                <div class="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li id="a1"><a href="#">Category</a>
                        <ul class="dropdown" id="dropdown1">
                            <li><a id="dd" href="sofa.php">Sofas</a></li>
                            <li><a id="dd" href="bed.php">Beds</a></li>
                            <li><a id="dd" href="TVU.php">TV Units</a></li>
                            <li><a id="dd" href="DiningTb.php">Dining Table</a></li>
                            <li><a id="dd" href="coffeeT.php"> Coffe Table</a></li>
                            <li><a id="dd" href="Bookshelves.php">Book Shelves</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.php">Contact</a></li>
                    <div class="pcart">
                        <a href="../php/cart.php" id="cartnumber">

                            <i class='fas fa-cart-plus'></i>Cart&nbsp;
                            <span id="span"></span>
                        </a>
                        <?php 
                         if (isset($_SESSION['cart'])) {
                            $count = count($_SESSION['cart']);
                
                            echo "
                    <script>
                   document.getElementById('span').innerHTML = '$count';
                    </script>
                    
                    ";
                        }
                        ?>
                    </div>
                </div>

                <div class="button">
                    <div>
                    <?php 
                  
                    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
                        echo '  <a href="../html/Signup.php"><button class="btn" style="   border-radius: 7px;">Signup</button></a>
                        ';
                        echo '<a href="../html/Login.php"><button class="btn"  style="border-radius: 7px;">Login</button></a>';
                    }
                    else
                    {
                        echo ' <a href="../html/logout.php"><button type="submit" class="btn" id="logout" style="border-radius: 7px;" name="logout">Logout</button></a>';
                    }
                        
                      
                    ?> 
                 
                    </div>

                    <div class="searchBar">
                        <button id="btn1" onclick="check()"> <i class="fa fa-search"></i></button>
                        <div>
                            <input type="text" name="search" id="search" placeholder="Search" onkeyup="searchKey()" style="width: 164px;">

                            <ul id="myUL">
                                <li id="li1"><a href="sofa.php">Sofa</a></li>
                                <li id="li1"><a href="coffeeT.php">Coffee Table</a></li>
                                <li id="li1"><a href="TVU.php">TV Units</a></li>
                                <li id="li1"><a href="bed.php">Bed</a></li>
                                <li id="li1"><a href="DiningTb.php">Dining Table</a></li>
                                <li id="li1"><a href="Bookshelves.php">Book Shelve</a></li>
                            </ul>
                           
                        </div>
                    </div>

                </div>
            </ul>

        </nav>

    </header>

    <br><br>
    <div class="container" id="con">
    <div class="mySlides fade">
            <img src="../image/diwali2.jpg" alt="Wait..." style="width: 100%;">
        </div>
        <div class="mySlides fade">
            <img src="../image/diwali.png" alt="Wait..." style="width: 100%;">
        </div>
        <div class="mySlides fade">
            <img src="../image/sofa.png" alt="Wait..." style="width: 100%;">
        </div>
        <div class="mySlides fade">
            <img src="../image/table.png" alt="Wait..." style="width: 100%;">
        </div>
       
        <div class="mySlides fade">
            <img src="../image/diwali1.png" alt="Wait..." style="width: 100%;">
        </div>
    </div>

    <div style="text-align: center;" class="dot1">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <!-- For Image Slider -->
    <script src="../java_script/imageSlider.js"></script>
    <br><br><br>

    <h3 style="text-align: center; font-family: 'Ubuntu', sans-serif;">WHAT'S POPULAR IN FURNITURE</h3>
    <br>
    <div class="ele">
        <span style="display:inline; text-align: center;">
            <img id="aa" src="../image/table1.jpg" alt="Error"  >
            <p>Student Table </p>
        </span>
        <span style="display:inline; text-align: center;">
            <img src="../image/chairs.png" alt="Error"  width="500px">
            <p>Chairs </p>
        </span>

    </div>
    <br><br><br><br>
    <h2 style="text-align: center;font-family: 'Ubuntu', sans-serif;" id="service">Services</h2>
    <div class="service" id="service">


        <div class="box1">
            <img src="../image/delivery.png" alt="">
            <br>

            <p style="text-align: center; font-family: 'Ubuntu', sans-serif;"> <b>DELIVERY</b> </p>
        </div>
        <div class="box1">
            <img src="../image/install.png" alt="">
            <p style="text-align: center; font-family: 'Ubuntu', sans-serif;"><b>INSTALLATION</b></p>
        </div>
        <div class="box1">
            <img src="../image/repair.png" alt="">
            <p style="text-align: center; font-family: 'Ubuntu', sans-serif;"><b>REPAIRING</b></p>
        </div>
    </div>
    <br><br><br>
    <div class="lastTitle">
        <div class="first">
            <h2>Feedback</h2>
            <form action="index.php" method="POST">
                Name<input type="text" required name="feedname" id="name"><br><br> Email <input type="email" required  id="email" name="feedemail"> <br><br> Detail <br>
                <textarea name="feedtextarea" id="ttt" cols="30" rows="10" style="resize: none;padding:4px;" required ></textarea><br><br>
                <input type="submit" id="feedbtn" value="Submit" name="feedbtn" onclick="on()" style="float: unset;">
            </form>
    
           <script>
function on(){
    $a = document.getElementById("name").value;
    $b = document.getElementById("email").value;
    $c = document.getElementById("ttt").value;
    if($a!=null && $b != null && $c != null){

    document.getElementById("overlay").style.display = "block";
    }
}
           </script>
        </div>

        <div class="second">
            <h3 style="padding: 5px;text-align: center;font-family: 'Ubuntu', sans-serif;">Follow Us</h3>
            <div style="text-align: center;margin: 0px 10px 0px 10px;">

                <a href="#" class="fa">
                    <img src="../image/Afacebook.png" alt="" style="width: 20px;height: 20px;">
                </a>
                <a href="#" class="fa">
                    <img src="../image/Atwitter.png" alt="" style="width: 22px;height: 22px;">
                </a>
                <a href="#" class="fa">
                    <img src="../image/AA.png" alt="" style="width: 20px;height: 20px;">
                </a>
            </div>
        </div>

    </div>
    <div class="last" style="margin: 6px;">
        <p style="text-align: center; background-color: black;font-family: 'Ubuntu', sans-serif; color: white;">Copyright &copy; All Rights Reserved</p>
    </div>
    <script src="../java_script/searchBar.js">
                        </script>

</body>

</html>