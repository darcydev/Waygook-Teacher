<?php
include("includes/config.php");
include("includes/classes/User.php");

// ISSUE: how to get userID on page?
if(isset($_GET['userID'])) {
	$userID = $_GET['userID'];
}
else {
  // IDEA: include 'User couldn't be found' page
	header("Location: index.php");
}

$user = new User($con, $userID);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Profile</title>
</head>
<body>
    <!-- IDEA: include header.php -->
    <div id="profile-container">
        <div id="profile-heading">
            <h2>Profile</h2>
        </div>
        <div id="profile-content">
            <div id="profile-name">
                <p>Name: <?php echo $user->getName(); ?></p>
            </div>
            <div id="profile-username">
                <p>Username: </p>
            </div>
            <div id="profile-email">
                <p>Email: </p>
            </div>
        </div>
    </div>
</body>
</html>
