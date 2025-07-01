<?php
    $connect = mysqli_connect("localhost", "root", "password", "workoutDb");

    if(!$connect){
        die("Connection failed" . mysqli_connect_error());
    }