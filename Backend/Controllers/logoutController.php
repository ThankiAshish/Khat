<?php
    session_start();
    if(isset($_SESSION['uid'])) {
        include_once "../Config/config.php";
        $logoutId = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logoutId)) {
            $status = "Offline Now";
            $query = "UPDATE users SET status = '{$status}' WHERE uid = '{$logoutId}'";
            $sql = mysqli_query($conn, $query);
            if($sql) {
                session_unset();
                session_destroy();
                header("location: ../../Views/login.php");
            }
        } else {
            header("location: ../../../");
        }
    } else {
        header("location: ../../Views/login.php");
    }
?>