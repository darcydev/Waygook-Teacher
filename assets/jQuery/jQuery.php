<?php
// if User is a Teacher, 'logo' link to index-teacher.php
// if User is a Student, make 'logo' link to index-student.php
if ($userLoggedInRow['role'] == 'teacher') {
    echo '<script>
            $(document).ready(function() {
                ' /* hide search link on nav-bar */ . '
                $("#search-nav-bar-link").hide();
                ' /* hide 'logo' link to index-student.php */ . '
                $("#index-student-link").hide();
                ' /* hide 'deposit-employment-form' link on side-nav.php (as teachers should be able to deposit money for lessons) */ . '
                $("#deposit-employment-link").hide();
            });
        </script>';
} else {
    echo '<script>
            $(document).ready(function() {
                ' /* hide 'logo' link to index-teacher.php */ . '
                $("#index-teacher-link").hide();
                ' /* hide profile stats box */ . '
                $("#profile-stats-content").hide();
                ' /* remove profile flag */ . '
                $("#profile-flag").hide();
                ' /* hide account-details nav bar link in edit-profile */ . '
                $("#account-details-nav").hide();
            });
        </script>';
}

// if User is viewing their own profile
if ($_GET['userID'] == $userLoggedInID) {
    echo '<script>
            $(document).ready(function() {
                ' /* hide 'deposit-employment-form' link on side-nav.php
                reasoning is that Users should be able to deposit $ for lessons with themselves */ . '
                $("#deposit-employment-link").hide();
            });
        </script>';
}
?>
