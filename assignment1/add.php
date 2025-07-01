<?php
    if(isset($_POST['AddWorkout'])){
        $user_id = $_POST['user_id'];
        $workout_date = $_POST['workout_date'];
        $workout_type = $_POST['workout_type'];
        $duration_min = $_POST['duration_min'];
        $intensity = $_POST['intensity'];
        $mood_after = $_POST['mood_after'];
        $notes = $_POST['notes'];

        require('connect.php');
        $query = "INSERT INTO workout_log 
                    (`user_id`, `workout_date`, `workout_type`, `duration_min`, `intensity`, `mood_after`, `notes`)
                    VALUES('$user_id', '$workout_date', '$workout_type', '$duration_min', '$intensity', '$mood_after', '$notes')";
        $workout = mysqli_query($connect, $query);

        if($workout){
            header('Location: index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Workout</title>
    <style>
        form {
            max-width: 500px;
            margin: 0 auto;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
        }

        div.form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #0077cc;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #005fa3;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Add New Workout</h2>

<form method="POST" action="add.php">
    <div class="form-group">
        <label for="user_id">User ID:</label>
        <input type="number" name="user_id" id="user_id" required>
    </div>

    <div class="form-group">
        <label for="workout_date">Workout Date:</label>
        <input type="date" name="workout_date" id="workout_date" required>
    </div>

    <div class="form-group">
        <label for="workout_type">Workout Type:</label>
        <input type="text" name="workout_type" id="workout_type" required>
    </div>

    <div class="form-group">
        <label for="duration_min">Duration (minutes):</label>
        <input type="number" name="duration_min" id="duration_min" required>
    </div>

    <div class="form-group">
        <label for="intensity">Intensity:</label>
        <select name="intensity" id="intensity" required>
            <option value="">--Select--</option>
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select>
    </div>

    <div class="form-group">
        <label for="mood_after">Mood After:</label>
        <input type="text" name="mood_after" id="mood_after">
    </div>

    <div class="form-group">
        <label for="notes">Notes:</label>
        <textarea name="notes" id="notes" rows="4"></textarea>
    </div>

    <div class="form-group" style="text-align:center;">
        <button type="submit" name="AddWorkout">Add Workout</button>
    </div>
</form>

</body>
</html>
