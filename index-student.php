<?php
include("includes/header.php");

// prevent Teachers from viewing this page (also handled in jQuery.php)
// direct them to index-teacher.php
if ($userLoggedInRow['role'] == 'teacher') {
    header("Location: index-teacher.php");
}
?>

<div class="index-container">
    <div class="index-heading">
        <h2><?php echo $lang['Welcome to...']; ?></h2>
        <h4><?php echo $lang['platform to connect...']; ?></h4>
    </div>
    <div class="index-body">
        <div class="process">
            <div class="process-col">
                <div class="process-main">
                    <div class="process-num">1</div>
                    <div class="process-content">
                        <div class="process-title"><?php echo $lang['t complete profile']; ?></div>
                        <div class="process-text text"><?php echo $lang['s complete profile text 1']; ?></div>
                        <div class="process-text text"><br><?php echo $lang['s complete profile text 2']; ?></div>
                    </div>
                </div>
            </div>
            <div class="process-col">
                <div class="process-picture">
                    <img src="assets/images/screen-edit-profile.png" alt="process-col-img">
                </div>
            </div>
        </div>
        <div class="process">
            <div class="process-col">
                <div class="process-main">
                    <div class="process-num">2</div>
                    <div class="process-content">
                        <div class="process-title"><?php echo $lang['find the perfect tutor']; ?></div>
                        <div class="process-text text"><?php echo $lang['find the perfect tutor text']; ?></div>
                        <div class="process-text text"><br><?php echo $lang['find perfect tutor text 2']; ?></div>
                    </div>
                </div>
            </div>
            <div class="process-col">
                <div class="process-picture">
                    <img src="assets/images/recruitment.png" alt="process-col-img">
                </div>
            </div>
        </div>
        <div class="process">
            <div class="process-col">
                <div class="process-main">
                    <div class="process-num">3</div>
                    <div class="process-content">
                        <div class="process-title"><?php echo $lang['s conduct lesson']; ?></div>
                        <div class="process-text text"><?php echo $lang['meet your tutor on skype text']; ?></div>
                        <div class="process-text text"><br><?php echo $lang['s conduct lesson text 2']; ?></div>
                    </div>
                </div>
            </div>
            <div class="process-col">
                <div class="process-picture">
                    <img src="assets/images/girl-video-call.jpg" alt="process-col-img">
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>
