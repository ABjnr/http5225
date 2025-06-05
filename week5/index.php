<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <style>
        body{
            background-color: #002;
            color: white;
        }
    </style> -->
</head>
<body>
<h1>php and mysql</h1>

    <?php
        $connect = mysqli_connect("localhost", "root", "password", "colors");

        if(!$connect){
            die( "Connection failed: " . mysqli_connect_error());
        }
        $query = 'SELECT * FROM colors';

        $colors = mysqli_query($connect, $query);
        // print_r($colors);

        if($colors){
            foreach($colors as $color){
                // echo $color['Name'];
                echo '<div class="' . $color['Name'] . '"' . ' style = "background-color: ' . $color['Hex'] . '"' . ' >' . $color['Hex'] . '</div>';
            }
        }
    ?>
</body>
</html>