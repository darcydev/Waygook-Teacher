<?php
include("includes/header.php");

// if User is viewing own profile, show 'edit-profile' button
// else, show 'send-message' button
if($row['username'] == $userLoggedIn) {
    echo '<script>
            $(document).ready(function() {
                $("#edit-profile-link").show();
                $("#send-message-link").hide();
            });
        </script>';
} else {
    echo '<script>
            $(document).ready(function() {
                $("#edit-profile-link").hide();
                $("#send-message-link").show();
            });
        </script>';
}
?>

<div class="profile-info-container settings-profile-container">
    <div class="side-nav">
        <!-- only viewable if the User is viewing their own profile-->
        <a id="edit-profile-link" class="side-nav-item b" href="edit-profile.php?userID=<?php echo $userID; ?>">Edit profile</a>
        <!-- only viewable if the User is not viewing their own profile-->
        <a id="send-message-link" class="side-nav-item b" href="conversation.php?userID=<?php echo $userID; ?>">Send message</a>
        <?php // TODO: include href links ?>
        <a id="schedule-lesson-link" class="side-nav-item b" href="#">Schedule lesson</a>
    </div>
    <div class="profile-content settings-profile-content">
        <div class="box">
            <div class="box-content">
                <?php include("includes/profile-info-container.php"); ?>
                <div class="profile-text-container">
                    <div class="profile-content profile-description">
                        <div id="description-teacher-title" class="profile-description-title">
                            <h3>About this Teacher</h3>
                        </div>
                        <div id="description-student-title" class="profile-description-title">
                            <h3>About this Student</h3>
                        </div>
                        <p>
                            <!-- nl2br ensures that the line breaks are printed -->
                            <?php echo nl2br($row['description']); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>
