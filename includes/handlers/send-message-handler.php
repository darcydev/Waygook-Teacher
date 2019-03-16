<?php
if (isset($_POST['send-message-button']) && isset($_GET['userID'])) {
    $message_text = $_POST['send-message'];
    // in header.php we use $_GET to get the userID of the page we're viewing (fe, ?userID=x)
    $to_user_id = $_GET['userID'];

    $rowsAffected = $user->insertMessage($message_text, $to_user_id);

    if ($rowsAffected == 1) {
        header("Location: conversation-list.php");
    } else {
        echo "Error attempting to send message";
    }
}
?>
