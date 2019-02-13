<?php
if (isset($_POST['send-message']))
    // TODO: ensure that User has actually entered a message (perhaps validate with min. characters?)
    $messageText = $_POST['send-message'];
    // TODO: include function in User.php
    // TODO: do I need to pass variables of userLoggedIn and ?userID=x ??
    $rowsAffected = $user->sendMessage($messageText);

    if ($rowsAffected > 0) {
        echo "Message successfully sent";
        // TODO: redirect back to conversation.php (with message just sent included)
    } else {
        echo "Error attempting to send message";
    }
?>
