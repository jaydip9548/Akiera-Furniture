<?php
$alert = false;
$showalert = false;

if (isset($_POST['signup'])) {

    $name = $_POST['myName'];
    $no = $_POST['myNumber'];
    $email = $_POST['email'];
    $user = $_POST['myUserName'];
    $pass = $_POST['password'];
    $pass1 = $_POST['passwordc'];
   
if(strcmp($pass,$pass1)==0)
{
    include('../php/_dbconnect.php');
    $sqlExist =  "SELECT * FROM `user` WHERE `username` = '$user'";
    $exist = mysqli_query($conn, $sqlExist);

    if (mysqli_num_rows($exist) > 0) {
        $alert = true;
    } else {

        $hash = base64_encode($pass);
        $sql = "INSERT INTO `user` (`name`, `mobile_no`, `email`, `username`, `password`) VALUES ('$name', '$no', '$email', '$user', '$hash');";
        $result = mysqli_query($conn, $sql);
        $showalert = true;
    }
}
else{
    echo "<script>alert('Both Passwords Are not Equal.')</script>";
}
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/Signup.css">
    <link rel="stylesheet" href="../css/alert.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


</head>

<body>
    <?php
    if ($alert) {
        echo '
<div class="alert">
<div id="ss">
        Username Already Exist.
    <button id="alert1" name="X" onclick="close()">X</button>
</div>
</div>
<script>
$("#alert1").click(function() {
    $(".alert").hide();})
</script>
';
    }
    if ($showalert) {
        echo '
    <div class="alert">
<div id="ss">
Signup SuccessFul
    <button id="alert1" name="X" onclick="close()">X</button>
</div></div>
<script>
$("#alert1").click(function() {
    $(".alert").hide();
})
setTimeout(function(){ window.location.href = "Login.php" }, 3000);
</script>';
    }
    ?>



    <h3 style="margin-top: 45px;">Signup</h3>
    <div class="class1">
        <button id="XX1"><a href="../php/index.php">&#10005;</a></button>
        <form name="form1" action="Signup.php" method="POST">

            Name <br><input type="text" name="myName" id="myName" class="form-control" maxlength="20" required>

            <br> Mobile_No : <br><input type="number" id="number" class="form-control" name="myNumber" max="9999999999" required>

            <br> Email : <br> <input type="email" class="form-control" id="myEmail" name="email" required>

            <br> UserName :<br> <input type="text" class="form-control" name="myUserName" id="user" maxlength="20" required> <br>

            Password : <br>
            <input type="password" class="form-control" id="myPassword" maxlength="10" name="password" required minlength="5">

            <br> Confirm Password : <br>
            <input type="password" class="form-control" id="myPassword1" maxlength="10"  name="passwordc" required>

            <input type="checkbox" name="cBox" id="checkbox" checked> I agree with your Privacy Policy. <br><br>

            <button type="submit" class="btn btn-primary" style="width: 80px; " id='SIGN' name="signup">Signup</button>

            <button type="button" class="btn btn-primary" id="" style="width: 80px;" onclick="reset()">Reset</button>
<script>
    function reset(){
        document.getElementById("myName")="";
        document.getElementById("number")="";
        document.getElementById("myEmail")="";
        document.getElementById("user")="";
        document.getElementById("myPassword")="";
        document.getElementById("myPassword1")="";
    }
</script>
            <br><br>

            <a href="Login.php">Already Signup !</a>
        </form>
       
    </div>
</body>

</html>