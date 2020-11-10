<?php
// $a = 	"WFhY";

// echo base64_decode($a);

 ?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/feedpop.css">
    <title>Document</title>
</head>
<body>
    <div id="overlay" onclick="off()">
        <div class="thank">
            <h3>Thanks For Giving Feedback</h3>
            <button class="overbtn" >Close</button>
        </div>

    </div>
   
    <script>
        function on() {
            document.getElementById("overlay").style.display = "block";
        }

        function off() {
            document.getElementById("overlay").style.display = "none";
        }
    </script>
</body>

</html>

