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
        <a id="edit-profile-link" class="side-nav-item b" href="edit-profile.php?userID=<?php echo $userID; ?>"><?php echo $lang['edit profile']; ?></a>
        <!-- only viewable if the User is not viewing their own profile-->
        <a id="send-message-link" class="side-nav-item b" href="conversation.php?userID=<?php echo $userID; ?>"><?php echo $lang['send message']; ?></a>
        <a id="schedule-lesson-link" class="side-nav-item b" href="#"><?php echo $lang['schedule lesson']; ?></a>
        <?php // TODO: include href link (to div on page), jQuery remove for Students ?>
        <a id="schedule-lesson-link" class="side-nav-item b" href="#"><?php echo $lang['reviews']; ?></a>
    </div>
    <div class="profile-content settings-profile-content">
        <div class="box">
            <div class="box-content">
                <?php include("includes/profile-info-container.php"); ?>
                <div class="profile-text-container">
                    <div class="profile-content profile-description">
                        <div class="profile-description-title">
                            <h3><?php echo $lang['background']; ?></h3>
                        </div>
                        <p>
                            <!-- nl2br ensures that the line breaks are printed -->
                            <?php echo nl2br($row['description']); ?>
                        </p>
                    </div>
                    <div class="profile-content profile-description">
                        <div class="profile-description-title">
                            <?php // TODO: include $lang ?>
                            <h3><?php echo $lang['reviews']; ?></h3>
                        </div>
                        <p>
                            <!-- echo number of User's reviews -->
                            <?php // TODO: present reviews in as 'divs you can cycle through' ?>
                            <p><?php echo $user->getReviews($_GET['userID'])?></p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>
