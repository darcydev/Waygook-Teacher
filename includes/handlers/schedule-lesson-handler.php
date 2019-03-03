<?php

if (isset($_POST['schedule-lesson-button'])) {
    $date = $_POST['lesson-date'];
    $start_time = $_POST['lesson-start'];
    $duration = $_POST['duration'];
    $other_user = $_POST['lesson-with'];

    $rowsAffected = $employment->scheduleLesson($date, $start_time, $duration, $other_user);

    if ($rowsAffected == 1) {
        // TODO: direct to calendar.php
        header("Location: profile.php");
    } else {
        header("Location: fail.php");
    }

}

?>
