<?php
/* REGISTER HANDLER */
if (isset($_POST['register-button'])) {
	$em = $_POST['email'];
	$fn = $_POST['first-name'];
	$ln = $_POST['last-name'];
	$role = $_POST['role'];
	$pw = md5($_POST['password']);
	$pw2 = md5($_POST['confirm-password']);

	$rowsAffected = $account->registerAccount($em, $fn, $ln, $role, $pw, $pw2);

	if ($rowsAffected == 1) {
		// create a session variable
		$_SESSION['userLoggedIn'] = $em;
	} else {
		echo "Sorry, there was an error inserting details into DB";
	}
}

// preliminary sanitization (PDO done before DB entry)
// to remove tags, whitespaces, and capitals
function sanitizeFormInput($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = strtolower($inputText);
	return $inputText;
}

