<!--
The page shows the calendar for userLoggedIn

The calendar consists of all future lessons, and certain past lessons (ie -10 days from today)

In future, expand the calendar to include a Google calendar (like?) plugin
-->

<?php
include("includes/header.php");

// fetch all future lessons involving userLoggedIn
// TODO: implement timezone functionality
$sql = "SELECT * FROM Lessons
        WHERE DATE(datetime) >= CURDATE()
        AND (teacher_id = ? OR student_id = ?)
        ORDER BY datetime DESC";
$stmt = $db->run($sql, [$userLoggedInID, $userLoggedInID]);
$lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="profile-info-container settings-profile-container conversation-container">
    <div class="side-nav">
        <a id="schedule-lesson-link" class="side-nav-item b" href="#">Schedule lesson</a>
    </div>
    <div class="conversation-content profile-content settings-profile-content">
        <div class="box">
            <div class="box-content">
                <div class="profile-text-container profile-conversation-container">
                    <div class="profile-content profile-description">
                        <div class="profile-description-title">
                            <h3>Calendar</h3>
                        </div>
                        <p>
                            <?php
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
                                $datetime = date_format(date_create($lesson_row['datetime']), 'F j, Y, g:i a');

                                // collected from $lesson_row['from_user_id'] which has FK relation with User.userID
                                $sql = "SELECT * FROM Users WHERE userID = ?";
                                $stmt = $db->run($sql, [$otherUserID]);
                                $other_user_row = $stmt->fetch(PDO::FETCH_ASSOC);
                                // create html div each time loops through $query
                                echo "<div class='calendar-item'>
                                        <div class='conversation-item'>
                                            <span id='conversation-result' class='calendar-result'>
                                                <div class='conversation-photo calendar-photo profile-photo-small'>
                                                    <img src=" . $other_user_row['profile_pic'] . " alt='from-user-photo'>
                                                </div>
                                                <div class='calendar-name conversation-name'>
                                                    " . $other_user_row['first_name'] . "
                                                </div>
                                                <div class='calendar-date conversation-date'>
                                                    " . $datetime . "
                                                </div>
                                                <div class='calendar-duration conversation-text'>
                                                    " . $lesson_row['duration'] . "mins
                                                </div>
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
