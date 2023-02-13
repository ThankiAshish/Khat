<?php
    session_start();
    include_once "../Config/config.php";
    $outgoingId = $_SESSION['uid'];
    $searchContent = mysqli_real_escape_string($conn, $_POST['searchContent']);

    $query = "SELECT * FROM users WHERE NOT uid = '{$outgoingId}' AND (`name` LIKE '%{$searchContent}%' OR username LIKE '%{$searchContent}%')";
    $output = '';
    $sql = mysqli_query($conn, $query);

    if(mysqli_num_rows($sql) > 0) {
        include "./dataController.php";
    } else {
        $output .= "User Not Found!";
    }
    echo $output;
?>