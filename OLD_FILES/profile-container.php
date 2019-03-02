<div id="profile-content-container">
    <div id="profile-photo" class="profile-photo-content">
        <img src=<?php echo $row['profile_pic']; ?>>
    </div>
    <div id="profile-text-content" class="profile-content">
        <div id="profile-name" class="profile-content">
            <p><?php echo $row['first_name']; ?></p>
        </div>
        <div id="profile-flag" class="profile-content">
            <img src=<?php echo $row['flag']; ?>>
        </div>
    </div>
    <div id="profile-stats-content" class="profile-content">
        <!-- SHOULD I REALLY CONSIDER THIS? -->
        <div id="profile-age" class="profile-content">
            <p><?php echo $row['DOB']; ?></p>
        </div>
        <div id="profile-number-lessons" class="profile-content">
            <p>X Lessons</p>
        </div>
        <div id="profile-years-experience" class="profile-content">
            <p>X Years' of Experience</p>
        </div>
        <div id="profile-education-level" class="profile-content">
            <p>Education Level:<b> <?php echo ucfirst($row['education_level ']); ?></b></p>
        </div>
        <div id="profile-education-major" class="profile-content">
            <p>Education Major: <?php echo ucfirst($row['education_major']); ?></p>
        </div>
    </div>
</div>
<div id="profile-description" class="profile-content">
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
