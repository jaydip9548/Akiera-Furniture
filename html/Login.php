<?php
$login = false;
if (isset($_POST['login'])) {

    include('../php/_dbconnect.php');

    $user  = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM `user` WHERE username='$user'  ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (strcmp($pass, base64_decode($row['password'])) == 0) {
                session_start();
                $login = true;
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user;
                $_SESSION['email'] = $row['email'];
     
            break;
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Login.css">
    <link rel="stylesheet" href="../css/alert.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


</head>

<body>
    <?php

    if ($login) {
        echo '
    <div class="alert">
<div id="ss">
Login SuccessFul
    <button id="alert1" name="X" onclick="close()">X</button>
</div></div>
<script>
$("#alert1").click(function() {
    $(".alert").hide();
})
setTimeout(function(){ window.location.href = "../php/index.php" }, 1300);
</script>';
    }
    ?>


    <div class="container">
        <div class="box">
            <div class="box1">
                <div class="first1">
                    <span>Login</span>
                </div>
                <div class="first2">
                    <button><a href="../php/index.php" id="btn">X</a></button>
                </div>
            </div>

            <div class="second">

                <form action="Login.php" method="POST">
                    <input type="text" placeholder="Username" required class="form-control" name="username">
                    <br>
                    <input type="password" placeholder="Password" required class="form-control" name="password">
                    <br>
                    <input type="checkbox" checked>&nbsp;Remember Me
                    <span id="forgot"><a href="../php/mail.php">Forgot Password</a></span><br><br>
                    <input type="submit" name="login" value="Login">
                    <br>


                </form>

            </div>
            <div class="third">
                <a href="Signup.php">Not Signup</a>
            </div>
        </div>
    </div>
</body>

</html>