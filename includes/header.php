<?php

include("includes/config.php");
include("includes/classes/User.php");

if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
	header("Location: register.php");
}

$user = new User($con, $userID);

$userQuery = mysqli_query($con, "SELECT * FROM Users WHERE username='$userLoggedIn'");
$row = mysqli_fetch_array($userQuery);
$userID = $row['userID'];

?>


<html>
<head>
	<title>Waygook Teacher</title>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <div id="nav-bar">
    	<div id="nav-bar-header">
    		<a href="index.php">WaygookTeacher</a>
    	</div>
        <ul id="nav-bar-links">
            <li><a href="profile.php?userID=<?php echo $userID; ?>">Profile: <?php echo $userLoggedIn; ?></a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="message.php">Message</a></li>
            <li><a href="register.php">Login/Register</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
