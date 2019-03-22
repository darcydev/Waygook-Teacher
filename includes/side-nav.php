<?php // TODO: include all side navs into this file
            // use JS(?) to adjust which side navs are viewable depending upon:
                // role
                // own page?
                // which page (eg settings vs profile, etc.)
 ?>

<div class="side-nav">
    <!-- only viewable if the User is viewing their own profile-->
    <a id="edit-profile-link" class="side-nav-item b" href="edit-profile.php?userID=<?php echo $userID; ?>"><?php echo $lang['edit profile']; ?></a>
    <!-- only viewable if the User is not viewing their own profile-->
    <a id="send-message-link" class="side-nav-item b" href="conversation.php?userID=<?php echo $userID; ?>"><?php echo $lang['send message']; ?></a>
    <a id="schedule-lesson-link" class="side-nav-item b" href="#"><?php echo $lang['schedule lesson']; ?></a>
    <?php // TODO: include href link (to div on page), jQuery remove for Students ?>
    <a id="schedule-lesson-link" class="side-nav-item b" href="#"><?php echo $lang['reviews']; ?></a>
    <a id="deposit-employment-link" class="side-nav-item b" href="#"><?php echo $lang['deposit for lessons']; ?></a>
</div>
