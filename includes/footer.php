</div>

<?php
// if User is a Teacher, 'logo' link to index-teacher.php
// if User is a Student, make 'logo' link to index-student.php
if ($row['role'] == 'teacher') {
    echo '<script>
            $(document).ready(function() {
                ' /* remove search link on nav-bar
                // BUG: this isn't working on some pages */ . '
                $("#search-nav-bar-link").hide();
                ' /* remove 'logo' link to index-student.php */ . '
                $("#index-student-link").hide();
                ' /* change profile description title */ . '
                $("#description-student-title").hide();
            });
        </script>';
} else {
    echo '<script>
            $(document).ready(function() {
                ' /* remove 'logo' link to index-teacher.php */ . '
                $("#index-teacher-link").hide();
                ' /* change profile description title */ . '
                $("#description-teacher-title").hide();
                ' /* remove profile stats box */ . '
                $("#profile-stats-content").hide();
                ' /* remove profile flag */ . '
                $("#profile-flag").hide();
            });
        </script>';
}
?>

<div class="footer-container">
    <div class="about-us-container footer-section">
        <div class="process-title">About us</div>
        <div class="process-text">
            <li>Who we are</li>
            <li>Help</li>
            <li>How it works</li>
        </div>
    </div>
    <div class="need-support-container footer-section">
        <div class="process-title">Need support?</div>
        <div class="process-text">
            <p>
                <b>Need any help?</b>
                <br>support@waygookteacher.com
            </p>
        </div>
    </div>
    <div class="built-by-container footer-section">
        <div class="process-title">built by Darcy Price</div>
        <div class="process-text">
            <div class="icon">
                <img src="" alt="github-icon">
            </div>
        </div>
    </div>
    <div class="change-language-container footer-section">
        <select id="select-language" class="select-language" name="select-language" type="text" onchange="changeLanguage(this);" required>
            <option value="english">English</option>
            <option value="korean">한국어</option>
        </select>
    </div>
</div>
</body>
</html>
