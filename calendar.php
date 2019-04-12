<?php
include("includes/header.php");

/* **
PAGE DETAILS:
    ** Calendar.php displays the calendar of all lessons for userLoggedIn.
    ** The lessons displayed on the calendar are all future lessons, and "recent" past lessons.

IDEA:
    ** Include a Google calendar plugin

TODO:
    ** Implement timezone functionality (where the datetime of each lesson will adjust
    ** depending on the User's timezone).

BUG:
    ** n/a
** */

$lessons = $user->getUnconfirmedLessons($userLoggedInID);
?>

<div class="profile-info-container settings-profile-container conversation-container">
    <div class="side-nav">
        <a id="schedule-lesson-link" class="side-nav-item b" href="#"><?php echo $lang['schedule a lesson']; ?></a>
    </div>
    <div class="conversation-content profile-content settings-profile-content">
        <div class="box">
            <div class="box-content">
                <div class="profile-text-container profile-conversation-container">
                    <div class="profile-content profile-description">
                        <div class="profile-description-title">
                            <h3><?php echo $lang['calendar']; ?></h3>
                        </div>
                        <p>
                            <?php
                            // TODO: if there's no lessons to display, show image and text indicating as such (and to schedule a lesson)
                            foreach ($lessons as $lesson_row) {
                                // fetch the first_name, last_name of the User involved in the conversation who isn't userLoggedIn
                                // aka 'the other messager'
                                // use if/else to get userID of 'the other messanger'
                                // if $userLoggedInID != $from_user_id, then $from_user_id must equal $otherUserID, and vice versa
                                if ($userLoggedInID == $lesson_row['teacher_id']) {
                                    $otherUserID = $lesson_row['student_id'];
                                } else {
                                    $otherUserID = $lesson_row['teacher_id'];
                                }
                                // format the $lesson date
                                $datetime = date_format(date_create($lesson_row['datetime']), 'D j M Y G:i T');
                                // fetch DB details of 'other user'
                                $other_user_row = $user->getOtherUser($otherUserID);
                                $id = $lesson_row['lessonID'];
                                $duration = $lesson_row['duration'];
                                $t_pay = $lesson_row['teacher_payment'];
                                $t_id = $lesson_row['teacher_id'];

                                $now_time = strtotime('now');
                                $lesson_time = strtotime($datetime);

                                // if lesson date is in the future
                                if ($lesson_time > $now_time) {
                                    // option is 'CANCEL LESSON'
                                    $option_button = "<div onClick='cancelLesson(" . $id . ")' id='calendar-lesson_" . $id . "' class='button cancel-button'>
                                                        " . $lang['cancel lesson'] . "
                                                    </div>";
                                // if lesson date is in the past
                                } else {
                                    // option is 'CONFIRM LESSON'
                                    $option_button = "<div onClick='confirmLesson(" . $id . ", " . $duration . ", " . $t_id . ", " . $t_pay . ")' id='calendar-lesson_" . $id . "' class='button confirm-button'>
                                                        " . $lang['confirm lesson'] . "
                                                    </div>";
                                }

                                // create html div each time loops through $query
                                echo "<div class='calendar-item'>
                                        <div class='conversation-item'>
                                            <span id='conversation-result' class='calendar-result'>
                                                <div class='conversation-photo calendar-photo profile-photo-small'>
                                                    <img src='" . $other_user_row['profile_pic'] . "' alt='profilePic'>
                                                </div>
                                                <div class='calendar-name conversation-name'>
                                                    " . $other_user_row['first_name'] . "
                                                </div>
                                                <div class='calendar-date conversation-date'>
                                                    " . $datetime . "
                                                </div>
                                                <div class='calendar-duration conversation-text'>
                                                    " . $duration . "mins
                                                </div>
                                                " . $option_button . "
                                            </span>
                                        </div>
                                    </div>";
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>
