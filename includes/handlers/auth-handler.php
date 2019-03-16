<?php
/* LOGIN HANDLER */
// if the login button was pressed
if (isset($_POST['login-button'])) {
	// BUG: do I need to sanitize these ?
	$username = $_POST['login-username'];
	$password = md5($_POST['login-password']);

	$result = $account->loginAccount($username, $password);

	// if $account->loginAccount returns true
	if($result == true) {
		// set session variable
		// TODO: consider changing session variable to email
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
	// upon registration, the variables are confusing because some columns are
	// only applicable to Teachers.
	// for example, gender; nationality; flag; edu_level; edu_major; DOB; rate; rating
	// therefore, I check whether the User registered as a teacher. If so, get
	// those variables from the form. If not (and therefore as a Student), set
	// those variables to null.
	$un = sanitizeFormUsername($_POST['username']);
	$fn = sanitizeFormString($_POST['first-name']);
	$ln = sanitizeFormString($_POST['last-name']);
	$email = strtolower(sanitizeFormString($_POST['email']));
	$pw = sanitizeFormPassword(md5($_POST['password']));
	$pw2 = sanitizeFormPassword(md5($_POST['password']));
	$role = $_POST['role'];
	$skype_name = sanitizeFormUsername($_POST['skype-name']);

	// if the User has selected 'teacher', it means they completed the entire form
	if ($role == 'teacher') {
		$gender = $_POST['gender'];
		$nationality = $_POST['nationality'];
		$flag = "assets/images/icons/icons8_" . $nationality . "_flag.png";
		$edu_level = $_POST['educationLevel'];
		$edu_major = $_POST['educationMajor'];
		$dob = $_POST['dob'];
		$rate = $_POST['rate'];
	// else, the User has selected 'student', which means they haven't completed these sections; set them to NULL
	} else {
		$gender = null;
		$nationality = null;
		$edu_level = null;
		$edu_major = null;
		$dob = null;
		$rate = null;
	}

	// register() will return true is there have been no errors, and false if otherwise.
	$rowsAffected = $account->registerAccount(
		$role, $fn, $ln, $un, $email,
		$pw, $pw2, $skype_name, $gender, $nationality,
		$flag, $edu_level, $edu_major, $dob, $rate
	);

    if($rowsAffected == 1) {
		// create a session variable
		$_SESSION['userLoggedIn'] = $un;
		// if User is a teacher, direct to index-teacher. Else, to index-student
		if ($role == 'teacher') {
			header("Location: index-teacher.php");
		} else {
			header("Location: index-student.php");
		}
	} else {
		echo "Sorry, there was an error inserting details into DB";
	}
}
?>
