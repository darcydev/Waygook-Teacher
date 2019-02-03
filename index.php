<?php
include("includes/config.php");
include("includes/classes/User.php");

// session_destroy(); LOGOUT

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
    <div id="main-content-container">
        <div class="introduction-text">
            <div class="introduction-heading">
                <h1>Welcome to Waygook Teacher</h1>
                <h2>The platform to connect Korean students with English teachers</h2>
            </div>
            <div class="introduction-content">
                <ul>
                    <li>Learn from experienced English teachers</li>
                    <li>Study at your own convience</li>
                    <li>Personalized lesson plan to suit your English goals</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="footer-container">
        <ul id="footer-list">
        	<li>WaygookTeacher - made by Darcy Price</li>
        </ul>
    </div>
</body>
</html>
