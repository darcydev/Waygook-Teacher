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
                <p>Nationality: <img src=<?php echo $row['flag']; ?>></p>
            </div>
            <div class="profile-content profile-dob">
                <p><?php echo $row['DOB']; ?></p>
            </div>
            <div class="profile-content profile-edu-level">
                <p><?php echo $row['education_level']; ?></p>
            </div>
            <div class="profile-content profile-edu-major">
                <p><?php echo $row['education_major']; ?></p>
            </div>
        </div>
    </div>
</div>
