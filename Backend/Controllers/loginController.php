<?php
    session_start();
    include_once "../Config/config.php";
    include "../Helpers/uidGenerator.php";

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
    if(mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $status = "Active Now";
        $query = "UPDATE users SET status = '{$status}' WHERE uid = '{$row['uid']}'";
        $statusUpdate = mysqli_query($conn, $query);
        if($statusUpdate) {
            $_SESSION['uid'] = $row['uid'];
            echo "Success!";
        }
    } else {
        echo "Email or Password is incorrect!";
    }
?>