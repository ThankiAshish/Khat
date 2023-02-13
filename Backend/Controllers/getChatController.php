<?php
    session_start();
    if(isset($_SESSION['uid'])) {
        include_once "../Config/config.php";
        $outgoingId = mysqli_real_escape_string($conn, $_POST['outgoingId']);
        $incomingId = mysqli_real_escape_string($conn, $_POST['incomingId']);
        $output = '';

        $query = "SELECT * FROM messages
                    LEFT JOIN users
                        ON users.uid = messages.outgoing_message_id
                    WHERE (incoming_message_id = '{$incomingId}' 
                        AND outgoing_message_id = '{$outgoingId}') 
                    OR (outgoing_message_id = '{$incomingId}' 
                        AND incoming_message_id = '{$outgoingId}')
                    ORDER BY message_id";

        $sql = mysqli_query($conn, $query);
        if(mysqli_num_rows($sql) > 0) {
            while($row = mysqli_fetch_assoc($sql)) {
                if($row['outgoing_message_id'] === $outgoingId) {
                    $output .= '
                        <div class="chat outgoing">
                            <div class="details">
                                <p>'.$row['message'].'</p>
                            </div>
                        </div>
                    ';
                } else {
                    $output .= '
                        <div class="chat incoming">
                            <img src="../Backend/Images/'.$row['profile_picture'].'"  />
                            <div class="details">
                                <p>'.$row['message'].'</p>
                            </div>
                        </div>
                    ';
                }
            }
            echo $output;
        }
    } else {
        header("../Views/login.php");
    }
?>