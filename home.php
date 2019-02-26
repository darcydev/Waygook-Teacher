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
                <li><a href="register.php">Login / Register</a></li>
                <select id="select-language" name="select-language" type="text" onchange="changeLanguage(this);" required>
                    <option value="english">English</option>
                    <option value="korean">한국어</option>
                </select>
            </ul>
        </div>
        <div class="landing-page-row">
            <div class="landing-box-first box">
                <div class="box-title">
                    <h1>Waygook Teacher</h1>
                    <h2>A platform to connect you with professional English teachers</h2>
                </div>
            </div>
            <div class="box">
                <div class="box-icon">
                    <img src="assets/images/icons/icons8-globe.png" alt="box-icon">
                </div>
                <div class="box-title">
                    <h2>Education makes the World accessible to you</h2>
                    <h3>Speak naturally with professional English teachers
                    from around the world</h3>
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
                                <div class="post-title">Expert Tutors</div>
                                <div class="post-content text">Find native speakers and certified private tutors</div>
                            </div>
                        </div>
                    </div>
                    <div class="box-content-row">
                        <div class="post">
                            <div class="post-icon">
                                <img src="assets/images/icons/icons8-keyhole_shield.png" alt="post-icon">
                            </div>
                            <div class="post-main">
                                <div class="post-title">Verified profiles</div>
                                <div class="post-content text">We carefully check and confirm each tutor's profile</div>
                            </div>
                        </div>
                    </div>
                    <div class="box-content-row">
                        <div class="post">
                            <div class="post-icon">
                                <img src="assets/images/icons/icons8-webcam_man.png" alt="post-icon">
                            </div>
                            <div class="post-main">
                                <div class="post-title">Learn anytime</div>
                                <div class="post-content text">Take video lessons anytime that suits you. Tutors available 24/7.</div>
                            </div>
                        </div>
                    </div>
                    <div class="box-content-row">
                        <div class="post">
                            <div class="post-icon">
                                <img src="" alt="post-icon">
                            </div>
                            <div class="post-main">
                                <div class="post-title">Affordable prices</div>
                                <div class="post-content text">Choose an experienced tutor that fits your budget.</div>
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
                    <h2>Focus on the skills you need</h2>
                    <h3>Prepare to achieve your goals with private tutors</h3>
                </div>
                <div class="box-content">
                    <div class="box-content-row">
                        <div class="post">
                            <div class="post-icon">
                                <img src="" alt="post-icon">
                            </div>
                            <div class="post-main">
                                <div class="post-title">Immerse yourself in a new culture</div>
                                <div class="post-content text">Connect with language experts from around the world.</div>
                            </div>
                        </div>
                    </div>
                    <div class="box-content-row">
                        <div class="post">
                            <div class="post-icon">
                                <img src="" alt="post-icon">
                            </div>
                            <div class="post-main">
                                <div class="post-title">Succeed in your career</div>
                                <div class="post-content text">Develop your working vocabulary and communicate clearly.</div>
                            </div>
                        </div>
                    </div>
                    <div class="box-content-row">
                        <div class="post">
                            <div class="post-icon">
                                <img src="assets/images/icons/icons8-about.png" alt="post-icon">
                            </div>
                            <div class="post-main">
                                <div class="post-title">Get expert help when you need it</div>
                                <div class="post-content text">Learn to solve any problem in any language.</div>
                            </div>
                        </div>
                    </div>
                    <div class="box-content-row">
                        <div class="post">
                            <div class="post-icon">
                                <img src="" alt="post-icon">
                            </div>
                            <div class="post-main">
                                <div class="post-title">Speak naturally, always</div>
                                <div class="post-content text">Make a good impression and build trust in anylanguage.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-icon">
                    <img src="" alt="box-icon">
                </div>
                <div class="box-title">
                    <h2>How WaygookTeacher works</h2>
                    <h3>Learn languages online with the world's best tutors</h3>
                </div>
                <div class="box-content">
                    <div class="process">
                        <div class="process-col">
                            <div class="process-main">
                                <div class="process-num">1</div>
                                <div class="process-content">
                                    <div class="process-title">Find the perfect tutor</div>
                                    <div class="process-text text">Search by nationality, education, gender, or price.</div>
                                </div>
                            </div>
                        </div>
                        <div class="process-col">
                            <div class="process-picture">
                                <img src="assets/images/pinned-globe.jpg" alt="process-col-img">
                            </div>
                        </div>
                    </div>
                    <div class="process">
                        <div class="process-col">
                            <div class="process-main">
                                <div class="process-num">2</div>
                                <div class="process-content">
                                    <div class="process-title">Schedule a lesson</div>
                                    <div class="process-text text">Send your teacher a message to schedule a suitable time for a lesson.</div>
                                </div>
                            </div>
                        </div>
                        <div class="process-col">
                            <div class="process-picture">
                                <img src="assets/images/pinned-globe.jpg" alt="process-col-img">
                            </div>
                        </div>
                    </div>
                    <div class="process">
                        <div class="process-col">
                            <div class="process-main">
                                <div class="process-num">3</div>
                                <div class="process-content">
                                    <div class="process-title">Meet your tutor on Skype</div>
                                    <div class="process-text text">Take lessons using Skype's easy-to-use tool for video chat and messaging.</div>
                                </div>
                            </div>
                        </div>
                        <div class="process-col">
                            <div class="process-picture">
                                <img src="assets/images/pinned-globe.jpg" alt="process-col-img">
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
