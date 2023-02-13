<?php
    session_start();
    include_once "../Config/config.php";
    if(isset($_SESSION['uid'])) {
        $uid = $_SESSION['uid'];
        $username = $_POST['user-name'];
        $email = $_POST['user-email'];
        //echo $username; 
        echo $query = "UPDATE users SET username = '{$username}', email = '{$email}' WHERE uid = '{$uid}'";
        $sql = mysqli_query($conn, $query);
        if($sql) {
           // print_r(mysqli_query($conn, "SELECT * FROM users WHERE uid = '{$uid}'"));
            echo "Success!";
        } else {
            echo "Error!";
        }
    }

?>