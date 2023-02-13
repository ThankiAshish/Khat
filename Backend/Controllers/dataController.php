<?php
    while($row = mysqli_fetch_assoc($sql)) {
        $lastMessageQuery = "SELECT * FROM messages WHERE (`incoming_message_id` = '{$row['uid']}' 
                                OR `outgoing_message_id` =  '{$row['uid']}')
                            AND (`outgoing_message_id` = '{$outgoingId}' 
                                OR `incoming_message_id` = '{$outgoingId}')
                            ORDER BY `message_id`
                            DESC LIMIT 1
                        ";
        $lastMessageSql = mysqli_query($conn, $lastMessageQuery);
        $lastMessageRow = mysqli_fetch_assoc($lastMessageSql);
        $you = "";
        $message = "No Message Available";
        
        if(mysqli_num_rows($lastMessageSql) > 0) {
            $result = $lastMessageRow['message'];
            ($outgoingId === $lastMessageRow['outgoing_message_id']) ? $you = "You: " : $you = "";
            (strlen($result) > 28 ? $message = substr($result, 0, 28).'...' : $message = $result);
        } else {
            $result = "No Message Available";
        }

        
        $output .= '
            <a href="./Views/chat.php?uid='.$row['uid'].'">
                <div class="chat">
                    <div class="profile-picture-container">
                        <img src="./Backend/Images/'. $row['profile_picture'] .'" alt="Profile Picture" />
                    </div>
                    <div class="chat-details">
                        <h3>'.$row['name'].'</h3>
                        <p>'.$you . $message.'</p>
                    </div>
                </div>
            </a>';
    }
?>