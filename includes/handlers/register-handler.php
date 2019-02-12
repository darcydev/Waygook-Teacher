<?php
// REFACTOR: include these as part of Account, and call them using
// Account::sanitizeFormString, etc.
// in accordance with "DRY" principle
function sanitizeFormPassword($inputText) {
	$inputText = strip_tags($inputText);
	return $inputText;
}

function sanitizeFormUsername($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
}

function sanitizeFormString($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}

// if register btn was pressed
if (isset($_POST['register-button'])) {
	$username = sanitizeFormUsername($_POST['username']);
	$firstName = sanitizeFormString($_POST['first-name']);
	$lastName = sanitizeFormString($_POST['last-name']);
	$email = strtolower(sanitizeFormString($_POST['email']));
	$password = sanitizeFormPassword(md5($_POST['password']));
	$password2 = sanitizeFormPassword(md5($_POST['password']));
	$role = $_POST['role'];
	// if the User has selected 'gender', it means their a teacher
	if (isset($_POST['gender'])) {
		$gender = $_POST['gender'];
		$nationality = $_POST['nationality'];
		$educationLevel = $_POST['educationLevel'];
		$educationMajor = $_POST['educationMajor'];
		$DOB = $_POST['dob'];
	// else, the User has selected 'student', which means they haven't completed these sections
	} else {
		$gender = NULL;
		$nationality = NULL;
		$educationLevel = NULL;
		$educationMajor = NULL;
		$DOB = NULL;
	}

	// register() will return true is there have been no errors, and false if otherwise.
	$rowsAffected = $account->registerAccount($role, $firstName, $lastName, $username, $email, $password, $password2, $gender, $nationality, $educationLevel, $educationMajor, $dob);

    if($rowsAffected == 1) {
        // create session variable (value = "username")
		// BUG: this isn't working! How do you set $_SESSION using PDO? (??? not sure what I mean here - seems to be working!?)
		$_SESSION['userLoggedIn'] = $username;
		header("Location: index.php");
	} else {
		// BUG: insert code... (?? what code?)
	}
}
?>
