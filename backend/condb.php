<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "behavior_tracking";
    $conn = new mysqli($host, $user, $password, $dbname);
    if(!$conn){
        die("Failed to connect" . mysqli_connect_error());
    }