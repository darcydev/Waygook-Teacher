<?php
/* LOGIN HANDLER */
if (isset($_POST['login-button'])) {
	//Login button was pressed
	// BUG: do I need to sanitize these ?
	$username = $_POST['login-username'];
	$password = md5($_POST['login-password']);

	$result = $account->loginAccount($username, $password);

	if($result == true) {
		// set session variable
		$_SESSION['userLoggedIn'] = $username;

		// fetch User's role from DB
		$user = new User($userLoggedIn);
		$db = MyPDO::instance();
		$sql = "SELECT * FROM Users WHERE username = ?";
		$stmt = $db->run($sql, [$username]);
		$userLoggedInRow = $stmt->fetch(PDO::FETCH_ASSOC);
		$userLoggedInRole = $userLoggedInRow['role'];
	} else {
		echo "Sorry, there's been an error logging in";
	}
	// if User logged in as a Teacher, direct to index-teacher.php
	if ($userLoggedInRole == 'teacher') {
		header("Location: index-teacher.php");
	// if User logged in as a Student, direct to index-student.php
	} else {
		header("Location: index-student.php");
	}
}

/* REGISTER HANDLER */
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

	// if the User has selected 'teacher', it means they completed the entire form
	if ($role == 'teacher') {
		$gender = $_POST['gender'];
		$nationality = $_POST['nationality'];
		$flag = "assets/images/icons/icons8_" . $nationality . "_flag.png";
		$educationLevel = $_POST['educationLevel'];
		$educationMajor = $_POST['educationMajor'];
		$DOB = $_POST['dob'];
	// else, the User has selected 'student', which means they haven't completed these sections; set them to NULL
	} else {
		$gender = null;
		$nationality = null;
		$educationLevel = null;
		$educationMajor = null;
		$DOB = null;
	}

	// register() will return true is there have been no errors, and false if otherwise.
	$rowsAffected = $account->registerAccount($role, $fn, $ln, $un, $email, $password, $password2, $gender, $nationality, $flag, $educationLevel, $educationMajor, $dob);

    if($rowsAffected == 1) {
		// create a session variable
		// TODO: consider changing this to email, so to allow removing username
		$_SESSION['userLoggedIn'] = $un;
		// if User is a teacher, direct to index-teacher. Else, to index-student
		if ($role == 'teacher') {
			header("Location: index-teacher.php");
		} else {
			header("Location: index-student.php");
		}
	}
}
?>
