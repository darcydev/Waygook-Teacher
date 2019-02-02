<?php
include("includes/config.php");

// session_destroy(); LOGOUT

if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
	header("Location: register.php");
}
?>


<html>
<head>
	<title>Waygook Teacher</title>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <div class="nav-bar">
    	<div class="nav-bar-header">
    		<a href="index.php">WaygookTeacher</a>
    	</div>
        <ul>
        	<li><a href="profile.php">Profile</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="message.php">Message</a></li>
            <li><a href="register.php">Login/Register</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
    <div id="main-content-container">

    </div>
    <div class="footer-container">
        <ul class="footer-list">
        	<li>WaygookTeacher - made by Darcy Price</li>
        </ul>
    </div>
</body>
</html>
