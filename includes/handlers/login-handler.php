<?php
if(isset($_POST['login-button'])) {
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
?>
