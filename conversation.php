<!--
This file (conversation.php) shows the indiviudal conversation between two Users

conversation-list.php shows the list of all conversation for userLoggedIn
-->

<!--
On this page, we display:
* the messages between two Users
* 'send-message' box that allows Users to send a new message

The two Users in question are: a) userLoggedIn and b) ?userID=x (from the url)

1) Display info of ?userID=x
2) Display messages between the two Users
3) Display 'send-message' box that sends a message to ?userID=x
-->

<?php
include("includes/header.php");

// select all messages sent between userLoggedIn and ?userID=x
// that is, between the User is currently logged in and the User whose page their viewing
// for example, if I'm logged into Facebook and want to check the messages between me and my friend
// by clicking on my friend's profile
// TODO: in accordance with "DRY", move this in User.php (???)
$sql = "SELECT * FROM Messages
        WHERE (to_user_id = ? AND from_user_id = ?)
        OR (to_user_id = ? AND from_user_id = ?)";
$stmt = $db->run($sql, [$_GET['userID'], $userLoggedInID, $userLoggedInID, $_GET['userID']]);
$userMessages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div id="main-conversation-container" class="conversation-container">
    <div class="profile-info-container">
        <div id="profile-photo" class="profile-photo-content">
            <img src=<?php echo $row['profile_pic']; ?>>
        </div>
        <div id="profile-text-content">
            <div id="profile-name" class="profile-content">
                <p><?php echo $row['first_name']; ?></p>
            </div>
            <div id="profile-flag" class="profile-content">
                <p>INSERT NATIONALITY FLAG</pa>
            </div>
            <div id="profile-age" class="profile-content">
                <p><?php echo $row['DOB']; ?></p>
            </div>
            <div id="profile-education-level" class="profile-content">
                <p><?php echo $row['education_level']; ?></p>
            </div>
            <div id="profile-education-major" class="profile-content">
                <p><?php echo $row['education_major']; ?></p>
            </div>
            <div id="profile-description" class="profile-content">
                <p>DESCRIPTION: <p><?php echo $row['description']; ?></p></p>
            </div>
        </div>
    </div>
    <div id="conversation-list-heading" class="heading">
        <h2>Messages</h2>
    </div>
    <div id="conversation-list-messages">
        <?php
        foreach ($userMessages as $row) {
            // fetch the first_name, last_name of the User who sent each message
            // collected from $row['from_user_id'] which has FK relation with User.userID
            $sql = "SELECT first_name, last_name FROM Users WHERE userID = ?";
            $stmt = $db->run($sql, [$row['from_user_id']]);
            $from_user_row = $stmt->fetch(PDO::FETCH_ASSOC);
            $from_user_first_name = $from_user_row['first_name'];
            $from_user_last_name = $from_user_row['last_name'];
            // create html div each time loops through $query
            echo "<div id='message-item'>
                    <span id='message-result'>
                        <div id='from-user-photo'>
                            <img src='' alt='from-user-photo'>
                        </div>
                        <div id='from-user-name'>
                            " . $from_user_first_name . " " . $from_user_last_name . "
                        </div>
                        <div id='from-user-date'>
                            " . $row['date'] . "
                        </div>
                        <div id='from-user-message'>
                            " . nl2br($row['message_content']) . "
                        </div>
                    </span>
                </div>";
        }
        ?>
    </div>
    </div>
    <div id="send-message-form-container">
        <form id="send-message-form" class="edit-db-form" method="post">
            <textarea name="send-message" rows="10" cols="30"></textarea>
            <button type="submit" name="send-message-button">SEND</button>
        </form>
    </div>
</div>






<?php
include("includes/footer.php");
?>
