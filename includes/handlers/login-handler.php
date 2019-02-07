<?php
if(isset($_POST['login-button'])) {
	//Login button was pressed
	// SECURITY BUG
	$username = $_POST['login-username'];
	$password = $_POST['login-password'];

	$result = $account->login($username, $password);

	if($result == true) {
		$_SESSION['userLoggedIn'] = $username;
		header("Location: index.php");
	}

}
?>
