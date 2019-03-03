<div id="schedule-lesson-form" class="overlay-item auth-forms">
    <div class="overlay-container">
        <div id="schedule-lesson-close" class="close-button menu-button">
            <img src="assets/images/icons/icons8-globe.png" alt="close-button">
        </div>
        <form class="schedule-form auth-form form" method="POST">
            <p>
                <label for="lesson-date">Date</label>
                <input id="lesson-date" name="lesson-date" type="date" required>
            </p>
            <p>
                <label for="lesson-start">Start time</label>
                <input id="lesson-start" name="lesson-start" type="time" required>
            </p>
            <p>
                <label for="duration">Duration (mins)</label>
                <input id="duration" name="duration" type="number" step="30" min="30" max="240" required>
            </p>
            <p>
                <label for="lesson-with">With</label>
                <select id="lesson-with" class="select" name="lesson-with" type="text" required>
                    <?php
                    // fetch all Employments associated with userLoggedIn
                    $sql = "SELECT * FROM Employments
                            WHERE teacher_id = ?
                            OR student_id = ?
                            AND prepaid_amount > 0
                            ORDER BY prepaid_amount DESC";
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

                            echo "
                                    <option value=" . $user_row['userID'] .">
                                        " . $user_row['first_name'] . " -- " . $prepaid_hours . " prepaid hrs remaining
                                    </option>
                                ";
                        }
                    }
                    ?>
                </select>
            </p>
            <button type="submit" id="schedule-lesson-button" name="schedule-lesson-button" class="button">Schedule lesson</button>
        </form>
    </div>
</div>
