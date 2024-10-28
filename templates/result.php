<?php

ob_start();
include('./config.php');


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $keyWords = file_get_contents('./image_detect_data.json');
    $keyWords = json_decode($keyWords);
    $keyWords = implode("','", $keyWords);

    $select = "SELECT * FROM `womens-apparel` where ItemName in ('$keyWords')";
    $results = mysqli_query($conn, $select);
}


?>



<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        #myInput {
            background-image: url('/css/searchicon.png');
            background-position: 10px 12px;
            background-repeat: no-repeat;
            width: 100%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }

        #myUL {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        #myUL li a {
            border: 1px solid #ddd;
            margin-top: -1px;
            /* Prevent double borders */
            background-color: #f6f6f6;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            color: black;
            display: block
        }

        #myUL li a:hover:not(.header) {
            background-color: #eee;
        }
        .myUL{
            width: 24%;
        }

        /* .tag {
            visibility: hidden;
        } */

        /* .image{
            visibility: hidden;
        } */
    </style>
</head>

<body>


    <ul id="myUL">

        <?php
        while ($result = $results->fetch_assoc()) {
            echo "<h3>name: $result[ItemName]</h3>";

            // Encode the image data as a base64 string
            $image_base64 = base64_encode($result['Image']);
            // Display the image in an <img> tag
            echo "<img src='data:image/jpeg;base64,$image_base64' class='myUL'>";
            echo "<div  >Color : $result[Color]</div>";
            echo "<div> Size : $result[Size]</div>";
            echo "<div> Quantity :$result[Quantity]</div>";
            echo "<div> price : $result[Price]</div>";
            
            echo '<br>';
        }
        ?>

    </ul>


</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    setInterval(myTimer, );
    var old = null;
    1000

    function myTimer() {

    }
</script>