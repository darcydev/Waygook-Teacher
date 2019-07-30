<?php
/* RETRIEVE DATA FROM DB */

// fetch all Employments associated with userLoggedIn
$userEmployments = $user->getEmployments();
// bool for whether 'other User' is a Teacher or a Student
$otherUserRole = $userLoggedInRow['role'] == 'teacher' ? 'student' : 'teacher';

/* SEND DATA TO DB */

if (isset($_POST['schedule-lesson-button'], $isStudent)) {
  /* PREPARE DATA */
  $date = $_POST['date'];
  $datetime = $date . " " . $_POST['time'] . ":00";
  $duration = $_POST['duration'];
  $otherID = $_POST['with'];
  // assign the correct IDs depending on the role of userLoggedIn
  $studentID = $isStudent ? $user->getID() : $otherID;
  $teacherID = $isStudent ? $otherID : $user->getID();

  $ra = $employment->scheduleLesson($date, $datetime, $duration, $studentID, $teacherID);

  if ($ra == 1) {
    echo "Lesson booked";
  } else {
    echo "Sorry, there was an error trying to book the lesson";
  }
}
