<?php
include("includes/included-files.php");
?>

<html>
<head>
    <title>Waygook Teacher</title>

    <?php
    include("includes/scripts_and_links.php");
    ?>
</head>
<body>
    <div class="landing-page-container">
        <div class="nav-bar">
            <div class="nav-bar-header">
                <?php // TODO: include logo ?>
            </div>
            <ul class="nav-bar-links">
                <li><a href="register.php"><?php echo $lang['login/register']; ?></a></li>
                <?php include("includes/set-lang-form.php"); ?>
            </ul>
        </div>
        <div class="landing-page-row">
            <div class="landing-box-first">
                <div class="box-title">
                    <h1><?php echo $lang['Welcome to...']; ?></h1>
                    <h2><?php echo $lang['platform to connect...']; ?></h2>
                </div>
            </div>
            <div class="box">
                <div class="box-icon">
                    <img src="assets/images/icons/icons8-globe.png" alt="box-icon">
                </div>
                <div class="box-title">
                    <h2><?php echo $lang['edu world access']; ?></h2>
                    <h3><?php echo $lang['speak naturally']; ?></h3>
                </div>
                <div class="box-img">
                    <img src="assets/images/pinned-globe.jpg" alt="teacher-globe-image">
                </div>
                <div class="box-content">
                    <div class="box-content-row">
                        <div class="post">
                            <div class="post-icon">
                                <img src="assets/images/icons/icons8-diploma_2.png" alt="post-icon">
                            </div>
                            <div class="post-main">
                                <div class="post-title"><?php echo $lang['expert tutors']; ?></div>
                                <div class="post-content text"><?php echo $lang['expert tutors text']; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="box-content-row">
                        <div class="post">
                            <div class="post-icon">
                                <img src="assets/images/icons/icons8-keyhole_shield.png" alt="post-icon">
                            </div>
                            <div class="post-main">
                                <div class="post-title"><?php echo $lang['verified profiles']; ?></div>
                                <div class="post-content text"><?php echo $lang['verified profiles text']; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="box-content-row">
                        <div class="post">
                            <div class="post-icon">
                                <img src="assets/images/icons/icons8-webcam_man.png" alt="post-icon">
                            </div>
                            <div class="post-main">
                                <div class="post-title"><?php echo $lang['learn anytime']; ?></div>
                                <div class="post-content text"><?php echo $lang['learn anytime text']; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="box-content-row">
                        <div class="post">
                            <div class="post-icon">
                                <img src="assets/images/icons/icons8-thumb_up.png" alt="post-icon">
                            </div>
                            <div class="post-main">
                                <div class="post-title"><?php echo $lang['affordable prices']; ?></div>
                                <div class="post-content text"><?php echo $lang['affordable prices text']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-icon">
                    <img src="assets/images/icons/icons8-checked_filled.png" alt="box-icon">
                </div>
                <div class="box-title">
                    <h2><?php echo $lang['focus on...']; ?></h2>
                    <h3><?php echo $lang['prepare to achieve...']; ?></h3>
                </div>
                <div class="box-content">
                    <div class="box-content-row">
                        <div class="post">
                            <div class="post-icon">
                                <img src="assets/images/icons/icons8-passport.png" alt="post-icon">
                            </div>
                            <div class="post-main">
                                <div class="post-title"><?php echo $lang['immerse yourself...']; ?></div>
                                <div class="post-content text"><?php echo $lang['immerse yourself... text']; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="box-content-row">
                        <div class="post">
                            <div class="post-icon">
                                <img src="assets/images/icons/icons8-hard_working.png" alt="post-icon">
                            </div>
                            <div class="post-main">
                                <div class="post-title"><?php echo $lang['succeed in your career']; ?></div>
                                <div class="post-content text"><?php echo $lang['succeed in your career text']; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="box-content-row">
                        <div class="post">
                            <div class="post-icon">
                                <img src="assets/images/icons/icons8-about.png" alt="post-icon">
                            </div>
                            <div class="post-main">
                                <div class="post-title"><?php echo $lang['get expert help...']; ?></div>
                                <div class="post-content text"><?php echo $lang['get expert help... text']; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="box-content-row">
                        <div class="post">
                            <div class="post-icon">
                                <img src="assets/images/icons/icons8-talk_female.png" alt="post-icon">
                            </div>
                            <div class="post-main">
                                <div class="post-title"><?php echo $lang['speak naturally, always']; ?></div>
                                <div class="post-content text"><?php echo $lang['speak naturally, always text']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-icon">
                    <img src="assets/images/icons/icons8-process.png" alt="box-icon">
                </div>
                <div class="box-title">
                    <h2><?php echo $lang['how waygook teacher works']; ?></h2>
                    <h3><?php echo $lang['learn languages online...']; ?></h3>
                </div>
                <div class="box-content">
                    <div class="process">
                        <div class="process-col">
                            <div class="process-main">
                                <div class="process-num">1</div>
                                <div class="process-content">
                                    <div class="process-title"><?php echo $lang['find the perfect tutor']; ?></div>
                                    <div class="process-text text"><?php echo $lang['find the perfect tutor text']; ?></div>
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
                                <div class="process-num">2</div>
                                <div class="process-content">
                                    <div class="process-title"><?php echo $lang['schedule a lesson']; ?></div>
                                    <div class="process-text text"><?php echo $lang['schedule a lesson text']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="process-col">
                            <div class="process-picture">
                                <img src="assets/images/screen-schedule-lesson.png" alt="process-col-img">
                            </div>
                        </div>
                    </div>
                    <div class="process">
                        <div class="process-col">
                            <div class="process-main">
                                <div class="process-num">3</div>
                                <div class="process-content">
                                    <div class="process-title"><?php echo $lang['meet your tutor on skype']; ?></div>
                                    <div class="process-text text"><?php echo $lang['meet your tutor on skype text']; ?></div>
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
        </div>
    </div>

<?php
include("includes/footer.php");
?>
