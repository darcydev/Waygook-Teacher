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

// if User is a Teacher, remove Search button from nav-bar
// reason: Teachers shouldn't be able to search for other Users
/*
if ($row['role'] == 'teacher') {
    echo '<script>
            $(document).ready(function() {
                $("#search-nav-bar-link").hide();
            });
        </script>';
}
*/
?>

<div id="footer-container">
    <ul id="footer-list">
        <li>WaygookTeacher - made by Darcy Price</li>
    </ul>
</div>
</body>
</html>
