<?php
    session_start();
    include_once "../Config/config.php";
    include "../Helpers/uidGenerator.php";

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
    if(mysqli_num_rows($sql) > 0) 
        echo $email . " Already Exits!";
    if(isset($_FILES['profilePicture'])) {
        $image_name = $_FILES['profilePicture']['name'];
        $temp_name = $_FILES['profilePicture']['tmp_name'];

        $image_explode = explode('.', $image_name);
        $image_extension = end($image_explode);

        $extensions = ['png', 'jepg', 'jpg'];
        $time = time();

        $new_image_name = $time.$image_name;

        if(move_uploaded_file($temp_name, '../Images/'.$new_image_name)) {
            $status = "Active Now";
            $uid = uid();

            $query = "INSERT INTO users (`uid`, `name`, `username`, `email`, `password`, `profile_picture`, `status`) 
                                            VALUES ('{$uid}', '{$name}', '{$username}', '{$email}', '{$password}', '{$new_image_name}', '{$status}')";
            $insert = mysqli_query($conn, $query);
            if($insert) {
                $user = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                if(mysqli_num_rows($user) > 0) {
                    $row = mysqli_fetch_assoc($user);
                    $_SESSION['uid'] = $row['uid'];
                    echo "Success!";
                }
            } else {
                echo "Something Went Wrong!";
            }
        }
    }
?>