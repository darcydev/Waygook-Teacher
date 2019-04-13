<?php
/*
The contents of the profile-skype container will depend on whether an Employment exists.
Specifically, whether an Employment exists userLoggedIn and $_GET['userID']. That is,
between the User who is currently logged in and the User's profile whom their viewing.

If such an Employment exists,
    ** Display the skype_name of 'other User' ($_GET['userID'])

If such an Employment does not exist,
    ** Display a textbox stating that the Skype name is hidden because an Employment doesn't exist yet.
    and a link to deposit money to create an Employment.
*/
if (isset($_GET['userID'])) {
    $this_emp = $employment->getThisEmployment($userLoggedInID, $_GET['userID']);
    // if the specific Employment does exist
    if ($this_emp) {
        $skype_visible = True;
    // if the specific Employment doesn't exist
    } else {
        $skype_visible = False;
    }
// if $_GET['userID'] isn't set in the URL
} else {
    header("Location: index-student.php");
}
?>

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
                <h4><?php echo $lang['nationality'] . ': ' . $lang[$row['nationality']]; ?></h4>
            </div>
            <div class="profile-content profile-lessons">
                <h4><?php echo $row['lesson_hours'] . ' ' . $lang['lesson hours']; ?></h4>
            </div>
            <div class="profile-content profile-rating">
                <!-- echo number of reviews user has-->
                <h4><?php echo sizeof($user->getReviews($_GET['userID'])) . ' ' . $lang['reviews']; ?></h4>
            </div>
            <div class="profile-content profile-skype button">
                <?php
                /*
                Depending on whether $skype_visible (assigned above) is True or False,
                display the User's skype details or hide them with a 'deposit money'
                message, respectively.
                */
                // if the Skype details are visible for this User
                if ($skype_visible) {
                    echo "<a href='skype:" . $row['skype_name'] . "?add'>
                            <h4>" . $lang['Skype ID'] . ": " . $row['skype_name'] . "</h4>
                        </a>";
                // if the Skype details are hidden for this User
                } else {
                    echo "Sorry, the Skype details for this User are currently hidden.
                        In order to display the Skype details, please deposit money for lessons
                        with this User";
                }
                ?>
            </div>
        </div>
    </div>
</div>
