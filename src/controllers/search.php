<?php

/* CONTROLLER PAGE FOR COLLECTING PROFILES TO DISPLAY ON SEARCH.PHP */

/* SEARCH BAR */

/* RETRIVE RELEVANT PROFILES FROM DB */

// show Users with opposite role to userLoggedIn
// determine whether userLoggedIn is a Teacher or a Student
if ($userLoggedInRow['role'] == 'teacher') {
  $searchRole = 'student';
} else {
  $searchRole = 'teacher';
}

// REFACTOR: query should include only columns required!
$sql = "SELECT userID, first_name, profile_pic
        FROM Users
        WHERE role = ?";
$stmt = $db->run($sql, [$searchRole]);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
