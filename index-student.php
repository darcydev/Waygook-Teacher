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
                        <div class="process-title">Complete your profile</div>
                        <div class="process-text text">Fill out profile with a recent photo and description of your teaching experience.</div>
                        <div class="process-text text"><br>The more detailed information about your experience the better.</div>
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
                        <div class="process-title">Organize a lesson with Students over message</div>
                        <div class="process-text text">Students will search for Teachers, and send you a message if they like your profile.</div>
                        <div class="process-text text"><br>Arrange a suitable time for a lesson with Students.</div>
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
                        <div class="process-title">Conduct private lesson with Student over Skype</div>
                        <div class="process-text text">At a time and place that suits you best, conduct a lesson with the Student over video call.</div>
                        <div class="process-text text"><br>After the Student confirms the lesson, you will be paid!</div>
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

<?php
include("includes/footer.php");
?>
