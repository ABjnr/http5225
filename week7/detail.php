<?php
require('connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $query = "SELECT * FROM schools WHERE id = $id";
    $result = mysqli_query($connect, $query);
    $school = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add School</title>
</head>

<body>
    <h1>School Details</h1>
    <p>Board Name: <?php echo $school['Board Name']; ?></p>
    <p>School Name: <?php echo $school['School Name']; ?></p>
    <a href="index.php">Back to Index</a>
</body>

</html>