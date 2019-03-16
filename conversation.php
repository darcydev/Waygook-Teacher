<!--
The page shows the indiviudal conversation between two Users

conversation-list.php shows the list of all conversation for userLoggedIn

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

<div class="profile-info-container settings-profile-container conversation-container">
    <div class="side-nav">
        <?php include("includes/side-nav.php"); ?>
    </div>
    <div class="conversation-content profile-content settings-profile-content">
        <div class="box">
            <div class="box-content">
                <?php include("includes/profile-info-container.php"); ?>
                <div class="profile-text-container profile-conversation-container">
                    <div class="profile-content profile-description">
                        <?php include("includes/send-message-form.php"); ?>
                        <div class="profile-description-title">
                            <h3>Messages</h3>
                        </div>
                        <p>
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
                                            <div class='conversation-photo'>
                                                <img src='' alt='from-user-photo'>
                                            </div>
                                            <div class='conversation-name'>
                                                " . $from_user_first_name . " " . $from_user_last_name . "
                                            </div>
                                            <div class='conversation-date'>
                                                " . $row['date'] . "
                                            </div>
                                            <div class='conversation-text'>
                                                " . nl2br($row['message_content']) . "
                                            </div>
                                        </span>
                                    </div>";
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>
