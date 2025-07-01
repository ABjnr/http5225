<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 1</title>    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-left: 5px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
        }
        .high {
            border-left-color: red;
        }
        .medium {
            border-left-color: orange;
        }
        .low {
            border-left-color: green;
        }
        nav {
            background-color: #007BFF;       
            padding: 10px 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        nav a {
            color: white;                   
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1rem;
        }
        nav a:hover {
            text-decoration: underline;   
        }
        form {
            display: inline-block;         
            margin-right: 10px;            
            margin-top: 10px;
        }
        button {
            background-color: #007BFF;   
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;     
        }

    </style>
</head>
<body>
    <nav>
     <a href="add.php">Add Workout</a>
    </nav>

    <?php
        require('connect.php');
        $query = 'SELECT workout_log.*, users.username 
                    FROM workout_log 
                    JOIN users ON workout_log.user_id = users.user_id 
                    ORDER BY workout_date DESC';
        $result = mysqli_query($connect, $query);
            
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $intensityClass = "";
                if ($row['intensity'] == 'High') {
                    $intensityClass = "high";
                } elseif ($row['intensity'] == 'Medium') {
                    $intensityClass = "medium";
                } elseif ($row['intensity'] == 'Low') {
                    $intensityClass = "low";
                }

            echo "<div class='card $intensityClass'>";
            echo "<h3>" . htmlspecialchars($row['workout_type']) . " - " . htmlspecialchars($row['username']) . "</h3>";
            echo "<p><strong>Date:</strong> " . $row['workout_date'] . "</p>";
            echo "<p><strong>Duration:</strong> " . $row['duration_min'] . " mins</p>";
            echo "<p><strong>Intensity:</strong> " . $row['intensity'] . "</p>";
            echo "<p><strong>Mood:</strong> " . $row['mood_after'] . "</p>";
            echo "<p><strong>Notes:</strong> " . htmlspecialchars($row['notes']) . "</p>";

            echo '<form action="update.php?workout_id=' . (int)$row['workout_id'] . '" method="GET">
                    <input type="hidden" name="id" value="' . $row['workout_id'] . '">
                    <button type="submit">Edit</button>
                </form>';

            echo '<form action="delete.php" method="GET" onsubmit="return confirm(\'Are you sure?\');">
                    <input type="hidden" name="workout_id" value="' . $row['workout_id'] . '">
                    <button type="submit">Delete</button>
                </form>';
            echo '<form action="detail.php" method="GET">
                    <input type="hidden" name="id" value="' . $row['workout_id'] . '">
                    <button type="submit">Details</button>
                </form>';
            echo "</div>";
            }
        } else {
            echo "<p>No workout data found.</p>";
        }
    ?>
</body>
</html>