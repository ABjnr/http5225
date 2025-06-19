<?php
require('connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $query = "DELETE FROM schools WHERE id = $id";
    $result = mysqli_query($connect, $query);
    // print_r($result);
    if($result){
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete School</title>
</head>

<body>
    <a href="index.php">Back to Index</a>
</body>

</html>