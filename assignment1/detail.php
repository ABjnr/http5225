<?php
    require('connect.php');

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $id = (int)$_GET['id'];

        $query = "SELECT workout_log.*, users.username 
                FROM workout_log 
                JOIN users ON workout_log.user_id = users.user_id 
                WHERE workout_id = $id";

        $result = mysqli_query($connect, $query);
        $workout = mysqli_fetch_assoc($result);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Workout Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 30px;
        }

        .details-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 500px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        p {
            margin: 10px 0;
            font-size: 1rem;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            color: white;
            background-color: #007BFF;
            padding: 10px 15px;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
        }

        a:hover {
            background-color: #0056b3;
        }

        .not-found {
            text-align: center;
            font-weight: bold;
            color: red;
        }
    </style>
</head>
<body>
    <div class="details-box">
        <h1>Workout Details</h1>

        <?php if ($workout): ?>
            <p><strong>User:</strong> <?php echo htmlspecialchars($workout['username']); ?></p>
            <p><strong>Date:</strong> <?php echo $workout['workout_date']; ?></p>
            <p><strong>Workout Type:</strong> <?php echo htmlspecialchars($workout['workout_type']); ?></p>
            <p><strong>Duration:</strong> <?php echo $workout['duration_min']; ?> minutes</p>
            <p><strong>Intensity:</strong> <?php echo $workout['intensity']; ?></p>
            <p><strong>Mood After:</strong> <?php echo htmlspecialchars($workout['mood_after']); ?></p>
            <p><strong>Notes:</strong> <?php echo htmlspecialchars($workout['notes']); ?></p>
        <?php else: ?>
            <p>No workout found.</p>
        <?php endif; ?>

        <a href="index.php">Back to Index</a>
    </div>
</body>
</html>
