<!--
The page shows the list of all employments for userLoggedIn

On this page, we display:
* the lessons preview for all the employments for the userLoggedIn
* by clicking on one of the employments, a drop down appears to show the details for all the lessons of that employment
-->

<?php
include("includes/header.php");

// select all employments involving userLoggedIn
$sql = "SELECT * FROM `Employments`
        WHERE teacher_id = ?
        OR student_id = ?";
$stmt = $db->run($sql, [$userLoggedInID, $userLoggedInID]);
$employments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="page-container">
    <div class="page-heading">
        <h2>Lessons</h2>
    </div>
    <div class="page-content">
        <table class="lessons-table page-table">
            <thead class="lessons-head page-table-head">
                <th>Name</th>
                <th>Prepaid amount</th>
                <th>Price per hour</th>
                <th>Actions</th>
            </thead>
            <?php
            foreach ($employments as $employment_row) {
                // fetch the first_name, last_name of the 'other User' involved in the employment
                // use if/else to get userID of 'the other messanger'
                // if $userLoggedInID != $from_user_id, then $from_user_id must equal $otherUserID, and vice versa
                if ($userLoggedInID == $employment_row['teacher_id']) {
                    $otherUserID = $employment_row['student_id'];
                } else {
                    $otherUserID = $employment_row['teacher_id'];
                }
                // collected from $employment_row['from_user_id'] which has FK relation with User.userID
                $sql = "SELECT * FROM Users WHERE userID = ?";
                $stmt = $db->run($sql, [$otherUserID]);
                $other_user_row = $stmt->fetch(PDO::FETCH_ASSOC);
                // collect all lessons associated with this employment from Lessons table
                $sql = "SELECT * FROM Lessons WHERE employment_id = ?";
                $stmt = $db->run($sql, [$employment_row['employmentID']]);
                $lessons = $stmt->fetch(PDO::FETCH_ASSOC);

                // get variables into 'plain English'
                if ($lessons['confirmed'] == 1) {
                    $lesson_confirmed_text = 'Confirmed';
                } else {
                    $lesson_confirmed_text = 'Unconfirmed';
                }
                // format the $lesson date
                $datetime = date_format(date_create($lessons['datetime']), 'F j, Y, g:i a');

                echo "<tbody class='lessons-body page-table-body'>
                        <tr class='tr-row'>
                            <td id='td-profile-info' class='td-profile-info'>
                                <div class='info-content profile-pic'>
                                    <img onclick='downLessons(" . $other_user_row['userID'] . ")' class='down-btn sub-table-btn' src='assets/images/icons/icons8-about.png' alt='drop-down-btn'>
                                    <img class='up-btn sub-table-btn' src='assets/images/icons/icons8-idea.png' alt='pull-up-btn'>
                                    <img src=" . $other_user_row['profile_pic'] . " alt='profile-pic'>
                                    " . $other_user_row['first_name'] . "
                                </div>
                            </td>
                            <td class='td-prepaid'>
                                " . $employment_row['prepaid_amount'] . "
                            </td>
                            <td class='td-rate'>
                                " . $employment_row['rate'] . "
                            </td>
                            <td class='td-actions'>
                                <ul class='ul-links ul-actions'>
                                    <li><a href='conversation.php?userID=" . $otherUserID . "'>Send message</a></li>
                                    <li><a href='conversation.php'>Schedule lesson</a></li>
                                    <li><a href='profile.php?userID=" . $otherUserID . "'>View profile</a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr id='lessons-table-head_" . $other_user_row['userID'] . "' class='tr-row tr-sub-table page-table page-table-head'>
                            <th class='th-date'>Date</th>
                            <th class='th-duration'>Duration</th>
                            <th class='th-earnings'>Earnings</th>
                            <th class='th-status'>Lesson status</th>
                        </tr>
                        <tr id='lessons-table-body_" . $other_user_row['userID'] . "' class='tr-row tr-sub-table'>
                            <td class='td-date'>
                                " . $datetime . "
                            </td>
                            <td class='td-duration'>
                                " . $lessons['duration'] . " mins
                            </td>
                            <td class='td-earnings'>
                                $" . $lessons['teacher_payment'] . "
                            </td>
                            <td class='td-status'>
                                " . $lesson_confirmed_text . "
                            </td>
                        </tr>
                    </tbody>";
            }
            ?>
        </table>
    </div>

</div>

<?php
include("includes/footer.php");
?>
