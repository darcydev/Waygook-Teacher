<?php
include("includes/header.php");
?>

<!--
On this page, we display:
* the messages between two Users
* 'send-message' box that allows Users to send a new message

The two Users in question are: a) userLoggedIn and b) ?userID=x (from the url)

1) Display info of ?userID=x
2) Display messages between the two Users
3) Display 'send-message' box that sends a message to ?userID=x
-->

<div id="main-conversation-container">
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

    </div>
    </div>
    <div id="send-message-form-container">
        <form id="send-message-form" class="edit-db-form" method="post">
            <input id="message" type="text" name="send-message">
            <button type="submit" name="send-message-button">SEND MESSAGE</button>
        </form>
    </div>
</div>






<?php
include("includes/footer.php");
?>
