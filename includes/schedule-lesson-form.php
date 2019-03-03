<div id="schedule-lesson-form" class="overlay-item auth-forms">
    <div class="overlay-container">
        <div class="schedule-form auth-form form">
            <h3>Schedule lesson</h3>
            <div id="schedule-lesson-close" class="close-button menu-button">
                <img src="assets/images/icons/icons8-globe.png" alt="close-button">
            </div>
            <p>
                <label for="lesson-date">Date</label>
                <input id="lesson-date" name="lesson-date" type="date" required>
            </p>
            <p>
                <label for="lesson-start">Start time</label>
                <input id="lesson-start" name="lesson-start" type="time" required>
            </p>
            <p>
                <label for="lesson-end">End time</label>
                <input id="lesson-end" name="lesson-end" type="time" required>
            </p>
            <p>
                <label for="lesson-student">Select student</label>
                <div id="choose-student-list">
                    <ul id='choose-student-list' class='choose-list user-list list'>
                    <?php
                    // fetch all Employments associated with userLoggedIn
                    $sql = "SELECT * FROM Employments
                            WHERE teacher_id = ?
                            OR student_id = ?";
                    $stmt = $db->run($sql, [$userLoggedInID, $userLoggedInID]);
                    $choose_employments_row = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($choose_employments_row as $employment_row) {
                        // get the userID of the 'other user'
                        if ($userLoggedInID == $employment_row['teacher_id']) {
                            $otherUserID = $employment_row['student_id'];
                        } else {
                            $otherUserID = $employment_row['teacher_id'];
                        }

                        // set var prepaid_hours for each employment
                        $prepaid_amount = $employment_row['prepaid_amount'];
                        $rate = $employment_row['rate'];
                        $prepaid_hours = $prepaid_amount / $rate;

                        // fetch the User details for the 'other user'
                        $sql = "SELECT * FROM Users WHERE userID = ?";
                        $stmt = $db->run($sql, [$otherUserID]);
                        $other_user_row = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($other_user_row as $user_row) {

                            echo "<li id='schedule_user_" . $otherUserID . "' class='choose-student'>
                                    <div class='info-content profile-photo-small'>
                                        <img src=" . $user_row['profile_pic'] . " alt='profile-pic'>
                                    </div>
                                    <p>" . $user_row['first_name'] . "</p>
                                    <span class='gray'>" . $prepaid_hours . " hrs</span>
                                </li>";
                        }
                    }
                    ?>
                    </ul>
                </div>
            </p>
            <button type="submit" id="schedule-lesson-button" name="schedule-lesson-button" class="button">Schedule lesson</button>
        </div>
    </div>
</div>
