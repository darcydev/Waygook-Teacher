<div class='profile-info-container'>
    <div class="profile-content-row-a">
        <div class="profile-content profile-photo-large profile-photo">
            <img src=<?php echo $row['profile_pic']; ?> alt='profile-pic'>
        </div>
    </div>
    <div class="profile-content-row-b">
        <div class="profile-content profile-name">
            <h2><?php echo $row['first_name']; ?></h2>
        </div>
        <div class="profile-stats-container">
            <div class="profile-content profile-flag">
                <h4><?php echo $lang['nationality'] . ': ' . $lang[$row['nationality']]; ?></h4>
            </div>
            <div class="profile-content profile-lessons">
                <h4><?php echo $row['lesson_hours'] . ' ' . $lang['lesson hours']; ?></h4>
            </div>
            <div class="profile-content profile-rating">
                <!-- echo number of reviews user has-->
                <h4><?php echo sizeof($user->getReviews($_GET['userID'])) . ' ' . $lang['reviews']; ?></h4>
            </div>
        </div>
    </div>
</div>
