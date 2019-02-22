<?php
if (isset($_POST['send-message-button'])) {
    $messageText = $_POST['send-message'];
    // in header.php we use $_GET to get the userID of the page we're viewing (fe, ?userID=x)
    $to_user_id = $userID;
    $rowsAffected = $user->insertMessage($messageText, $to_user_id);

    if ($rowsAffected > 0) {
        header("Location: conversation-list.php");
    } else {
        echo "Error attempting to send message";
    }
}
?>
