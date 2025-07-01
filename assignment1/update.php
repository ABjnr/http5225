<?php
    require('connect.php');
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        $id = (int)$_GET['id'];
        $query = "SELECT * FROM workout_log WHERE workout_id = $id";
        $result = mysqli_query($connect, $query);
        $workout = mysqli_fetch_assoc($result);
    } else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $workout_id = (int)$_POST['workout_id'];
        $user_id = (int)$_POST['user_id'];
        $workout_date = $_POST['workout_date'];
        $workout_type = $_POST['workout_type'];
        $duration_min = $_POST['duration_min'];
        $intensity = $_POST['intensity'];
        $mood_after = $_POST['mood_after'];
        $notes = $_POST['notes'];
        
        $sql = "UPDATE workout_log SET 
                `workout_date` = '$workout_date',
                `workout_type` = '$workout_type',
                `duration_min` = '$duration_min',
                `intensity` = '$intensity',
                `mood_after` = '$mood_after',
                `notes` = '$notes' 
                WHERE workout_id = $workout_id AND user_id = '$user_id'";
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
    <title>Edit Workout</title>
    <style>
        form {
            max-width: 500px;
            margin: 0 auto;
            background: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
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
            color: white;
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

<h2 style="text-align: center;">Edit Workout</h2>

<form method="POST" action="update.php">
    <input type="hidden" name="workout_id" value="<?= $workout['workout_id'] ?>">

    <div class="form-group">
        <label for="user_id">User ID</label>
        <input type="number" name="user_id" id="user_id" value="<?= $workout['user_id'] ?>" required>
    </div>

    <div class="form-group">
        <label for="workout_date">Workout Date</label>
        <input type="date" name="workout_date" id="workout_date" value="<?= $workout['workout_date'] ?>" required>
    </div>

    <div class="form-group">
        <label for="workout_type">Workout Type</label>
        <input type="text" name="workout_type" id="workout_type" value="<?= htmlspecialchars($workout['workout_type']) ?>" required>
    </div>

    <div class="form-group">
        <label for="duration_min">Duration (minutes)</label>
        <input type="number" name="duration_min" id="duration_min" value="<?= $workout['duration_min'] ?>" required>
    </div>

    <div class="form-group">
        <label for="intensity">Intensity</label>
        <select name="intensity" id="intensity">
            <option value="Low" <?= $workout['intensity'] === 'Low' ? 'selected' : '' ?>>Low</option>
            <option value="Medium" <?= $workout['intensity'] === 'Medium' ? 'selected' : '' ?>>Medium</option>
            <option value="High" <?= $workout['intensity'] === 'High' ? 'selected' : '' ?>>High</option>
        </select>
    </div>

    <div class="form-group">
        <label for="mood_after">Mood After</label>
        <input type="text" name="mood_after" id="mood_after" value="<?= htmlspecialchars($workout['mood_after']) ?>">
    </div>

    <div class="form-group">
        <label for="notes">Notes</label>
        <textarea name="notes" id="notes" rows="4"><?= htmlspecialchars($workout['notes']) ?></textarea>
    </div>

    <div class="form-group" style="text-align:center;">
        <button type="submit">Update Workout</button>
    </div>
</form>

</body>
</html>
