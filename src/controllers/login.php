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


/*
if (isset($_POST['login-button'])) {
	// BUG: do I need to sanitize these ?
	$username = $_POST['login-username'];
	$password = md5($_POST['login-password']);

	$result = $account->loginAccount($username, $password);

	// if $account->loginAccount returns true
	if ($result == true) {
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
}
*/
