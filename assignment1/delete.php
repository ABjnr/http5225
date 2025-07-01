<?php
    require('connect.php');
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $id = (int)$_GET['workout_id'];
        $query = "DELETE FROM workout_log WHERE workout_id = $id";
        $result = mysqli_query($connect, $query);
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
    <title>Delete Workout</title>
</head>
<body>
    <h2>Delete Workout</h2>

    <p>Workout deleted successfully.</p>

    <a href="index.php">Back to Index</a>
</body>
</html>
