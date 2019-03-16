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

<div class="profile-info-container settings-profile-container lesson-list-container">
    <div class="side-nav">
        <?php // TODO: include href links ?>
        <a id="schedule-lesson-link" class="side-nav-item b" href="#"><?php echo $lang['schedule lesson']; ?></a>
    </div>
    <div class="lesson-list-content profile-content settings-profile-content">
        <div class="box">
            <div class="box-content">
                <div class="profile-text-container profile-conversation-container">
                    <div class="profile-content profile-description">
                        <p>
                            <table class="lessons-table page-table">
                                <thead class="lessons-head page-table-head">
                                    <th><?php echo $lang['name']; ?></th>
                                    <th><?php echo $lang['prepaid amount']; ?></th>
                                    <th><?php echo $lang['price per hour']; ?></th>
                                    <th><?php echo $lang['actions']; ?></th>
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
                                    $other_user_row = $user->getOtherUser($otherUserID);

                                    // echo each employment row
                                    echo "<tbody class='lessons-body page-table-body'>
                                            <tr class='tr-row'>
                                                <td id='td-profile-info' class='td-profile-info'>
                                                    <div class='info-content profile-photo-small'>
                                                        <img id='sub-menu-btn' onclick='downLessons(" . $other_user_row['userID'] . ")' class='down-btn sub-table-btn' src='assets/images/icons/icons8-drop-down-40.png' alt='drop-down-btn'>
                                                        <img id='sub-menu-btn'  class='up-btn sub-table-btn' src='assets/images/icons/icons8-up-squared-40.png' alt='pull-up-btn'>
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
                                                        <li><a href='conversation.php?userID=" . $otherUserID . "'>" . $lang['send message'] . "</a></li>
                                                        <li><a href='profile.php?userID=" . $otherUserID . "'>" . $lang['view profile'] . "</a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr id='lessons-table-head_" . $other_user_row['userID'] . "' class='tr-row tr-sub-table page-table page-table-head'>
                                                <th class='th-date'>Date</th>
                                                <th class='th-duration'>Duration</th>
                                                <th class='th-earnings'>Earnings</th>
                                                <th class='th-status'>Lesson status</th>
                                            </tr>";

                                    // echo each lesson row (within each employment)
                                    $lessons = $user->getLessons($employment_row['employmentID']);

                                    foreach ($lessons as $lesson_row) {
                                        // get variables into 'plain English'
                                        if ($lesson_row['confirmed'] == 1) {
                                            $lesson_confirmed_text = $lang['confirmed'];
                                        } else {
                                            $lesson_confirmed_text = $lang['unconfirmed'];
                                        }
                                        // format the $lesson date
                                        $datetime = date_format(date_create($lesson_row['datetime']), 'F j, Y, g:i a');

                                        echo "<tr class='tr-row tr-sub-table lessons-table-body_" . $other_user_row['userID'] . "'>
                                                    <td class='td-date'>
                                                        " . $datetime . "
                                                    </td>
                                                    <td class='td-duration'>
                                                        " . $lesson_row['duration'] . " mins
                                                    </td>
                                                    <td class='td-earnings'>
                                                        $" . $lesson_row['teacher_payment'] . "
                                                    </td>
                                                    <td class='td-status'>
                                                        " . $lesson_confirmed_text . "
                                                    </td>
                                                </tr>
                                            </tbody>";
                                    }




                                    /*

                                    // get variables into 'plain English'
                                    if ($lessons['confirmed'] == 1) {
                                        $lesson_confirmed_text = $lang['confirmed'];
                                    } else {
                                        $lesson_confirmed_text = $lang['unconfirmed'];
                                    }
                                    // format the $lesson date
                                    $datetime = date_format(date_create($lessons['datetime']), 'F j, Y, g:i a');

                                    echo "<tbody class='lessons-body page-table-body'>
                                            <tr class='tr-row'>
                                                <td id='td-profile-info' class='td-profile-info'>
                                                    <div class='info-content profile-photo-small'>
                                                        <img id='sub-menu-btn' onclick='downLessons(" . $other_user_row['userID'] . ")' class='down-btn sub-table-btn' src='assets/images/icons/icons8-about.png' alt='drop-down-btn'>
                                                        <img id='sub-menu-btn'  class='up-btn sub-table-btn' src='assets/images/icons/icons8-idea.png' alt='pull-up-btn'>
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
                                                        <li><a href='conversation.php?userID=" . $otherUserID . "'>" . $lang['send message'] . "</a></li>
                                                        <li><a href='profile.php?userID=" . $otherUserID . "'>" . $lang['view profile'] . "</a></li>
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


                                    */

                                }
                                ?>
                            </table>
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
