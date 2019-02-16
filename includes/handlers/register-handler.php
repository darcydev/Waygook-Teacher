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
	$un = sanitizeFormUsername($_POST['username']);
	$fn = sanitizeFormString($_POST['first-name']);
	$ln = sanitizeFormString($_POST['last-name']);
	$email = strtolower(sanitizeFormString($_POST['email']));
	$password = sanitizeFormPassword(md5($_POST['password']));
	$password2 = sanitizeFormPassword(md5($_POST['password']));
	$role = $_POST['role'];
	// if the User has selected 'gender', it means their a teacher
	if (isset($_POST['gender'])) {
		$gender = $_POST['gender'];
		$nationality = $_POST['nationality'];
		$flag = "assets/images/icons/icons8_" . $nationality . "_flag.png";
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
	$rowsAffected = $account->registerAccount($role, $fn, $ln, $un, $email, $password, $password2, $gender, $nationality, $flag, $educationLevel, $educationMajor, $dob);

    if($rowsAffected == 1) {
		// BUG: it's not directing to any page (although User is being added to DB)
		echo "<script>console.log('RH 1');</script>";
		// create a session variable (value = "username")
		$_SESSION['userLoggedIn'] = $username;
		// if User is a teacher, direct to index-teacher. Else, to index-student
		if ($role == 'teacher') {
			echo "<script>console.log('RH 2');</script>";
			header("Location: index-teacher.php");
		} elseif ($role == 'student') {
			echo "<script>console.log('RH 3');</script>";
			header("Location: index-student.php");
		} else {
			echo "<script>console.log('RH 4');</script>";
			// TODO: create 404.php (error page)
			header("Location: 404.php");
		}
	}
}
?>
