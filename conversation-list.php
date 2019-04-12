<?php
include("includes/header.php");

/* **
PAGE DETAILS:
    ** Conversation-list.php displays a list of all conversations for userLoggedIn
    ** On this page, we display:
        *** A conversation preview for all the conversations for the userLoggedIn
    ** By clicking on one of the conversation previews, it directs the User to conversation.php for
    the details of that particular conversation.

IDEA:
    **

TODO:
    **

BUG:
    **
** */

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

<div class="profile-info-container settings-profile-container conversation-list-container">
    <div class="side-nav">
        <?php // TODO: include href links ?>
        <a id="schedule-lesson-link" class="side-nav-item b" href="#"><?php echo $lang['schedule a lesson']; ?></a>
    </div>
    <div class="conversation-list-content profile-content settings-profile-content">
        <div class="box">
            <div class="box-content">
                <div class="profile-text-container profile-conversation-container">
                    <div class="profile-content profile-description">
                        <div class="profile-description-title">
                            <h3><?php echo $lang['conversations']; ?></h3>
                        </div>
                        <p>
                            <?php
                            foreach ($conversationMessages as $data_row) {
                                // fetch the first_name, last_name of the User involved in the conversation who isn't userLoggedIn
                                // aka 'the other messager'
                                // use if/else to get userID of 'the other messanger'
                                // if $userLoggedInID != $from_user_id, then $from_user_id must equal $otherUserID, and vice versa
                                if ($userLoggedInID == $data_row['from_user_id']) {
                                    $otherUserID = $data_row['to_user_id'];
                                } else {
                                    $otherUserID = $data_row['from_user_id'];
                                }
                                // collected from $data_row['from_user_id'] which has FK relation with User.userID
                                $sql = "SELECT * FROM Users WHERE userID = ?";
                                $stmt = $db->run($sql, [$otherUserID]);
                                $other_user_row = $stmt->fetch(PDO::FETCH_ASSOC);
                                // create html div each time loops through $query
                                echo "<a href='conversation.php?userID=" . $otherUserID . "'>
                                        <div class='conversation-item'>
                                            <span id='conversation-result'>
                                                <div class='conversation-photo profile-photo-small'>
                                                    <img src=" . $other_user_row['profile_pic'] . " alt='from-user-photo'>
                                                </div>
                                                <div class='conversation-name'>
                                                    " . $other_user_row['first_name'] . "
                                                </div>
                                                <div class='conversation-date'>
                                                    " . $data_row['date'] . "
                                                </div>
                                                <div class='conversation-text'>
                                                    " .
                                                    /* print first 200 characters of each message */
                                                    substr($data_row['message_content'], 0, 200) . "
                                                </div>
                                            </span>
                                        </div>
                                    </a>";
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
