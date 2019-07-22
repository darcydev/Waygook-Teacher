<?php
 /* **
 PAGE DETAILS:
     ** side-nav.php is the reuseable side-nav that is displayed across several
     ** pages.

 TODO:
     ** Point each of the side-navs to this file (to avoid duplicate code)
     ** Each page will have a different side-nav contents. For example:
        *** Profile.php will have the option to 'send message', whereas,
        *** Calendar.php won't have that option (on the side-nav).
 ** */
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
