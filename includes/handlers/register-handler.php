<?php
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
if(isset($_POST['register-button'])) {
	// SECURITY BUG
	$username = sanitizeFormUsername($_POST['username']);
	$firstName = sanitizeFormString($_POST['first-name']);
	$lastName = sanitizeFormString($_POST['last-name']);
	$email = sanitizeFormString($_POST['email']);
	$password = sanitizeFormPassword(md5($_POST['password']));
	$password = sanitizeFormPassword(md5($_POST['password']));

	// register() will return true is there have been no errors, and false if otherwise.
	$wasSuccessful = $account->register($firstName, $lastName, $username, $email, $password, $password2);

    if($wasSuccessful == 1) {
        // create session variable (value = "username")
		$_SESSION['userLoggedIn'] = $username;
		header("Location: index.php");
	}
}
?>
