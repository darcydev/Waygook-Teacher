<?php
include("includes/header.php");

// prevent Student from viewing this page (also handled in jQuery.php)
// direct them to index-student.php
if ($userLoggedInRow['role'] == 'student') {
    header("Location: index-student.php");
}
?>

<div class="index-container">
    <div class="index-heading">
        <h2><?php echo $lang['Welcome to...']; ?></h2>
        <h4><?php echo $lang['earn income']; ?></h4>
    </div>
    <div class="index-body">
        <div class="process">
            <div class="process-col">
                <div class="process-main">
                    <div class="process-num">1</div>
                    <div class="process-content">
                        <div class="process-title"><?php echo $lang['t complete profile']; ?></div>
                        <div class="process-text text"><?php echo $lang['t complete profile text 1']; ?></div>
                        <div class="process-text text"><br><?php echo $lang['complete profile text 2']; ?></div>
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
                        <div class="process-title"><?php echo $lang['t organize lesson']; ?></div>
                        <div class="process-text text"><?php echo $lang['t organize lesson text 1']; ?></div>
                        <div class="process-text text"><br><?php echo $lang['t organize lesson text 2']; ?></div>
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
                        <div class="process-title"><?php echo $lang['t conduct lesson']; ?></div>
                        <div class="process-text text"><?php echo $lang['t conduct lesson text 1']; ?></div>
                        <div class="process-text text"><br><?php echo $lang['t conduct lesson text 2']; ?></div>
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
