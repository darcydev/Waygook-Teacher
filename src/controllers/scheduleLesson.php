<?php

// fetch all Employments associated with userLoggedIn
$userEmployments = $user->getEmployments();

$otherUserRole = $userLoggedInRow['role'] == 'teacher' ? 'student' : 'teacher';
