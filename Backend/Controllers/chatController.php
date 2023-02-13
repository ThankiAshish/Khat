<?php
    session_start();
    if(isset($_SESSION['uid'])) {
        include_once "../Config/config.php";
        $outgoingId = mysqli_real_escape_string($conn, $_POST['outgoingId']);
        $incomingId = mysqli_real_escape_string($conn, $_POST['incomingId']);
        $sendMessage = mysqli_real_escape_string($conn, $_POST['sendMessage']);

        if(!empty($sendMessage)) {
            $query = "INSERT INTO messages (`incoming_message_id`, `outgoing_message_id`, `message`) VALUES ('{$incomingId}', '{$outgoingId}', '{$sendMessage}')";
            $sql = mysqli_query($conn, $query) or die();
        }
    } else {
        header("../Views/login.php");
    }
?>