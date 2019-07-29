<?php
/* LOGIN HANDLER */

if (isset($_POST['login-button'])) {

	$email = $_POST['login-email'];
	$password = md5($_POST['login-password']);

	$result = $account->loginAccount($email, $password);

	if ($result == true) {
		// set the session variable
		$_SESSION['userEmail'] = $email;
		header("Location: index.php");
	} else {
		echo "Sorry, there's been an error logging in";
	}
}
