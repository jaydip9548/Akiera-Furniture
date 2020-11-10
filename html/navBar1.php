
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navBar1.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <title>NavBar1</title>
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
        </style>
        
        <link rel="stylesheet" media="screen and (max-width:1189px)" href="../responsive/Res_navBar.css">
</head>

<body onclick="click1()">
    <header>
        <nav class="navBar">
            <ul>
                <div class="logo">
                    <img src="../image/logo.png" alt="">
                </div>
                <div class="menu" style=" font-family: 'Ubuntu', sans-serif;">
                    <li><a href="../php/index.php">Home</a></li>
                    <li><a href="../php/about.php">About</a></li>
                    <li id="a1"><a href="#">Category</a>
                        <ul class="dropdown" id="dropdown1">
                            <li><a id="dd" href="../php/sofa.php">Sofas</a></li>
                            <li><a id="dd" href="../php/bed.php">Beds</a></li>
                            <li><a id="dd" href="../php/TVU.php">TV Units</a></li>
                            <li><a id="dd" href="../php/DiningTb.php">Dining Table</a></li>
                            <li><a id="dd" href="../php/coffeeT.php"> Coffe Table</a></li>
                            <li><a id="dd" href="../php/Bookshelves.php">Book Shelves</a></li>
                        </ul>
                    </li>
                    <li><a href="../php/contact.php">Contact</a></li>
                    <div class="pcart">
                        <a href="../php/cart.php" id="cartnumber">

                            <i class='fas fa-cart-plus'></i>Cart&nbsp;
                            <span id="span"></span>
                        </a>
                    </div>
                </div>

                <div class="button" style=" font-family: 'Ubuntu', sans-serif;">

                    <div>
                    <?php         
                  if((!isset($_SESSION['loggedin']))&&(!isset($_SESSION['email']) &&(!isset($_SESSION['username']))) ){
              echo '  <a href="../html/Signup.php"><button class="btn" style="   border-radius: 7px;">Signup</button></a> ';
                      echo '<a href="../html/Login.php"><button class="btn"  style="border-radius: 7px;">Login</button></a>';
                
                    }
                  else
                  {
                      echo ' <a href="../html/logout.php"><button type="submit" class="btn" id="logout" style="border-radius: 7px;" name="logout">Logout</button></a>';
                
                  }
                      
                    
                  ?> 
                    </div>

                    <div class="searchBar" style=" font-family: 'Ubuntu', sans-serif;">
                        <button id="btn1" onclick="check()"> <i class="fa fa-search"></i></button>
                        <div>
                            <input type="text" name="search" id="search" placeholder="Search" onkeyup="searchKey()" style="width: 163px;">
                            <ul id="myUL">
                                <li id="li1"><a href="../php/sofa.php">Sofa</a></li>
                                <li id="li1"><a href="../php/coffeeT.php">Coffee Table</a></li>
                                <li id="li1"><a href="../php/TVU.php">TV Units</a></li>
                                <li id="li1"><a href="../php/bed.php">Bed</a></li>
                                <li id="li1"><a href="../php/DiningTb.php">Dining Table</a></li>
                                <li id="li1"><a href="../php/Bookshelves.php">Book Shelve</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
            </ul>
        </nav>
    </header>

    <br><br>

    <script src="../java_script/searchBar.js"></script>
</body>

</html>