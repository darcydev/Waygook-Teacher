<?php
/*
// the variables are fetched in header.php
// because only Students are able to click the link to the deposit-employment-container
// the Student will always be $userLoggedIn
// the Teacher will always be $_GET['userID']


// DELETED FROM form action=
/// action="https://www.sandbox.paypal.com/cgi-bin/webscr"

// in order to get the value of X hours
// see if the specific Employment exists
// if so, use the rate from the Employment
// if not, use the rate from the Teacher
// the reasoning is that a Teacher may have a different rate for each Employment
$s_id = $userLoggedInID;
$t_id = $row['userID'];
$employment_row = $employment->getThisEmployment($s_id, $t_id);
$emp_id = $employment_row['employmentID'];
// check if the specific Employment already exists already
if (! $employment_row) {
	// if not, $rate equals Teacher's current rate
	$rate = $row['rate'];
} else {
	// if so, $rate equals Employment's current rate
	$rate = $employment_row['rate'];
}
*/
?>
