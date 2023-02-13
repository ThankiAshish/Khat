<?php
    session_start();
    include_once "../Config/config.php";

    $outgoingId = $_SESSION['uid'];
    $query = "SELECT * FROM users WHERE NOT uid = '{$outgoingId}'";
    $sql = mysqli_query($conn, $query);

    $output = '';

    if(mysqli_num_rows($sql) > 0) {
        include "./dataController.php";
    } else {
        $output .= 'No Users are Available to Chat!';
    }
    echo $output;
?>