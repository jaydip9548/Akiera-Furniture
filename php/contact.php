<?php
$thank = false;
include('_dbconnect.php');
if(isset($_POST['helpsubmit'])){
    $name = $_POST['firstname'];
  $helpmail = $_POST['lastname'];
  $helpdetail = $_POST['subject'];
    $sql = "INSERT INTO `help` (`name`, `email`, `detail`, `date`) VALUES ('$name', '$helpmail', '$helpdetail', current_timestamp());";
    $result = mysqli_query($conn,$sql);
        $thank = true;
   
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/contact.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <title>Contact Us</title>
  
</head>
<body>

<?php

if($thank){
    echo '<div id="overlay">
    <div class="thank">
        <h3>We have got your request and will Response soon.</h3>
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
    <h2 style="text-align:center;font-family: 'Ubuntu', sans-serif;">Our Teams are here to help </h2>
    <div class="row">
        <div class="box">
            <div class="column">
                <div class="card">
                    <div class="container"  style=" font-family: 'Ubuntu', sans-serif;">
                        <h2>Anand Panchal</h2>
                        <p class="title">CEO & Founder</p>
                        <p></p>
                        <p>panchalanand26031@gmail.com</p>
                        <p>Mobile no : 7600248264</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="column">
                <div class="card">
                    <div class="container"  style=" font-family: 'Ubuntu', sans-serif;">
                        <h2>Jaydip Makwana</h2>
                        <p class="title">Co-Founder and CTO</p>
                        <p></p>
                        <p>jaydipmakwana9548@gmail.com</p>
                        <p>Mobile no : 7600248264</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="column">
                <div class="card">
                    <div class="container"  style=" font-family: 'Ubuntu', sans-serif;">
                        <h2>Mahesh Nanera </h2>
                        <p class="title">Designer</p>
                        <p></p>
                        <p>maheshnanera@gmail.com</p>
                        <p>Mobile no : 7600248264</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="font-family: 'Ubuntu', sans-serif;">
        <form action="contact.php" method="POST">

            <label for="fname"> Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Your name">

            <label for="lname">Email</label>
            <input type="email" id="lname" name="lastname" placeholder="Your Email" >

            <label for="country" name="option">Country</label>
            <select id="country" name="country">
            <option value="india">India</option>
            <option value="canada">Canada</option>
            <option value="usa">USA</option>
          </select>

            <label for="subject">Subject</label>
            <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

            <input type="submit" value="Submit" name="helpsubmit">

            <button type="button" id="back" onclick="back1()">Back</button>
        </form>
        <script>
            function back1(){
                window.history.back();
            }
        </script>
    </div>


</body>

</html>

<div class="row">

</div>