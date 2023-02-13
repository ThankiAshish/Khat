<?php
    $hostname  = "localhost";
    $user = "root";
    $password = "";
    $database = "khat";

    $conn = mysqli_connect($hostname, $user, $password, $database) or die("Database Connection Failed");
?>