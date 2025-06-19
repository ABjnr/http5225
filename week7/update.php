<?php
require('connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $query = "SELECT * FROM schools WHERE id = $id";
    $result = mysqli_query($connect, $query);
    $school = mysqli_fetch_assoc($result);
    // print_r($school);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $BoardName = $_POST['BoardName'];
    $SchoolName = $_POST['SchoolName'];
    $sql = "UPDATE schools SET `Board Name` = '$BoardName', `School Name` = '$SchoolName' WHERE id = $id";
    $result = mysqli_query($connect, $sql);
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
  <title>Add School</title>
</head>

<body>
  <h1>Add a School</h1>

  <form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <input type="text" name="BoardName" placeholder="Board Name" value="<?php echo $school['Board Name']; ?>">
    <input type="text" name="SchoolName" placeholder="School Name" value="<?php echo $school['School Name']; ?>">
    <input type="submit" value="Update School" name="UpdateSchool">
  </form>

</body>

</html>