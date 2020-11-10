<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #overlay {
            position: fixed;
            display: block;

            width: 100%;
            height: 100%;
            top: 0;
            left: 0px;
            right: 0;
            background-color: rgb(112 111 111 / 50%);
            z-index: 2;
            cursor: pointer;

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
    </style>
</head>

<body>
    <div id="overlay" onclick="off()">
        <div class="thank">
            <h3>Thanks For Giving Feedback</h3>
            <button class="overbtn">Close</button>
        </div>

    </div>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quia voluptate odio temporibus illum reprehenderit est accusamus ipsa, vero, libero inventore quas aliquid explicabo delectus ut earum at atque eius hic.</p>
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