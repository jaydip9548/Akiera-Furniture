<?php
$send = false;
if (isset($_POST['mail'])) {
    $mail = $_POST['email'];
    $no = $_POST['number'];
    include('_dbconnect.php');

    $sql = "SELECT * FROM `user` WHERE `mobile_no`='$no' AND `email`='$mail'";
$show = false;
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ((strcmp($row['email'], $mail) == 0) && ($row['mobile_no'] == $no)) {
$show= true;
                $send = true;
                $to_email = $mail;
                $subject = "";
                $body = "Your username:" . $row['username'] . "   " . "Password : " . $row['password'];
                $headers = "From: jaydipmakwana654@gmail.com";

                if (mail($to_email, $subject, $body, $headers)) {
                    echo "Email successfully sent to $to_email...";
                } else {
                    echo "Email sending failed... please Try again";
                break;
                }
            }
        }
        if(!$show)
        {
            echo '<script>alert("You are Not Signup..! please Signup")</script>';
            echo '<script>window.location.href="../html/Signup.php"</script>';

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/mail.css">
</head>

<body>
    <?php
    if (!$send) {
        echo '
        <div class="container" >
        <form action="mail.php" method="POST">
<input type="email" name="email" maxlength="35" class="form-control" placeholder=" Registered Email"><br>
<input type="number" name="number" maxlength="9999999999" class="form-control" placeholder="Registered Mobile_No"><br>
<input type="submit" name="mail" value="Submit">

        </form>
    </div>
        ';
    }

    ?>

</body>

</html>