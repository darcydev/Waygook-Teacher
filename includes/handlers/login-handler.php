<?php
if(isset($_POST['login-button'])) {
	//Login button was pressed
	// BUG: do I need to sanitize these ?
	$username = $_POST['login-username'];
	$password = md5($_POST['login-password']);

	$result = $account->loginAccount($username, $password);

	if($result == true) {
		$_SESSION['userLoggedIn'] = $username;
		header("Location: profile.php");
	}

}
?>
