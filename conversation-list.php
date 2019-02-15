<!--
This file (conversation-list.php) shows the list of all conversation for userLoggedIn

conversation.php shows the indiviudal conversation between two Users
-->

<!--
On this page, we display:
* all the conversation preview for all the conversations for the userLoggedIn.
* by clicking on one of the conversations, takes the User to conversation.php for that particular conversation

Tasks:
1) Display generic html content heading (Name, Message, Date)
2) Write SQL query to collect all messages sent to or from userLoggedIn
3) Display a preview of each message in a 'conversation-list'
    ** Preview includes:
    3.1) Photo of other user
    3.2) Name of other user
    3.3) Preview (one line) of most recent message
    3.4) Date of most recent message
-->

<?php
include("includes/header.php");

// select all messages either sent from or sent to userLoggedIn
$sql = "SELECT * FROM  `Messages` a
        INNER JOIN (
            SELECT MAX(  `messageID` ) AS id
            FROM  `Messages` AS  `alt`
            WHERE  `alt`.`to_user_id` = ?
            OR  `alt`.`from_user_id` = ?
            GROUP BY  least(`to_user_id` ,  `from_user_id`), greatest(`to_user_id` ,  `from_user_id`)
        ) b ON a.messageID = b.id";
$stmt = $db->run($sql, [$userLoggedInID, $userLoggedInID]);
$conversationMessages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div id="main-conversation-list-container" class="conversation-container">
    <div id="conversation-list-heading" class="heading">
        <h2>Conversations</h2>
    </div>
    <div id="conversation-list-messages">
        <?php
        foreach ($conversationMessages as $row) {
            // fetch the first_name, last_name of the User involved in the conversation who isn't userLoggedIn
            // aka 'the other messager'
            // use if/else to get userID of 'the other messanger'
            // if $userLoggedInID != $from_user_id, then $from_user_id must equal $otherUserID, and vice versa
            if ($userLoggedInID == $row['from_user_id']) {
                $otherUserID = $row['to_user_id'];
            } else {
                $otherUserID = $row['from_user_id'];
            }
            // collected from $row['from_user_id'] which has FK relation with User.userID
            $sql = "SELECT first_name, last_name FROM Users WHERE userID = ?";
            $stmt = $db->run($sql, [$otherUserID]);
            $other_user_row = $stmt->fetch(PDO::FETCH_ASSOC);
            // create html div each time loops through $query
            echo "<div id='conversation-item'>
                    <span id='conversation-result'>
                        <div id='from-user-photo'>
                            <img src='' alt='from-user-photo'>
                        </div>
                        <div id='from-user-name'>
                            " . $other_user_row['first_name'] . "
                        </div>
                        <div id='from-user-date'>
                            " . $row['date'] . "
                        </div>
                        <div id='from-user-message'>
                            " . $row['message_content'] . "
                        </div>
                    </span>
                </div>";
        }
        ?>
    </div>

</div>

<?php
include("includes/footer.php");
?>
