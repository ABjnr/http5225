<?php
  $connect = mysqli_connect("localhost", "root", "password", "schools");
  
  if(!$connect){
    die("Connection Failed: " . mysqli_connect_error());
  }